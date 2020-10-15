<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index', compact('categories'))->with('panel_title', 'Categories List');
    }

    public function create()
    {
        return view('admin.category.create')->with('panel_title', 'Add New Category');
    }

    public function store(Request $request)
    {
        //validation must be done
        $category=Category::create($request->all());
        $dataItem=$category;


        if ($category && $category instanceof Category){
            return redirect(route('admin.categories'))->with(['success'=>'The category is added', 'updated_data'=> $dataItem]);
        }
    }

    public function edit(Request $request, $category_id)
    {
        $categoryItem=Category::find($category_id);
        return view('admin.category.edit', compact('categoryItem'))->with('panel_title', 'Edit The Category');
    }

    public function update(Request $request, $category_id)
    {
        $category=Category::find($category_id);
        if ($category){
            $categoryItem=$category->update($request->all());
        }
        $updated_category=Category::find($category_id);
        return redirect(route('admin.categories'))->with(['success'=>'The Category is updated', 'updated_data'=> $updated_category]);
    }
}
