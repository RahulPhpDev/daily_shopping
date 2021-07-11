<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PaginationEnum;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DriverController extends Controller
{

    public $fields = [
        'Name',
        'Name',
        'Vehicle Location Count',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $records = User::whereHas('roles' , function ($query) {
            $query->where('role_id', RoleEnum::Truck_Driver);
        })
            ->withCount('vehicle')
            ->paginate(PaginationEnum::Show10Records);
       return view('admin.driver.index', [
           'fields' =>$this->fields,
           'records' => $records
       ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($userId)
    {
//        $userInstance = User::query();
        $user =  User::find($userId);
//        dd($user);
        $vehicleTypes = VehicleType::pluck( 'name', 'id')->prepend(null, 'Select Vehicle Type');
        $locations = Location::select(DB::raw( "id,CONCAT(locations.state,' ',locations.city, ' ', locations.code) as name" ))
            ->get()->pluck('name', 'id');
        $vehicles = ['Select'];
        $records = $user->with(['vehicle', 'location'])->find($userId);

        return view('admin.driver.create',
        compact('vehicleTypes', 'locations', 'vehicles', 'user', 'records')
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $userId) : RedirectResponse
    {

        $user = User::findOrFail($userId);
        $user->vehicle()->attach($request->input('vehicle_id'));

        $user->location()->attach($request->input('location_id'));


        return redirect()->route('admin.driver.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function locationOptions($type)
    {
        $vehicles =   Vehicle::select(
                            DB::raw(
                                "CONCAT(vehicles.name, ' ', vehicles.number) as vehicle_name"
                            ),
            'id'
            )
            ->where('vehicle_type_id', $type)
            ->get()
            ->pluck('vehicle_name', 'id')
            ->prepend( 'Select Option');
//        dd($vehicles);
        return view('admin.driver.form.location-option', compact('vehicles'));
    }
}
