<?php

namespace App\Http\Livewire\Backend\Roles;

use App\Http\Controllers\backend\RoleController;
use Illuminate\Http\Request;
use Livewire\Component;

class EditRole extends Component
{
    public $permissionsAndRolePermissions;
    public $roleData;
    public $selectedPermissions = [];
    public $selectedAll = false;
    public function mount()
    {
        $this->roleData = $this->permissionsAndRolePermissions['roleData'];
        $this->selectedPermissions = $this->permissionsAndRolePermissions['rolePermissions'];
        if (count($this->selectedPermissions) == count($this->permissionsAndRolePermissions['permissions'])) {
            $this->selectedAll = true;
        }
    }
    public function render()
    {
        $this->selectedAll =  in_array(false,$this->selectedPermissions) || (count($this->selectedPermissions) != count($this->permissionsAndRolePermissions['permissions'])) ? false : true;
        return view('livewire.backend.roles.edit-role');
    }

    public function updatedselectedAll($value)
    {
        if ($value) {
            $this->selectedPermissions = collect($this->permissionsAndRolePermissions['permissions'])->pluck('id');
            $this->selectedPermissions = array_fill_keys($this->selectedPermissions->toArray(), true);
        } else {
            $this->selectedPermissions = [];
        }
    }
    public function update(RoleController $permission)
    {
        $data = new Request(['roleData' => $this->roleData, 'permissions' => $this->selectedPermissions]);
        $permission->update($data);
    }
}
