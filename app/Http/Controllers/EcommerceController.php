<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\SubImage;

class EcommerceController extends Controller
{
    public function index(){

    	$products = Product::where('status',1)->orderBy('id','desc')->get();

 	    $categories = Category::where('status',1)->get();

        return view('front.home.home',['products' => $products , 'categories' => $categories]);
    }
    
    public function category($id){

    	$categories = Category::where('status',1)->get();

    	$products = Product::where('status',1)->where('category_id',$id)->orderBy('id','desc')->get();

        return view('front.category.category',['categories' => $categories, 'products' => $products]);
    }
}
