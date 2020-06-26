<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products',['products'=>$products]);
    }
    public function createGet(){
        
        return view('create');
    }
    public function createPost(){
       $product = new Product(); 
        $product->product_name=request('product_name');
        $product->description=request('description');
        $product->stock_number=request('stocknumber');
        $product->price=request('price');
        $product->save();
        return redirect('/products')->with('mssg','New Product has been added');
    }
    public function destroy($id){
        $product = Product::findorFail($id);
        $product->delete();
        return redirect('/products');
        
    }
    public function editGet($id){
        $product = Product::findorFail($id);

        return view('edit',['product'=>$product]);
    }
    public function editPost($id){
        $product = Product::findorFail($id);
        $product->product_name =  request('product_name');
        $product->stock_number =  request('stocknumber');
        $product->description =  request('description');
        $product->price =  request('price');
        $product->save();
        return redirect('/')->with('mssg','Updated');

    }
    public function sort(){

        $sorting_type = request('filter_type');
        if($sorting_type=='stock_number'){
            $product = Product::orderBy($sorting_type,'DESC')->get();
        }
        else{
            $product = Product::orderBy($sorting_type)->get();
        }
        
        return view('products',['products'=>$product]);

    }
    public function filterPrice(){
        
        $min = request('min');
        $max = request('max');
        $product = Product:: where('price', '>=',  $min)
        ->where('price', '<=', $max )->get();
        
        return view('products',['products'=>$product]);
        //return redirect('/products')->with( 'mssg',$product);
    }
    public function search(){
        
        $item = request('item');
        if(request('searchtype')=='product_name')
        {
            $product=Product::query()
            ->where('product_name', 'LIKE', "%{$item}%")  
            ->get();
        }
        else{
            $product=Product::query()
            ->where('description', 'LIKE', "%{$item}%")  
            ->get();
        }
        return view('products',['products'=>$product]);
}

}
