<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        return Category::all();
    }

    public function category($id = null){
        return Category::findOrFail($id);
    }

    public function createCategory(categoryRequest $request){
        Category::create([
            'category' => $request->category,
            'description' => $request->description,
            'active' => $request->active,
        ]);
        return 'Category created succesfully!';
    }

    public function updateCategory(categoryRequest $request, $id){
        if(Category::where(['id' => $id])->update([
            'category' => $request->category,
            'description' => $request->description,
            'active' => $request->active,
        ])){
            return 'Category updated succesfully!';
        } else {
        return 'Category doesnt exist!';
        }
    }

    public function deleteCategory($id = null){
        if(Category::where(['id' => $id])->delete()){
            return 'Category deleted succesfully!';
        } else {
            return 'Category doesnt exist!';
        }
    }
}
