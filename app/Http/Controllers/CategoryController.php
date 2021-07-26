<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function AllCat(){
        $categories = Category::latest()->paginate(2);
        return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please enter a category name',
            'category_name.max' => 'The name is too long (255 chars or more)'
        ]);

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return Redirect()->back()->with('success', 'Category Inserted Successfully');
    }
}
