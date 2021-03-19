<?php

namespace App\Http\Livewire\Backend\Users;

use App\Http\Controllers\Backend\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class UserLivewire extends Component
{
    public $user;
    protected $listeners = ['editUser','resetForm','messageAlertSuccess'];
    public function render()
    {
        return view('livewire.backend.users.user-livewire');
    }

  
    function editUser($id){
        $user = User::find($id);
        if($user){
            $this->user['id'] = $user->id;
            $this->user['name'] = $user->name;
            $this->user['email'] = $user->email;
            $this->user['phone_number'] = $user->phone_number;
            $this->user['dob'] = $user->dob;
            $this->user['status'] = $user->status;
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
        'user.password' => 'required|string|min:8|max:255',
    ];

    public function save()
    {  
         $this->validate();
         $this->emit('resetForm');
         $this->emit('columns');
         if(array_key_exists('id',$this->user)){
            return $this->update();
         }
         return $this->store();
        
    }
    function store(){
        User::create($this->user);
        $this->emit('messageAlertSuccess','User added successfully');
    }
    function update(){
        User::where('id',$this->user['id'])->update($this->user);
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
