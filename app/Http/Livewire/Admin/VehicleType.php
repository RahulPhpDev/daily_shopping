<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\VehicleType as VehicleTypeModel;
use Livewire\WithPagination;

class VehicleType extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $name;
    public $vehicleTypeId;
    public $vehicleType;


    public  function resetInputFields()
    {
        $this->name = '';
        $this->vehicleType = null;
        $this->vehicleTypeId = null;
    }

    public function store()
    {
        $validation = $this->validate([
            'name'		=>	'required',
        ]);

        VehicleTypeModel::create($validation);

        session()->flash('message', 'Data Created Successfully.');

        $this->resetInputFields();

        $this->emit('modalFadeOut');
    }

    public function update()
    {
     if($this->vehicleTypeId)
     {
         $this->vehicleType->name = $this->name;
         $this->vehicleType->save();
         session()->flash('message', 'Data Created Successfully.');

         $this->resetInputFields();

         $this->emit('modalFadeOut');
     }
    }

    public function edit($id)
    {
        $this->vehicleType = VehicleTypeModel::findOrFail($id);
        $this->name = $this->vehicleType->name;
        $this->vehicleTypeId = $id;
    }


    public function delete($id)
    {
        VehicleTypeModel::find($id)->delete();
        session()->flash('message', 'Data Deleted Successfully.');
    }

    public function render()
    {

        return view('livewire.admin.vehicle-type.index', [
            'records' => VehicleTypeModel
                ::paginate(10)
        ]);
    }
}
