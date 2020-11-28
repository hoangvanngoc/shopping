<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Client\Request as ClientRequest;
use Psy\CodeCleaner\FunctionContextPass;
use Illuminate\Support\Str;

class MenuController extends Controller
{

    private $menuRecusive;
    private $menu;

    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
       $this->menuRecusive = $menuRecusive;
       $this->menu = $menu;
    }
    public function index(){
       $menu = $this->menu->paginate(10);
        return view('admin.menu.index',compact('menu'));

    }

    public function create(){
        $optionSelect = $this->menuRecusive->menuRecusiveAdd($paren_id ='');
        return view('admin.menu.add', compact('optionSelect'));
    }
    public Function store(Request $request){
        $this->menu->create([
           'name'=>$request->name,
           'parent_id'=>$request->parent_id,
           'slug'=>Str::snake($request->name)
        ]);
        return redirect()->route('menu.index');

    }
    public function edit($id ,Request $request){
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveAdd($menuFollowIdEdit->parent_id);
return view('admin.menu.edit',compact('optionSelect','menuFollowIdEdit'));
    }
    public function update($id,Request $request){
        $this->menu->update([
            'name'=> $request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::snake($request->name)
        ]);
        return redirect()->route('menu.index');
    }
    public function delete($id){
        $this->menu->find($id)->delete();
        return redirect()->route('menu.index');
    }
}
