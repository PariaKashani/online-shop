<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           'name'  => 'mobile',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name'  => 'camera',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name'  => 'television',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        //
    }
}
