<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;


class AdminUserlController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
       $this->user = $user;
       $this->role = $role;
    }
    public function index()
    {
        $user = $this->user->paginate(10);
        return view('admin.user.index', compact('user'));
    }
    public function create()
    {
        $role = $this->role->all();
        return view('admin.user.add', compact('role'));
    }
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            DB::commit();
            $user->role()->attach($request->role_id);
            return redirect()->route('user.index');
        } catch(\Exception $exception)
        {
            DB::rollBack();
            Log::error('message'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }

    public function edit($id)
    {
        $role = $this->role->all();
        $user = $this->user->find($id);
        $roleofUser = $user->role;
        return view('admin.user.edit', compact('role','user','roleofUser'));
    }
    public function update(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $user = $this->user->find($id)->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            DB::commit();
            $user->role()->sync($request->role_id);
            return redirect()->route('user.index');
        } catch(\Exception $exception)
        {
            DB::rollBack();
            Log::error('message'.$exception->getMessage().'Line'.$exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
}
