<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Auth;

use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPost;

class PostController extends Controller
{

    // Get User Data
    public function user()
    {
        return Auth::user();
    }

    // Get User Id
    public function id()
    {
        return Auth::id();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->user()->post()->select('id', 'title', 'slug', 'created_at')->orderBy('id', 'desc')->paginate(10);
        return view('user.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all('id', 'name');
        $data = [
            'categories' => $categories
        ];
        if ($request->file) {
            $file = $this->user()->file()->findOrFail($request->file);
            $data['file'] = $file->file;
        }
        return view('user.post.create', $data);
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
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'string|alpha_dash|nullable|unique:posts|max:255'
        ]);

        $data = [
            'user_id' => $this->id()
        ];

        if ($request->filled('slug')) {
            $request->slug = strtolower($request->slug);
        } else {
            $title = preg_replace("/[^a-zA-Z\s]/", "", $request->title);
            $slug = str_replace(' ', '-', strtolower($title));
            $data['slug'] = $slug;
        }

        $request->merge($data);

        $post = Post::create($request->all());
        $post->category()->attach($request->category);

        return redirect('user/post')->with('success', 'Success Create New Post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all('id', 'name');
        $post = $this->user()->post()->findOrFail($id);
        $categoryPost = $post->category()->pluck('category_id')->toArray();

        return view('user.post.edit', [
            'post' => $post,
            'categories' => $categories,
            'categoryPost' => $categoryPost
        ]);
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'string|alpha_dash|nullable|max:255|unique:posts,slug,'.$id
        ]);

        $data = [];

        if ($request->filled('slug')) {
            $request->slug = strtolower($request->slug);
        } else {
            $title = preg_replace("/[^a-zA-Z\s]/", "", $request->title);
            $slug = str_replace(' ', '-', strtolower($title));
            $data['slug'] = $slug;
        }

        $post = $this->user()->post()->findOrFail($id);

        $request->merge($data);

        $post->update($request->all());
        $post->category()->sync($request->category);

        return redirect('user/post')->with('success', 'Success Edit Post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->user()->post()->findOrFail($id);
        $post->delete();

        return redirect('user/post')->with('success', 'Success Delete Post');
    }

}
