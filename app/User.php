<?php

namespace App;

use App\Enums\RoleEnum;
use App\Models\Location;
use App\Models\Order;
use App\Models\Roles;
use App\Models\UserLocation;
use App\Models\Vehicle;
use App\Models\VehicleOrderProduct;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Traits\OrderByTrait;
use DB;


class User extends Authenticatable
{
    use Notifiable,OrderByTrait ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeMatchToken($query, $token) {
            return $query->where('remember_token', $token);
    }

//Location::select(DB::raw( "id,CONCAT(locations.state,' ',locations.city, ' ', locations.code) as name" ))
//->get()->pluck('name', 'id');
    public function scopeDriver($query)
    {
        return $query->whereHas('roles' , function ($subQuery) {
            $subQuery->whereRoleId(RoleEnum::Truck_Driver);
//                ->addSelect(
//                    [
//                        'location' => UserLocation::query()->whereColumn('user_id','=','user_role.user_id' )->select(
//                            DB::raw( "CONCAT(user_location.state,' ',user_location.city, ' ', user_location.code) as location_name")
//                        )
//                    ]
//                );
        }
        );
    }
    /**
     * Has Role Admin
     */
    public function isAdmin()
    {
        return $this->roles->contains('name', 'Admin');
    }

    public function setPasswordAttribute( $value )
    {
        $this->attributes['password'] = Hash::make( $value );
    }
    /**
     * @return BelongsToMany
     */
    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Roles::class, 'user_role','user_id','role_id');
    }

    public function scopeCustomers($query)
    {
        return $query->roles->whereIn('id', RoleEnum::Customer);
    }

    /**
     * @return BelongsToMany
     */
    public function location() : BelongsToMany
    {
        return $this->belongsToMany(Location::class, 'user_location')->withPivot('id');
    }

    /**
     * @return HasMany
     */
    public function userLocation() :HasMany
    {
        return $this->hasMany(UserLocation::class);
    }

    /**
     * @return HasMany
     */
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function vehicle()
    {
        return $this->belongsToMany(Vehicle::class, 'user_vehicles')->withPivot('created_at', 'deleted_at');
    }

    /**
     * @return HasMany
     */
    public function vehicleOrder() : HasMany
    {
        return $this->hasMany(VehicleOrderProduct::class);
    }
}
