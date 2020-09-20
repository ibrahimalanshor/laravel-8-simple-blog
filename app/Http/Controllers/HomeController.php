<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class HomeController extends Controller
{

	public function index()
	{
		$posts = Post::orderBy('id', 'desc')->paginate(8);

		return view('home', ['posts' => $posts]);
	}

	public function post($slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();
		$categories = Category::paginate(10);
		$comments = $post->comment()->paginate(5);

		return view('post', [
			'post' => $post,
			'categories' => $categories,
			'comments' => $comments
		]);
	}

	public function category()
	{
		$categories = Category::all();
		
		return view('category', ['categories' => $categories]);
	}

	public function showCategory($slug)
	{
		$category = Category::where('slug', $slug)->firstOrFail();
		$posts = $category->post()->orderBy('id', 'desc')->paginate(8);

		return view('show-category', [
			'category' => $category,
			'posts' => $posts
		]);
	}

	public function comment(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'comment' => 'required|string'
		]);

		Comment::create($request->all());

		return redirect()->back()->with('success', 'Comment Success');
	}
}
