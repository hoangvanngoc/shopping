<?php

namespace App\Http\Controllers;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Products1;
use App\Traits\StorageImageTraits;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\productTag;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class AdminProductController extends Controller
{
    use StorageImageTraits, DeleteModelTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category,Products1 $product,ProductImage $productImage,Tag $tag, productTag $productTag )
    {
       $this->category=$category;
       $this->product=$product;
       $this->ProductImage= $productImage;
       $this->tag=$tag;
       $this->productTag=$productTag;
    }
   public function index(){
       $product = $this->product->latest()->paginate(5);
       return view('admin.product.index', compact('product'));
   }

   public function create(){
    $htmlOption = $this->getCategory($parentID='');
       return view('admin.product.add', compact('htmlOption'));
   }

   public function getCategory($parentID){
    $data = $this->category->all();
    $recusive = new Recusive($data);
    $htmlOption = $recusive->categoryRecusive($parentID);
    return $htmlOption;
  }

  public function store(ProductAddRequest $request)
  {
  try{
        $dataProductCreate =[
              'name'=>$request->name,
              'price'=>$request->price,
              'content'=>$request->contents,
              'user_id'=>auth()->id(),
              'category_id'=>$request->category_id
        ];
        $datauploadfeatureImage = $this->storageTraitUpload($request, $fileName='feature_image_path', $forderName='product');
        if(!empty($datauploadfeatureImage)){
         $dataProductCreate['feature_image_name'] = $datauploadfeatureImage['file_name'];
         $dataProductCreate['feature_image_path'] = $datauploadfeatureImage['file_path'];
     }
     $product = $this->product->create($dataProductCreate);


 // insert data to product_image
         if($request->hasFile('image_path'))
         {
             foreach($request->image_path as $fileItem )
             {
                 $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                 $product->images()->create([
                     'image_path'=>$dataProductImageDetail['file_path'],
                     'image_name'=>$dataProductImageDetail['file_name']
                 ]);
             }
         }

         // insert tags to products tags
         $tagIdd = [];
         if(!empty($request->tags))
         {
            foreach($request->tags as $tagItem)
            {
             $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
                $tagIdd[] = $tagInstance->id;
            }

         }
         $product->tags()->attach($tagIdd);

         DB::commit();
         return redirect()->route('product.index');


  } catch(\Exception $exception)
  {
    DB::rollBack();
     Log::error('message'.$exception.'line'.$exception->getLine());
  }
}

    public function edit($id)
        {
            $product = $this->product->find($id);
            $htmlOption = $this-> getCategory($product->category_id);
            return view('admin.product.edit', compact('htmlOption', 'product'));
        }

public function update(Request $request, $id)
  {
            try{
                $dataProductUpdate =[
                    'name'=>$request->name,
                    'price'=>$request->price,
                    'content'=>$request->content,
                    'user_id'=>auth()->id(),
                    'category_id'=>$request->category_id
            ];
            $datauploadfeatureImage = $this->storageTraitUpload($request,'feature_image_path', 'product');
            if(!empty($datauploadfeatureImage)){
            $dataProductUpdate['feature_image_name'] = $datauploadfeatureImage['file_name'];
            $dataProductUpdate['feature_image_path'] = $datauploadfeatureImage['file_path'];
            }
             $this->product->find($id)->update($dataProductUpdate);
             $product = $this->product->find($id);



            // insert data to product_image
            if($request->hasFile('image_path'))
            {
                $this->ProductImage->where('product_id', $id)->delete();
                foreach($request->image_path as $fileItem )
                {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name']
                    ]);
                }
            }

            // insert tags to products tags
            $tagIdd = [];
            if(!empty($request->tags))
            {
                foreach($request->tags as $tagItem)
                {
                $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
                    $tagIdd[] = $tagInstance->id;
                }

            }
            $product->tags()->sync($tagIdd);
            DB::commit();
            return redirect()->route('product.index');


            } catch(\Exception $exception)
            {

            DB::rollBack();
            Log::error('message'.$exception.'line'.$exception->getLine());
            }
 }

 public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);
    }
    }

