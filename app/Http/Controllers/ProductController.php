<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->authorizeResource( Product::class,'products' );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize(User::class,'create');
       $suppliers = Supplier::all();
       $categories = Category::all();
        return view('products.create', compact('suppliers','categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize(User::class,'create');
        request()->validate(array(
            'name' => 'required',
            'size' =>"required" ,
            'quantity' =>"required|numeric",
            'buying_price' =>"required",
            'selling_price' =>"required",
            'tax' =>'required',
            'supplier_id' =>"required",
            'category_id'=>"required"

        ));

        $product = new Product() ;
        $product->name = $request->name ;
        $product->size = $request->size ;
        $product->quantity = $request->quantity ;
        $product->buying_price = $request->buying_price ;
        $product->selling_price = $request->selling_price ;
        $product->tax = $request->tax ;
        $product->supplier_id = $request->supplier_id ;
        $product->category_id = $request->category_id ;
        if($product->save()){
            return redirect()->route('products.index')->with('success',"Product added") ;
        }else{
            return back()->with('error',"Error occurred please try again") ;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $product = Product::findOrfail($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
       return  view('products.show', compact('product','categories','suppliers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update',$product);
        $product = Product::findOrfail($product->id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update',$product);
        request()->validate(array(
            'name' => 'required',
            'size' =>"required" ,
            'quantity' =>"required|numeric",
            'buying_price' =>"required",
            'selling_price' =>"required"
        ));
        $product = Product::findOrfail($product->id);
        $product->name = $request->input('name') ;
        $product->size = $request->input('size') ;
        $product->quantity = $request->input('quantity') ;
        $product->buying_price = $request->input('buying_price') ;
        $product->selling_price = $request->input('selling_price') ;
        $product->category_id = $request->input('category_id') ;
        $product->supplier_id = $request->input('supplier_id') ;
        if ( $product->save() ) {
            # code...
            return back()->with('success',"Product updated") ;
        } else {
            # code...
            return back()->with("error","Error occurred please try again");
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete',$product);
        $product = Product::findOrfail($product->id);
        $del = $product->delete() ;
        if ( $del ) {
            # code...
            return redirect()->route('products.index')->with('success','Product Deleted successfully')  ;
        } else {
            # code...
            return back()->with('error','Error occurred while deleting try again');
        }


    }
}
