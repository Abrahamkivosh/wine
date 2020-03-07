<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(array(
            'name' => 'required',
            'phone' =>'required',
            'email' =>"required|email"
        ));
        $supplier = new Supplier();
        $supplier->name = $request->name ;
        $supplier->phone = $request->phone ;
        $supplier->email = $request->email ;
        if ( $supplier->save() ) {
            # code...
            return redirect()->route('suppliers.index')->with('success',"SUpplier added to system") ;
        } else {
            # code...
            return back()->with('error',"Error occurred please try again")  ;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::findOrfail($id);
        return view('suppliers.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(array(
            'name' => 'required|string',
            'phone' =>'numeric|required',
            'email'=>'email|required'
        ));

        $supplier = Supplier::findOrfail($id);
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->save();

        if ($supplier){

            $request->session()->flash('success','Supplier detials updated');
            return back();

        } else {
            $request->session()->flash('error','Error occured please try again');
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrfail($id);
        $supplier->delete() ;

    Session::flash('success', "Deleted successfully");
    return redirect()->route('suppliers.index') ;

    }
}
