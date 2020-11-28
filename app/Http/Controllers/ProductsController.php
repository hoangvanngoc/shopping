<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('cartproducts.products', compact('products'));
    }
    public function cart(){
        return view('cartproducts.cart');

    }
    public function addToCart($id){
        $products = Product::find($id);
        // if cart is empty then this first product
        if(!$products){
            abort(404);
        }
        $cart= session()->get('cart');

        if(!$cart){
            $cart=[
                $id =>[
                    "name"=>$products->name,
                    "quantity"=>1,
                    "prince"=>$products->price,
                    "photo"=>$products->photo
                ]
                ];
                session()->put('cart',$cart);
                return redirect()->back()->with('success','Sản phẩm đã được thêm vào rỏ hàng thành công');

                    }
        //if cart not empty then check  if this product exist then increment quantity
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success','Sản phẩm đã được thêm vào rỏ hàng thành công');
        }
        $cart[$id] = [
         "name"=> $products->name,
         "quantity"=>1,
         "price"=> $products->price,
         "photo"=> $products->photo
        ];
        // if item not exist in cart then add to cart with quantity = 1
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Sản phẩm đã được thêm vào rỏ hàng thành công');
    }
    public function update(Request $request){
      if($request->id and $request->quantity){
          $cart =session()->get('cart');
          $cart[$request->id]['quantity'] = $request->quantity;
          session()->put('cart', $cart);
          session()->flash('success', 'Rỏ hàng Update thành công.');
      }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Xóa thành công.');
        }
    }



}

