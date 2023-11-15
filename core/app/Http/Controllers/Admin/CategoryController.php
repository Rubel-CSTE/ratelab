<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $pageTitle  = 'Categories';
        $categories = Category::searchable(['name'])->orderBy('name')->paginate(getPaginate());
        return view('admin.category.index', compact('pageTitle', 'categories'));
    }

    public function store(Request $request, $id = 0)
    {
        $request->validate([
            'name' => 'required|string|max:40|unique:categories,name,' . $id,
            'icon' => 'required',
        ]);

        if ($id) {
            $category           = Category::findOrFail($id);
            $notification       = 'Category updated successfully';
        } else {
            $category           = new Category();
            $notification       = 'Category added successfully';
        }

        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->save();
        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function status($id)
    {
        return Category::changeStatus($id);
    }
}
