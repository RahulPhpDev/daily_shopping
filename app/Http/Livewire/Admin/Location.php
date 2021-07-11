<?php

namespace App\Http\Livewire\Admin;

use App\Enums\FlashMessagesEnum;
use App\Enums\PaginationEnum;
use Livewire\Component;
use App\Models\Location as LocationModel;
use Livewire\WithPagination;

class Location extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $state, $city, $code, $landmark, $record;
    public $updateModel = false;


    protected $rules = [
      'state' => 'required|min:2',
      'city' => 'required|min:2',
      'code' => 'required|numeric|min:4',
      'landmark' => 'required|min:2'
    ];

    public function resetInputFields()
    {
        $this->state = '';
        $this->city = '';
        $this->code = '';
        $this->landmark = '';
        $this->record = null;
        $this->updateModel = false;
    }
    public function render()
    {
        return view('livewire.admin.location.index',[
            'records'=>LocationModel::paginate(PaginationEnum::Show10Records)
        ]);
    }

    public function store()
    {
        $validate = $this->validate();
        LocationModel::create( $validate );
        $this->resetInputFields();
        $this->emit('modalFadeOut');
        $this->emit('showCreatedUpdatedToast',
            FlashMessagesEnum::CreatedMsg);
    }

    public function update()
    {
        $data = $this->validate();
        $this->record->update(
            $data
        );
        $this->resetInputFields();
        $this->emit('modalFadeOut');
        $this->emit('showCreatedUpdatedToast',
            FlashMessagesEnum::UpdateMsg);

    }


    public function delete($id)
    {
        LocationModel::destroy($id);
        $this->emit('showCreatedUpdatedToast',
            FlashMessagesEnum::DeletedMsg);
    }

    public function edit($id)
    {
        $record = LocationModel::findOrFail( $id );
        $this->location_id = $id;
        $this->state = $record->state;
        $this->city = $record->city;
        $this->code = $record->code;
        $this->landmark = $record->landmark;
        $this->record = $record;
        $this->updateModel = true;
    }
}
