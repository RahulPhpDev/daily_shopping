<?php

namespace App;

use App\Enums\RoleEnum;
use App\Models\Location;
use App\Models\Order;
use App\Models\Roles;
use App\Models\UserLocation;
use App\Models\Vehicle;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Traits\OrderByTrait;
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


}
