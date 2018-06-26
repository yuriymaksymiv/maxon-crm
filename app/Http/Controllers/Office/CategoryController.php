<?php

namespace App\Http\Controllers\Office;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('office.categories.index', [
            'categories' => Category::paginate(30)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office.categories.create', [
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

        $category = new Category;

        $category->name = $request->name;
        $category->published = $request->published;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $category->user_id . '-' . time() . '-' . $image->getClientOriginalName();
            $destinationPath = public_path('storage' . '/' . 'user' . '-' . $category->user_id . '/' . 'category');
            $image->move($destinationPath, $filename);
            
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('office.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('office.categories.edit', [
            'category'      => $category,
            'categories'    => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'     => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $this->validate($request, [
            'name'  => 'required',
            'image' => 'image|max:20000'
        ]);

        $category = Category::find($category->id);

        $category->name = $request->name;
        $category->published = $request->published;
        $category->parent_id = $request->parent_id;
        $category->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $category->user_id . '-' . time() . '-' . $image->getClientOriginalName();
            $destinationPath = public_path('storage' . '/' . 'user' . '-' . $category->user_id . '/' . 'category');
            $image->move($destinationPath, $filename);

            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('office.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('office.category.index');
    }
}
