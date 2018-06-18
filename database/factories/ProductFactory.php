<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    $title = $faker->text(50);
    $slug = str_slug($title);
    return [
        'category_id'=> mt_rand(1,10),
        'name'=>$title,
        'slug' =>$slug,
        'details' => $faker->realText(200),
        'price' => mt_rand(50,2000),
        'description'=>$faker->text,
    ];
});
