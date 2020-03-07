<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function addCategory(){

        return view('Admin.category.add-category');
    }

    public function saveCategory(Request $request){

        // $category = new Category();

        // $category->category_name = $request->category_name;
        // $category->category_description = $request->category_description;
        // $category->status = $request->status;

        // $category->save();

        // DB::table('categories')->insert([

        // 	'category_name'    		  => $request->category_name,
        // 	'category_description'    => $request->category_description,
        // 	'status'    			  => $request->status,
        // ]);


    	Category::create($request->all());

        return redirect()->back()->with('msg','Category Add Successfully');
    }

    public function manageCategory(){

    	$categories = Category::all();

        return view('Admin.category.manage-category',['categories' => $categories]);
    }

    public function unpublishedCategory($id){

    	$category = Category::find($id);
    	$category->status = 0;
    	$category->save();

    	return redirect()->back()->with('message','Category Info Unublished Successfully!');
    }


    public function publishedCategory($id){

    	$category = Category::find($id);
    	$category->status = 1;
    	$category->save();

    	return redirect()->back()->with('message','Category Info Published Successfully!');
    }

    public function editCategoryIndex($id){

    	$category = Category::find($id);

    	return view('Admin.category.edit-category',['category' => $category]);
    }

    public function updateCategory(Request $request){

    	$category = Category::find($request->id);

    	$category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->status = $request->status;

        $category->save();



    	return redirect('/category/manage-category')->with('message','Category Updated Successfully!');
    }

    public function deleteCategory($id){

    	$category = Category::find($id);
    	$category->delete();

    	return redirect()->back()->with('message','Category Deleted Successfully!');
    }
}
