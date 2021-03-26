<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $active = 'roles';
        return view('backend.roles.index',compact('active'));
    }

    public function create()
    {
        $active = 'roles';
        $permissions = Permission::get();
        return view('backend.roles.create', compact('permissions','active'));
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions(array_keys($request->permissions, true));
        return redirect(route('admin.roles.index'));
    }

    public function edit($id)
    {
        $active = 'roles';
        $role = Role::findOrFail($id);
        $permissions = Permission::get();
        $rolePermissions = array_fill_keys($role->permissions->pluck('id')->toArray(), true);
        $permissionsAndRolePermissions = ['roleData' => ['id' => $role->id, 'name' => $role->name], 'rolePermissions' => $rolePermissions, 'permissions' => $permissions];
        return view('backend.roles.edit', compact('permissionsAndRolePermissions','active'));
    }
    public function update(Request $request)
    {
        $role = Role::findOrFail($request->roleData['id']);
        $role->name = $request->roleData['name'];
        $role->save();
        $role->syncPermissions(array_keys($request->permissions, true));
        return redirect(route('admin.roles.index'));
    }
    public function destroy($id)
    {
        $role  = Role::findOrFail($id);
        $role->delete();
    }

}
