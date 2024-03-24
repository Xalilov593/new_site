<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SecondCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags=Tag::all();
            $post=Post::latest()->first();
            $posts=Post::where('id', '!=', $post->id)->latest()->take(4)->get();
            $categories1=Category::orderBy('id')->limit(2)->get();
            $categories2=Category::orderByDesc('id')->limit(4)->get();
            $categories=Category::all();
            $statuss=SecondCategory::all();
        return view('post.index', compact('post', 'posts', 'categories1', 'categories2', 'categories', 'statuss', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags=Tag::all();
        $categories=Category::all();
        $second_categories=SecondCategory::all();
        return view('post.create', compact('categories', 'second_categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $image=$request->file('image');
        $path=public_path('/images/');
        $image_name=$image->getClientOriginalName();
        $image->move($path,$image_name);
        $postData=$request->except('image');
        $postData['image']=$image_name;
        $post=Post::create($postData);
        $post->tags()->attach($request->tag_id);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories=Category::all();
        $post=Post::findorFail($id);
        $tags=Post::findorFail($id)->tags;
        return view('post.show', compact('post', 'categories', 'tags'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   $post=Post::findOrFail($id);
        $categories=Category::all();
        $second_categories=SecondCategory::all();
        return view('post.edit', compact('post', 'categories', 'second_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request,$id)
    {
       $post=Post::findOrFail($id);
       $imagePath=public_path('images/'.$post->image);
       if(file_exists($imagePath)){
           unlink($imagePath);
       }
       $image=$request->file('image');
       $path=public_path('/images/');
       $image_name=$image->getClientOriginalExtension();
       $image->move($path,$image_name);
       $postData=$request->except('image');
       $postData['image']=$image_name;
       $post->update($postData);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $imagePath=public_path('images/'.$post->image);
        if (file_exists($imagePath)){
            unlink($imagePath);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
