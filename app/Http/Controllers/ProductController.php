<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:50', Rule::unique('products', 'name')],
            'category_id' => ['required', 'numeric'],
            'brand_id' => ['required', 'numeric'],
            'sku' => ['required', 'string', 'min:2', 'max:100', Rule::unique('products', 'sku')],
            'image' => ['nullable','mimes:jpeg,jpg,png','max:1024'],
            'cost_price' => ['required','numeric'],
            'retail_price' => ['required','numeric'],
            'year' => ['required','numeric'],
            'description' => ['required'],
            'status' =>['required','numeric']
        ]);

        $products = new Product();
        $products->name = $request->name;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->sku = $request->sku;
        $products->cost_price = $request->cost_price;
        $products->retail_price = $request->retail_price;
        $products->year = $request->year;
        $products->description = $request->description;
        $products->status = $request->status;
        $products->sku = $request->sku;
        if($request->hasFile('image')){
            $image = $request->image;
            $name = Str::random(40).'.'.$image->getClientOriginalExtention();
            $image->storeAs(public_path('/public/images/products'),$name);
            $products->image = $name;
        }

        return response()->json([
            'success' => ' has been successfully updated.',
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
