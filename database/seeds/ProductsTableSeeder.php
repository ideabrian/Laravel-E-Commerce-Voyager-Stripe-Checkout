<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=1; $i<30; $i++){
            \App\Product::create([
                'name' => 'Laptop '.$i,
                'slug' => 'laptop-'.$i,
                'details' => $faker->text(200),
                'price' => mt_rand(50,2000),
                'description' => $faker->text(500),
                'category_id' => mt_rand(1,5)
            ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        for ($i=1; $i<15; $i++){
            \App\Product::create([
                'name' => 'Dektop '.$i,
                'slug' => 'dektop-'.$i,
                'details' => $faker->text(200),
                'price' => mt_rand(50,2000),
                'description' => $faker->text(500),
                'category_id' => mt_rand(1,7)
            ])->categories()->attach(2);
        }

        for ($i=1; $i<15; $i++){
            \App\Product::create([
                'name' => 'Mobile Phones '.$i,
                'slug' => 'mobile-phone-'.$i,
                'details' => $faker->text(200),
                'price' => mt_rand(50,2000),
                'description' => $faker->text(500),
                'category_id' => mt_rand(1,7)
            ])->categories()->attach(3);
        }

        for ($i=1; $i<15; $i++){
            \App\Product::create([
                'name' => 'Tablet '.$i,
                'slug' => 'tablet-'.$i,
                'details' => $faker->text(200),
                'price' => mt_rand(50,2000),
                'description' => $faker->text(500),
                'category_id' => mt_rand(1,7)
            ])->categories()->attach(4);
        }

        for ($i=1; $i<15; $i++){
            \App\Product::create([
                'name' => 'Tvs '.$i,
                'slug' => 'tvs-'.$i,
                'details' => $faker->text(200),
                'price' => mt_rand(50,2000),
                'description' => $faker->text(500),
                'category_id' => mt_rand(1,7)
            ])->categories()->attach(5);
        }

        for ($i=1; $i<15; $i++){
            \App\Product::create([
                'name' => 'Digital Camera '.$i,
                'slug' => 'digital-camera-'.$i,
                'details' => $faker->text(200),
                'price' => mt_rand(50,2000),
                'description' => $faker->text(500),
                'category_id' => mt_rand(1,7)
            ])->categories()->attach(6);
        }

        for ($i=1; $i<15; $i++){
            \App\Product::create([
                'name' => 'Appliances '.$i,
                'slug' => 'appliances-'.$i,
                'details' => $faker->text(200),
                'price' => mt_rand(50,2000),
                'description' => $faker->text(500),
                'category_id' => mt_rand(1,7)
            ])->categories()->attach(7);
        }


        //factory(App\Product::class, 50)->create();
    }
}
