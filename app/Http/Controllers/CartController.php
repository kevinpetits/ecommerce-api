<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // return $request->user()->id;
        $cart = \Cart::session($request->user()->id)->getContent();

        return response()->json($cart, 200);
        // return uniqid($request->user()->id);
    }

    public function add(Request $request)
    {
        // $cart = \Cart::session($request->user()->id)->getContent();
        $product = Product::find($request->product_id);
        \Cart::session($request->user()->id)->add(array('id' => $product->id, 'name' => $product->product_name, 'price' => $product->price, 'quantity' => 1, 'associatedModel' => $product));
        return \Cart::getContent()->toArray();
    }

    public function increaseQuantity(Request $request)
    {
        $rowID = $request->product_id;
        return \Cart::session($request->user()->id)->update($rowID, array('quantity' => 1));
    }

    public function decreaseQuantity(Request $request)
    {
        $rowID = $request->product_id;
        \Cart::session($request->user()->id)->update($rowID, array('quantity' => -1));
        return \Cart::getContent();
    }

    public function removeProduct(Request $request)
    {
        $rowID = $request->product_id;
        \Cart::session($request->user()->id)->remove($rowID);
        return \Cart::getContent();
    }

    public function delete(Request $request)
    {
        return \Cart::session($request->user()->id)->clear();
    }
}
