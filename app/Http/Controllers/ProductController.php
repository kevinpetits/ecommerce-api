<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        return Product::paginate(9);
    }

    public function product($id = null){
        return Product::findOrFail($id);
    }

    public function createProduct(ProductRequest $request){
        $file = $request->file('image');
        $name = rand(111,9999999).'.'.$file->extension();
        $path = $file->move(public_path('images/products'), $name);
        Product::create([
            'product_name' => $request->product_name,
            'src' => $name,
            'description' => $request->description,
            'status' => $request->status,
            'inventory' => $request->inventory,
            'price' => $request->price,
            'id_category' => $request->id_category
        ]);
        return 'Product created succesfully!';
    }

    public function productFilterStatus(Request $request){
        return Product::where(['status' => $request['status']])->paginate(9);
    }

    public function productFilterCategory(Request $request){
        return Product::where(['id_category' => $request['category']])->paginate(9);
    }

    public function updateProduct(ProductRequest $request, $id){
        if(Product::where(['id' => $id])->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'status' => $request->status,
            'inventory' => $request->inventory,
            'price' => $request->price,
            'active' => $request->active,
        ])){
            return 'Product updated succesfully!';
        } else {
        return 'Product doesnt exist!';
        }
    }

    public function deleteProduct($id = null){
        if(Product::where(['id' => $id])->delete()){
            return 'Product deleted succesfully!';
        } else {
            return 'Product doesnt exist!';
        }
    }
}
