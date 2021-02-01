<?php

namespace App\Http\Livewire\Admin;

use App\Enums\FlashMessagesEnum;
use App\Enums\PaginationEnum;
use App\Traits\LivewireHelperTrait;
use Livewire\Component;
use App\Models\Vehicle as VehicleModel;
use App\Models\VehicleType as VehicleTypeModel;
use Livewire\WithPagination;

class Vehicle extends Component
{
//    use LivewireHelperTrait;
    use WithPagination;

    public $vehicle_type_id;
    public $name;
    public $number;
    public $details;
    public $vehicle_id;
    public $vehicle;
//    public $vehicleTypes;


//    public function mount()
//    {
//     $this->vehicleTypes = VehicleTypeModel::pluck('name', 'id');
//    }


    protected $rules = [
        'name' => 'min:2',
        'vehicle_type_id' =>'required' ,
        'number' => 'min:2',
        'details' => 'min:1'
    ];


    public function resetInputFields()
    {
        $this->vehicle_type_id = null;
        $this->name = '';
        $this->number = '';
        $this->details = '';
        $this->vehicle_id = null;
        $this->vehicle = null;
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['vehicle_type_id'] = (int )$validatedData['vehicle_type_id'] ;
        VehicleModel::create( $validatedData );
        session()->flash('message', FlashMessagesEnum::CreatedMsg);
        $this->resetInputFields();

        $this->emit('modalFadeOut');


    }


    public function edit($id)
    {
        $vehicle =VehicleModel::findOrFail( $id );
        $this->vehicle_id = $id;
        $this->vehicle = $vehicle;
        $this->name = $vehicle->name;
        $this->number = $vehicle->number;
        $this->details = $vehicle->details;
        $this->name = $vehicle->name;
    }

    public function update()
    {
         if ($this->vehicle_id)
         {
             $this->vehicle->name = $this->name;
             $this->vehicle->number = $this->number;
             $this->vehicle->details = $this->details ;
             $this->vehicle->vehicle_type_id = $this->vehicle_type_id;
             $this->vehicle->save();

             session()->flash('message', FlashMessagesEnum::UpdateMsg);
             $this->resetInputFields();

             $this->emit('modalFadeOut');
//             $this->updated();
         }
    }



    public function delete($id)
    {
        VehicleModel::findOrFail($id)->delete();
        session()->flash('message', FlashMessagesEnum::DeletedMsg);
    }




    public function render()
    {
        return view('livewire.admin.vehicle.index', [
            'records' =>VehicleModel::paginate(PaginationEnum::Show10Records),
            'vehicleTypes' => VehicleTypeModel::pluck('name', 'id')
        ]);
    }
}
