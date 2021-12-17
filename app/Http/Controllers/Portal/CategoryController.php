<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('category')->get();

        return view('portal.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('portal.categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->only([
            'name', 'description', 'parent_id', 'name_en', 'description_en'
        ]);
        Category::create($data);

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::where('id', '!=', $id)->get();

        return view('portal.categories.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->only([
            'name', 'description', 'parent_id', 'name_en', 'description_en'
        ]);
        Category::find($id)->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('categories.index');
    }
}
