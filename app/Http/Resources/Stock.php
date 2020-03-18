<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Stock extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'quantity'=>$this->quantity ,
            'buy' => $this->buying_price ,
            'sale'=> $this->selling_price ,
            'updated' =>$this->updated_at
        ] ;
    }

    public function with($request)
    {
        return [
            'profit'=> (($this->selling_price - $this->buying_price ) * $this->quantity ) ,

        ] ;

    }


}
