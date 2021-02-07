<?php

namespace App\Http\Livewire\Admin;

use App\Enums\PaginationEnum;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\User  as UserModel ;
use Livewire\WithPagination;
use App\Enums\FlashMessagesEnum;
class User extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $name, $email, $phone, $password, $roleId, $user_id, $record;
    public $updateModel = false;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|unique:users|min:2',
        'phone' => 'required|numeric|min:4',
        'password' => 'required|min:2',
        'roleId' => 'required|'
    ];

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->password = '';
        $this->roleId = '';
        $this->user_id = '';
        $this->record = '';
        $this->updateModel = false;
    }


    public function store()
    {
        $validate = $this->validate();

        array_map( function ($values) {
            $role = $values['roleId'];
            unset( $values['roleId'] );
            $user = UserModel::create( $values );
            $user->roles()->attach( $role  );
        }, [$validate]);
        $this->resetInputFields();
        $this->emit('modalFadeOut');
        $this->emit('showCreatedUpdatedToast',
            FlashMessagesEnum::CreatedMsg);
    }


    public function update()
    {

        $data = $this->validate([
            'name' => 'required|min:2',
//            'email' => 'required|unique:users|min:2',
            'phone' => 'required|numeric|min:4',
            'roleId' => 'required|'
        ]);


        $this->record->update(
            $data
        );
        $this->resetInputFields();
        $this->emit('modalFadeOut');
        $this->emit('showCreatedUpdatedToast',
            FlashMessagesEnum::UpdateMsg);

    }

    public function edit($id)
    {

        $record = UserModel::findOrFail( $id );
        $this->record = $record;
        $this->user_id = $id;
        $this->email = $record->email;
        $this->name = $record->name;
        $this->phone = $record->phone;
        $this->roleId = $record->roles->first()->id;
        $this->updateModel = true;
    }


    public function delete($id)
    {
        UserModel::destroy($id);
        $this->emit('showCreatedUpdatedToast',
            FlashMessagesEnum::DeletedMsg);
    }

    public function render()
    {
        return view('livewire.admin.user.index',[
            'records' => UserModel::where('id','!=', Auth::id())->with('roles')->paginate(PaginationEnum::Show10Records),
            'roles' =>  Roles::where('name','!=', 'Admin')->pluck('name', 'id')->prepend('','Select Role'),
        ]);
    }
}
