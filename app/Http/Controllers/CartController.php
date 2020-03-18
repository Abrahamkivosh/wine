<?php

namespace App\Http\Controllers;

use App\Jobs\StockUpdate;
use App\Product;
 // Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $cartCollection = \Cart::getContent() ;
        dd($cartCollection) ;
        return view('cart.cartItem') ;
    }
    public function add( Request $request , $id)
    {
        $product = Product::findOrfail($id);


        \Cart::add(array(
            'id' => $product->id , // inique row ID
            'name' => $product->name,
            'price' => $product->selling_price ,
            'quantity' => 1,
            'attributes' => array()
        ));
    return redirect()->route('home')->with('success',$product->name . " Added to cart") ;

    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->back()->with('success', 'Item is removed!');
    }

    public function update(Request $request){


        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->back()->with('success', 'Cart is Updated!');
    }
    public function clear(){
        \Cart::clear();
        return redirect()->route('home')->with('success', 'Car is cleared!');
    }
    public function checkout()
    {

        $cartCollection = \Cart::getContent();
        foreach ($cartCollection as $key => $item) {
            # code...
            $product = Product::findOrfail($item->id);
            $remaining = $product->quantity - $item->quantity ;
            // echo "Id : ". $item->id . " Quantity : ". $item->quantity ."<br />" ;
            Product::where('id', $item->id  )->update(['Quantity' => $remaining]);

            dispatch( new StockUpdate($item->id ,$item->quantity )) ;


        }
        \Cart::clear();

        return redirect()->back()->with('success', 'Products sold');
     //   return redirect()->back() ;



    }

}
