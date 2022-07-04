<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    protected $guarded = [];//no guard
    protected $table = 'products';

    public function insert($prod_title , $cat_id , $price , $image ,$description){
        $this->category_id = $cat_id;
        $this->title = $prod_title ;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->setCreatedAt(Carbon::now()->format('Y-m-d'));
        $this->save();
    }

    public function edit($prod_title , $cat_id , $price , $image ,$description){
        $this->editTitle($prod_title);
        $this->editCategory($cat_id);
        $this->editPrice($price);
        $this->editDescription($description);
        $this->image = $image;
        $this->setUpdatedAt(Carbon::now()->format('Y-m-d'));
        $this->save();
    }
    //
    public function editTitle($prod_title){
        $this->title = $prod_title;
        $this->save();
        //return true;
    }

    public function editCategory($cat_id){
        $this->category_id = $cat_id;
        $this->save();
        //return true;
    }

    public function editPrice($price){
        $this->price = $price;
        $this->save();
       // return true;
    }
    public function editDescription($desc){
        $this->description = $desc;
        $this->save();
        // return true;
    }
}
