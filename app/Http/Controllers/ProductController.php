<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\SubImage;

class ProductController extends Controller
{
    public function addProduct(){

        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();

        return view('Admin.product.add-product', [
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function saveProduct(Request $request){

        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = './product-images/';
        $imageURL = $directory.$imageName;
        $productImage->move($directory,$imageName);

        //return $imageURL;
        

         $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_price = $request->product_price;
        $product->product_stock = $request->product_stock;
        $product->product_sku = $request->product_sku;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->product_image = $imageURL;

        $product->save();

        $files = $request->file('sub_image');

        foreach ($files as $file) {
            
            $name = $file->getClientOriginalName();
            $directory = './product-sub-images/';
            $imageURL = $directory.$name; 
            $file->move($directory,$name);
             

            $subImage = new SubImage();

            $subImage->product_id = $product->id;
            $subImage->sub_image = $imageURL;
            $subImage->save();
        }

        return redirect()->back()->with('msg','Product Add Successfully');
    }

    // public function manageCategory(){

    // 	$categories = Category::all();

    //     return view('Admin.category.manage-category',['categories' => $categories]);
    // }

    // public function unpublishedCategory($id){

    // 	$category = Category::find($id);
    // 	$category->status = 0;
    // 	$category->save();

    // 	return redirect()->back()->with('message','Category Info Unublished Successfully!');
    // }


    // public function publishedCategory($id){

    // 	$category = Category::find($id);
    // 	$category->status = 1;
    // 	$category->save();

    // 	return redirect()->back()->with('message','Category Info Published Successfully!');
    // }

    // public function editCategoryIndex($id){

    // 	$category = Category::find($id);

    // 	return view('Admin.category.edit-category',['category' => $category]);
    // }

    // public function updateCategory(Request $request){

    // 	$category = Category::find($request->id);

    // 	$category->category_name = $request->category_name;
    //     $category->category_description = $request->category_description;
    //     $category->status = $request->status;

    //     $category->save();



    // 	return redirect('/category/manage-category')->with('message','Category Updated Successfully!');
    // }

    // public function deleteCategory($id){

    // 	$category = Category::find($id);
    // 	$category->delete();

    // 	return redirect()->back()->with('message','Category Deleted Successfully!');
    // }
}
