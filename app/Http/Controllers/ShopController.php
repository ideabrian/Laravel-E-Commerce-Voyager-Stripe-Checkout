<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 10;
        $categories = Category::all();
        if (\request('category')){
            $products = Product::with('categories')->whereHas('categories', function ($query){
               $query->where('slug',\request('category'));
            });

            $categoryName = optional($categories->where('slug', \request('category'))->first())->name;
        }else{
            $products = Product::where('featured', true);
            $categoryName = "Featured";
        }

        if (\request('sortBy') == "low_high"){
            $products = $products->orderBy('price')->paginate($paginate);
        }else if (\request('sortBy') == 'high_low'){
            $products = $products->orderBy('price', 'DESC')->paginate($paginate);
        }else{
            $products = $products->paginate($paginate);
        }

        return view('shop')->with([
            'products' => $products,
            'categories'=> $categories,
            'categoryName' => $categoryName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $products = Product::where('slug', '<>',$slug)->orderBy('id','DESC')->mightAlsoLike()->get();
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product')->with(['product'=>$product, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
