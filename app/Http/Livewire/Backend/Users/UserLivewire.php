<?php

namespace App\Http\Livewire\Backend\Users;

use App\Models\User;
use Livewire\Component;

class UserLivewire extends Component
{
    public $user;
    protected $listeners = ['editUser','resetForm'];

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
        
         if(array_key_exists('id',$this->user)){
            dd($this->user);
         }
         dd($this->user);
        
    }
    function store(){
        
    }
    function update(){

    }

}
