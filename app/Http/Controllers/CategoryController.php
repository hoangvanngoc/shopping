<?php

namespace App\Http\Controllers;
use App\Components\Recusive;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;


    public function __construct(category $category)
     {

        $this->category = $category;
    }

public function mami($parentID='')
    {
  $htmlOption = $this->getCategory;
  return view('category.add', compact('htmlOption'));
    }

public function index(){
      $categories = $this->category->latest()->paginate(5);
        return view('category.index', compact('categories'));
    }


    public function store(Request $request){
    $this->category->create([
'name'=>$request->name,
'parent_id'=>$request->parent_id,
'slug'=>Str::snake($request->name)
    ]);
    return redirect()->route('categories.index');
    }

    public function getCategory($parentID){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentID);
        return $htmlOption;
    }


    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

         return view('category.edit', compact('category', 'htmlOption'));
          }


          public function delete($id){
           $this->category->find($id)->delete();
           return redirect()->route('categories.index');
          }

          public function update($id, Request $request){
$this->category->find($id)->update([
    'name'=>$request->name,
'parent_id'=>$request->parent_id,
'slug'=>Str::snake($request->name)
]);
      return redirect()->route('categories.index');
}
          }


