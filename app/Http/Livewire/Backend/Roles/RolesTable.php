<?php

namespace App\Http\Livewire\Backend\Roles;

use App\Http\Controllers\backend\RoleController;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Spatie\Permission\Models\Role;

class RolesTable extends LivewireDatatable
{
    public $model = Role::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->filterable()->searchable(),
            Column::name('permissions.name:group_concat')
                ->label('permissions'),
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.backend.actions', ['id' => $id, 'name' => $name, 'route_name' => 'roles']);
            })
        ];
    }


    function delete($id)
    {
        $permissionController = new  RoleController();
        $permissionController->destroy($id);
    }
}
