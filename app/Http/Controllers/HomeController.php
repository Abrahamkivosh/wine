<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // dd( \Cart::getContent()  ) ;
        $products = Product::orderBy('id', 'DESC')->get();
        return view('home',compact('products'));

    }

    public function employees()
    {
        throw_if(
            !Auth::user()->isAdmin,
            AuthorizationException::class,
            "You are not allowed to access this page"

        );
        $employees = User::all();
        return view('employees.index', compact('employees') );

    }
    public function addEmployee()
    {
        $this->authorize("create",User::class) ;
        return view('employees.create');

    }
    public function addEmployeeStore(Request $request)
    {
        $this->authorize("create",User::class) ;
        request()->validate(array(
            'name' => 'required',
            'email'=>"required|unique:users,email|email",
            'phone'=>"required|unique:users,phone",
            'isAdmin'=>"required",
            'password' => "nullable|min:8"

        ));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'isAdmin' =>$request->isAdmin,
            'password' => bcrypt( $request->password)
            ]);
            if ( $user == true ) {
                # code...
                $value = "New employee created successfully";
                $request->session()->flash('success', $value);
                return redirect()->route('employees') ;

            } else {
                # code...
                $value = "Please try again error occured";
                $request->session()->flash('success', $value);
                return redirect()->back() ;

            }

    }

    public function deleteEmployee(  $id )
    {
        $user = User::findOrfail($id);

        throw_if(! Auth::user()->isAdmin ,
        new AuthorizationException("You are not allowed to delete employee")
    );
    $admins = User::where('isAdmin',1)->count() ;
    if ( $admins == 1 ) {
        Session::flash("error", "You are only remaining Administrator please make another user administrator first!!");
        return redirect()->back() ;
    }else{
        $user->delete();
        Session::flash("success","User deleted successfully") ;
        return redirect()->back() ;
    }


    }



}
