<?php

namespace App\Http\Livewire\Admin;

use App\Enums\PaginationEnum;
use App\Enums\RoleEnum;
use Livewire\Component;
use Livewire\WithPagination;
use App\User;
use App\Models\VehicleType;
use App\Models\Location;
use DB;

class Driver extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
//    public $locations, $vehicles;
    public $vehicle_type_id, $vehicle_id, $location_id;
    public $updateModel = false;
    public $vehicles = ['' => 'Select'];


    public $fields = [
        'Name',
        'Vehicle Number',
        'Vehicle Location Count',
    ];

    public function store()
    {

    }

    public function update()
    {

    }

    public function changeVehicle()
    {
     $this->vehicles =    \App\Models\Vehicle::select(DB::raw("CONCAT(vehicles.name, ' ', vehicles.number) as vehicle_name", 'id'))->where('vehicle_type_id', $this->vehicle_type_id)->get()->pluck('vehicle_name', 'id')->prepend('', 'Select Option');
    }


    public function render()
    {
        $records = User::whereHas('roles' , function ($query) {
              $query->where('role_id', RoleEnum::Truck_Driver);
            })
            ->withCount('vehicle')
            ->paginate(PaginationEnum::Show10Records);
//        $vehicles = \App\Models\Vehicle::pluck('')
        $vehicleTypes = VehicleType::pluck( 'name', 'id')->prepend(null, 'Select Vehicle Type');
//        $comp = Component::select(DB::raw("CONCAT('name','id') AS ID"))->get()
        $locations = Location::select(DB::raw( "id,CONCAT(locations.state,' ',locations.city, ' ', locations.code) as name" ))
            ->get()->pluck('name', 'id')->prepend('Select','' );
//dd($locations);
        return view('livewire.admin.driver.index', [
            'fields' => $this->fields,
            'records' => $records,
            'vehicleTypes' => $vehicleTypes,
            'locations' => $locations,
            'vehicles'=>$this->vehicles
        ]);
    }
}
