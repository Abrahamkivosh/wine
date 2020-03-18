<?php

namespace App\Http\Controllers;

use App\Cost;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth") ;
    }

    public function index()
    {
        $costs = Cost::orderBy('id', 'desc') ->paginate(10);
        $total_cost = Cost::pluck('amount')->sum();



        return view('cost.index',compact('costs','total_cost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cost.create');
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
            'name' => 'required|string',
            'amount'=> 'required|numeric'
        ));
        $cost = new Cost();
        $cost->name = $request->name;
        $cost->amount = $request->amount;
        if( $cost->save() ){
            Session::flash('success',"New expenses created") ;
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function show(Cost $cost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit(Cost $cost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cost $cost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        throw_if(! Auth::user()->isAdmin ,
       new AuthorizationException("You do not have any privilagies to delete external costs") );
       $cost = Cost::find($id);
       $cost->delete();
       Session::flash('success','Deleted successfully');
       return redirect()->back();

    }
}
