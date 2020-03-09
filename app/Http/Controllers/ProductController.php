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

    public function manageProduct(){

    	$products = Product::all();

        return view('Admin.product.manage-product',['products' => $products]);
    }

    public function unpublishedProduct($id){

    	$product = Product::find($id);
    	$product->status = 0;
    	$product->save();

    	return redirect()->back()->with('message','product Info Unublished Successfully!');
    }


    public function publishedProduct($id){

    	$product = Product::find($id);
    	$product->status = 1;
    	$product->save();

    	return redirect()->back()->with('message','product Info Published Successfully!');
    }

    public function editproductIndex($id){

    	$product = Product::find($id);
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $subImages = SubImage::where('product_id',$id)->get();

    	return view('Admin.product.edit-product',['product' => $product , 'categories' => $categories , 'brands' => $brands , 'subImages' => $subImages]);
    }

    public function updateproduct(Request $request){

    	$product = Product::find($request->id);

    	$product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->status = $request->status;

        $product->save();



    	return redirect('/product/manage-product')->with('message','product Updated Successfully!');
    }

    public function deleteProduct($id){

    	$product = Product::find($id);
    	$product->delete();

    	return redirect()->back()->with('message','product Deleted Successfully!');
    }
}
