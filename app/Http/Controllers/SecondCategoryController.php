<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\SecondCategory;
use Illuminate\Http\Request;
use App\Models\Post;

class SecondCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=SecondCategory::all();
      return view('Second_Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Second_Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $second_category=$request->all();
        SecondCategory::create($second_category);
        return redirect()->route('secondcategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories=Category::all();
        $status=SecondCategory::findOrFail($id);
        $statuss=SecondCategory::all();
        $posts=Post::where('second_category_id', $status->id)->get();
        return view('Second_Category.show', compact('statuss', 'posts', 'status', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secondcategory=SecondCategory::findOrFail($id);
        return view('Second_Category.edit', compact('secondcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        SecondCategory::findOrFail($id)->update($request->all());
        return redirect()->route('secondcategories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       SecondCategory::findOrFail($id)->delete();
       return redirect()->route('secondcategories.index');

    }
}
