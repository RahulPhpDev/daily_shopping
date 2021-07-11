<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\User;
use App\Models\Category as CategoryModel;

class CreateAddDailyNeeds extends Component
{
    public $users,
    $products,
    $brands;

    public function populateProduct()
    {

    }


    public function render()
    {
        return view('livewire.admin.daily-needs.create',[
            'users' => User::customers(),
            'category' => CategoryModel::pluck('name', 'id')->prepend('', 'Select Option')
        ]);
    }
}
