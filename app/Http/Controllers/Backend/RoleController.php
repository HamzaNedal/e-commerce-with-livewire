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
        return view('backend.roles.index');
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('backend.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions(array_keys($request->permissions, true));
        return redirect(route('admin.roles'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get();
        $rolePermissions = array_fill_keys($role->permissions->pluck('id')->toArray(), true);
        $permissionsAndRolePermissions = ['roleData' => ['id' => $role->id, 'name' => $role->name], 'rolePermissions' => $rolePermissions, 'permissions' => $permissions];
        return view('backend.roles.edit', compact('permissionsAndRolePermissions'));
    }
    public function update(Request $request)
    {
        $role = Role::findOrFail($request->roleData['id']);
        $role->name = $request->roleData['name'];
        $role->save();
        $role->syncPermissions(array_keys($request->permissions, true));
        return redirect(route('admin.roles'));
    }
    public function destroy($id)
    {
        $role  = Role::findOrFail($id);
        $role->delete();
    }

}
