<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::insert([
           ['parent_id'=>0,'name'=>'Laptops','slug'=>'laptops',],
           ['parent_id'=>0,'name'=>'Desktops','slug'=>'desktops',],
           ['parent_id'=>0,'name'=>'Mobile Phones','slug'=>'mobile-phones',],
           ['parent_id'=>0,'name'=>'Tablets','slug'=>'tablets',],
           ['parent_id'=>0,'name'=>'Tvs','slug'=>'tvs',],
           ['parent_id'=>0,'name'=>'Digital Cameras','slug'=>'digital-cameras',],
           ['parent_id'=>0,'name'=>'Appliances','slug'=>'appliances',]
        ]);
    }
}
