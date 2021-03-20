<?php

namespace App\Http\Livewire\Backend\Users;

use App\Http\Controllers\Backend\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserLivewire extends Component
{
    public $user;
    protected $listeners = ['editUser','resetForm','messageAlertSuccess'];
    public function render()
    {
        $roles = Role::get();
        return view('livewire.backend.users.user-livewire',['roles'=>$roles]);
    }

  
    function editUser($id){
        $this->resetForm();
        $user = User::find($id);
        if($user){
            $this->user['id'] = $user->id;
            $this->user['name'] = $user->name;
            $this->user['email'] = $user->email;
            $this->user['phone_number'] = $user->phone_number;
            $this->user['dob'] = $user->dob;
            $this->user['status'] = $user->status;
            if(!empty($user->roles->pluck('name')->toArray())){
                $this->user['role'] = $user->roles->pluck('name')->toArray()[0];
            }
        }
        $this->emit('showMe','block');
    }
    function resetForm()
    {
       $this->reset('user');
       $this->resetValidation();
    }
    protected $rules = [
        'user.name' => 'required|string|min:6',
        'user.email' => 'required|email|max:255',
        // 'user.password' => 'required|string|min:8|max:255',
    ];

    public function save()
    {  
         $this->validate();
         $this->emit('resetForm');
         $this->emit('columns');
         if(array_key_exists('id',$this->user)){
            if(auth()->user()->hasPermissionTo('edit_user')){
                return $this->update();
            }
            return abort(403,'unauthrized');
         }
         if(auth()->user()->hasPermissionTo('add_user')){
            return $this->store();
         }
         return abort(403,'unauthrized');
        
    }
    function store(){
       $user = User::create($this->user);
       $user->syncRoles([$this->user['role']]);
       $this->emit('messageAlertSuccess','User added successfully');
    }
    function update(){
        // dd($this->user);
        $user = User::FindOrFail($this->user['id']);
        $user->syncRoles([$this->user['role']]);
        unset($this->user['role']);
        $user->update($this->user);
        $this->emit('messageAlertSuccess','User Updated successfully');
        $this->emit('showMe','none');
    }
    public function messageAlertSuccess($message)
    {
        $this->alert(
            'success',
            "$message"
        );
    }

}
