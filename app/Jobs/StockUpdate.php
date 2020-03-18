<?php

namespace App\Jobs;

use App\Product;
use App\Stock;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StockUpdate
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $itemID , $itemQuantity ;
    public function __construct( $itemID ,$itemQuantity )
    {
        $this->itemId = $itemID;
        $this->itemQuantity = $itemQuantity ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $slug = $this->itemId ;

        $item = Stock::where('slug',$slug )->count();

        if($item > 0){
            $qty = DB::select('select quantity from stocks where slug = ?', [ $slug ]) ;
            $updatwqty = $qty[0]->quantity + $this->itemQuantity ;
            $stock = Stock::where('slug', $slug)
                        ->update([
                            'quantity' => $updatwqty
                            ]);


        } else{

            $product = Product::findOrfail($slug);
            $stock = new Stock() ;
            $stock->name = $product->name ;
            $stock->slug = $product->id ;
            $stock->quantity = $this->itemQuantity  ;
            $stock->buying_price = $product->buying_price ;
            $stock->selling_price = $product->selling_price ;

            if (  $stock->save()) {
                # code...
                Session::flash('success',"Item not found added stock ");
            }


         }

    }
}
