<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use Auth;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('user.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.category.create');
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
            'name' => 'required|string|max:20|unique:categories',
            'slug' => 'string|alpha_dash|nullable|unique:categories'
        ]);

        $data = [];

        if ($request->filled('slug')) {
            $request->slug = strtolower($request->slug);
        } else {
            $data['slug'] = strtolower(str_replace(' ', '-', $request->name));
        }

        $request->merge($data);

        Category::create($request->all());

        return redirect('user/category')->with('success', 'Success Create Category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('user.category.edit', ['category' => $category]);
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
            'name' => 'required|string|max:20|unique:categories,name,'.$id,
            'slug' => 'string|alpha_dash|nullable|unique:categories,slug,'.$id
        ]);

        $category = Category::findOrFail($id);

        $category->update($request->all());

        return redirect('user/category')->with('success', 'Success Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('user/category')->with('success', 'Success Delete Data');
    }
}
