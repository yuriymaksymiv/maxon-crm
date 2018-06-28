<?php

namespace App\Http\Controllers\Office;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('office.products.index', [
            'products' => Product::orderBy('name', 'ask')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office.products.create', [
            'category'      => [],
            'categories'    => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'     => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'image' => 'image|max:20000'
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->barcode = $request->barcode;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->sales = $request->sales;
        $product->total_sum = $request->total_sum;
        $product->unit_type = $request->unit_type;
        $product->favorite = $request->favorite;
        $product->published = $request->published;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->user_id = $request->user_id;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $product->user_id . '-' . time() . '-' . $image->getClientOriginalName();
            $destinationPath = public_path('storage' . '/' . 'user' . '-' . $product->user_id . '/' . 'products');
            $image->move($destinationPath, $filename);

            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('office.product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Category $category)
    {
        return view('office.products.edit', [
            'product'      => $product,
            'category'      => $category,
            'categories'    => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'     => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name'  => 'required',
            'image' => 'image|max:20000'
        ]);

        $product = Product::find($product->id);

        $product->name = $request->name;
        $product->barcode = $request->barcode;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->sales = $request->sales;
        $product->total_sum = $request->total_sum;
        $product->unit_type = $request->unit_type;
        $product->favorite = $request->favorite;
        $product->published = $request->published;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->user_id = $request->user_id;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $product->user_id . '-' . time() . '-' . $image->getClientOriginalName();
            $destinationPath = public_path('storage' . '/' . 'user' . '-' . $product->user_id . '/' . 'products');
            $image->move($destinationPath, $filename);

            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('office.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('office.product.index');
    }
}
