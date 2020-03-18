<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Http\Resources\Stock;
use App\Product;
use App\Stock as AppStock;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth') ;
    }
    public function index()
    {
       $stock_product = Stock::collection(AppStock::all());
       $total_profit = $stock_product->sum(function($stock){
           return (($stock['selling_price'] - $stock['buying_price']  ) * $stock['quantity']  ) ;
       });
       $users = User::all()->count();
       $total_sales = $stock_product->sum(function ($stock)
       {
           return $stock['selling_price']  * $stock['quantity'] ;
       });
       $externalCost = Cost::pluck('amount')->sum() ;
      return view('stock.stock' , compact('users','externalCost'))->with('stockProducts',$stock_product)
                            ->with('totalProfit',$total_profit)
                            ->with('total_sales',$total_sales) ;

    }

    public function newAnalysis ()
    {
        throw_if( ! Auth::user()->isAdmin,
        new AuthorizationException("You do not have full privilage to start new analysis")
    );
        $count = AppStock::all()->count();
       $delete =  DB::delete('DELETE FROM `stocks` WHERE `id` > 0 ') ;
       if ($delete ) {
        return redirect()->back()->with("success",'New Stock profit analysis initialized') ;

       }

       return redirect()->back()->with("error",'Please try again error occurred') ;
    }
}
