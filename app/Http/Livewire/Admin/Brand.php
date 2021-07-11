<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand as BrandModel;

class Brand extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name;
//
//    public function mount()
//    {
//
//    }

    public function resetInputFields()
    {
        $this->name = '';
    }


    public function store()
    {
        $validation = $this->validate([
            'name'		=>	'required',
        ]);

        BrandModel::create($validation);

        session()->flash('message', 'Data Created Successfully.');

        $this->resetInputFields();

        $this->emit('modalFadeOut');
    }


    public function renderAddBrand()
    {
        $this->names = "rahul";

        return view('testing/add');
    }

    public function delete($id)
    {
        BrandModel::find($id)->delete();
        session()->flash('message', 'Data Deleted Successfully.');
    }


    public function render()
    {
        return view('livewire/admin/brand.index',[
            'brands' => BrandModel::where('name', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'desc')
                            ->paginate(10)
        ]);
    }
}
