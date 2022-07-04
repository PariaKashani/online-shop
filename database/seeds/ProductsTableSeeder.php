<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'LG G7',
            'category_id' => '7' ,
            'description' => 'LG G7 ThinQ LTE 64GB 4GB RAM Black' ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //
    }
}
