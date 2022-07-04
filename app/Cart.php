<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cart extends Model
{
    protected $guarded = [];//no guard
    protected $table = 'carts';
    public function insert($user_id , $product_id){
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->count = 1;
        $this->setCreatedAt(Carbon::now()->format('Y-m-d'));
        $this->save();
    }
    public function count_minus(){
        $c = $this->count;
        $this->count = $c - 1 ;
    }
    public function count_plus(){
        $c = $this->count;
        $this->count = $c + 1;
    }
    //
}
