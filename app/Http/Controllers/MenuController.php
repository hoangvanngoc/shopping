<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\MenuRecusive;

class MenuController extends Controller
{

    private $menuRecusive;

    public function __construct(MenuRecusive $menuRecusive)
    {
$this->menuRecusive = $menuRecusive;
    }
    public function index(){
        return view('menu.index');
    }

    public function create(){
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('menu.add', compact('optionSelect'));
    }
}
