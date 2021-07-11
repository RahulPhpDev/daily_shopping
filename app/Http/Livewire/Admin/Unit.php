<?php

namespace App\Http\Livewire\Admin;

use App\Enums\FlashMessagesEnum;
use App\Enums\PaginationEnum;
use Livewire\Component;
use App\Models\Unit as UnitModel;
use Livewire\WithPagination;

class Unit extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $abbreviation, $record, $unitId;
    public $updateModel = false;

    protected  $rules = [
        'name' => 'required|min:1|max:10',
        'abbreviation' => 'required|min:2|max:20',
    ];

    public function resetInputFields()
    {

        $this->name = '';
        $this->abbreviation = '';
        $this->record = '';
        $this->unitId = '';
        $this->updateModel = false;
    }

    public function store()
    {
        $validate = $this->validate();
        UnitModel::create($validate);
        $this->resetInputFields();
        $this->emit('modalFadeOut');
        $this->emit('showCreatedUpdatedToast',
            FlashMessagesEnum::CreatedMsg);
    }

    public function edit($id)
    {
        $record = UnitModel::findOrFail($id);
        $this->record = $record;
        $this->name = $record->name;
        $this->abbreviation = $record->abbreviation;
        $this->updateModel = true;
        $this->unitId = $id;
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
        UnitModel::find($id)->delete();
        $this->emit('showCreatedUpdatedToast',
            FlashMessagesEnum::DeletedMsg);
    }


    public function render()
    {
        return view('livewire.admin.unit.index',
            [
                'records' => UnitModel::paginate(PaginationEnum::Show10Records),
            ]);
    }
}
