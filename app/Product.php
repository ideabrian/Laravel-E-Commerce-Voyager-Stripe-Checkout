<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'category_id','name', 'slug','details','price','description'
    ];
    protected $table = 'products';


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function presentPrice()
    {
        return money_format('%i', ($this->price / 100));
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(10);
    }
}
