<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index()
    {
        $allPosts = Product::all();
        $categories = Category::all();
        return view('posts.index', ['posts' => $allPosts, 'categories' => $categories]);
    }

    public function create()
    {
        return view('posts.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',

        ]);
        Product::create($validated);
        return redirect()->route('posts.index')->with('message', 'Product saktaldy');

    }

    public function show(Product $post)
    {
        $categories = Category::all();
        $comments = Rating::all()->where('post_id', $post->id);
        return view('posts.show', ['post' => $post, 'comments' => $comments, 'categories' => $categories]);
    }

    public function edit(Product $post)
    {
        return view('posts.edit', ['post' => $post, 'categories' => Category::all()]);
    }

    public function update(Request $request, Product $post)
    {

        $post->update([
            'title' => $request->title,
            'content' => $request->input('content'),
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy(Product $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function postsByCategory(Category $category)
    {

        $posts = $category->posts;
        return view('posts.index', ['posts' => $posts, 'categories' => Category::all()]);

    }


}
