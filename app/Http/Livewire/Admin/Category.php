<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand as BrandModel;
use Livewire\Component;
use App\Models\Category as CategoryModel;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $details;
    public $name;
    public $category_id;
    public $category;

    public function resetInputFields()
    {
        $this->name = '';
        $this->details = '';
        $this->category = null;
    }

    public function edit($id)
    {
        $this->category_id = $id;
        $this->category = CategoryModel::findOrFail($id);
        $this->name = $this->category->name;
        $this->details = $this->category->details;
    }

    public function update()
    {
        if ($this->category)
        {
            $this->category->name = $this->name;
            $this->category->details = $this->details;
            $this->category->save();
            session()->flash('message', 'Data Created Successfully.');
            $this->resetInputFields();

            $this->emit('modalFadeOut');
        }
    }

    public function store()
    {
        $validation = $this->validate([
            'name'		=>	'required',
            'details' => 'required'
        ]);

        CategoryModel::create($validation);

        session()->flash('message', 'Data Created Successfully.');

        $this->resetInputFields();

        $this->emit('modalFadeOut');
    }


    public function delete($id)
    {
        CategoryModel::find($id)->delete();
        session()->flash('message', 'Data Deletd');
    }

    public function render()
    {

        return view('livewire.admin.category.index', [
            'records' => CategoryModel
                ::orderBy('id', 'desc')
//                ->get()
                ->paginate(10)
        ]);
    }
}
