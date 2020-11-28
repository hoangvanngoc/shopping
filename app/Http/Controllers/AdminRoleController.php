<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permissions;
    public function __construct(Role $role,Permission $permissions)
    {
        $this->role = $role;
        $this->permissions = $permissions;
    }
    public function index()
    {
        $roles = $this->role->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionParent = $this->permissions->where('parent_id', 0)->get();
        return view('admin.role.add',compact('permissionParent'));
    }
    public function store(Request $request)
    {
       $role = $this->role->create([
            'name'=>$request->name,
            'display_name'=>$request->display_name
        ]);
        $role->permission()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function edit($id)
    {
        $permissionParent = $this->permissions->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionchecked = $role->permission;
        return view('admin.role.edit',compact('permissionParent','role','permissionchecked'));
    }

    public function update(Request $request,$id)
    {
        $role = $this->role->find($id);
        $role->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name
        ]);
        $role->permission()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->role);
    }

}
