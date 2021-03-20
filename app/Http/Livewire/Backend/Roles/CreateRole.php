<?php

namespace App\Http\Livewire\Backend\Roles;

use App\Http\Controllers\backend\RoleController;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateRole extends Component
{
    public $permissions;
    public $name;
    public $selectedPermissions = [];
    public $selectedAll = false;
    public function render()
    {
        $this->selectedAll =  in_array(false, $this->selectedPermissions) || (count($this->selectedPermissions) != count($this->permissions)) ? false : true;
        return view('livewire.backend.roles.create-role');
    }
    public function updatedselectedAll($value)
    {
        if ($value) {
            $this->selectedPermissions = collect($this->permissions)->pluck('id');
            $this->selectedPermissions = array_fill_keys($this->selectedPermissions->toArray(), true);
        } else {
            $this->selectedPermissions = [];
        }
    }
    public function save(RoleController $permission)
    {
        if (auth()->user()->hasPermissionTo('add_role')) {
            $data = new Request(['name' => $this->name, 'permissions' => $this->selectedPermissions]);
            $permission->store($data);
        }else{
            abort(403, 'unauthrized');
        }
        
    }
}
