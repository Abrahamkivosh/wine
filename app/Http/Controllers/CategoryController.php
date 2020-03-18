<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth") ;
    }

    public function index()
    {
        $categories = Category::all();
        return view('Category.index',compact('categories'));
    }


    public function create()
    {
        throw_if( !
        Auth::user()->isAdmin,
        new AuthorizationException("You do not have privilagies to create any category")
         );
        return view('Category.create');
    }


    public function store(Request $request)
    {
        request()->validate(array(
            'name' => 'required',
        ));

        // Category::create(['name' => $request->name ]);
        $category = new  Category();
        $category->name = $request->name ;
        $category->save() ;
        Session::flash("success", "Category created successfully" ) ;
        return redirect()->route('categories.index');
    }


    public function show(Category $category)
    {
        $category = Category::find($category->id) ;
        return view('Category.show',compact('category')) ;
    }


    public function edit(Category $category)
    {
        //
    }

   function update(Request $request, Category $category)
    {
        throw_if( !
        Auth::user()->isAdmin,
        new AuthorizationException("You do not have privilagies to update any category")
         );
        $category = Category::findOrfail($category->id);
        $category->name = $request->name ;
        $category->save();
        Session::flash("success", "Category Updated successfully" ) ;
        return redirect()->back();
    }


    public function destroy(Category $category)
    {
        throw_if( !
        Auth::user()->isAdmin,
        new AuthorizationException("You do not have privilagies to delete any category")
         );

        $category = Category::findOrfail($category->id);

        $category->delete();
        Session::flash("success", $category->name ." Deleted successfully" ) ;
        return redirect()->back();

    }
}
