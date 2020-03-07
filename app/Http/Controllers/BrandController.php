<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function addBrand(){

        return view('Admin.brand.add-brand');
    }

    public function saveBrand(Request $request){

        // $brand = new brand();

        // $brand->brand_name = $request->brand_name;
        // $brand->brand_description = $request->brand_description;
        // $brand->status = $request->status;

        // $brand->save();

        // DB::table('categories')->insert([

        // 	'brand_name'    		  => $request->brand_name,
        // 	'brand_description'    => $request->brand_description,
        // 	'status'    			  => $request->status,
        // ]);


    	brand::create($request->all());

        return redirect()->back()->with('msg','Brand Add Successfully');
    }

    public function manageBrand(){

    	$brands = Brand::all();

        return view('Admin.brand.manage-brand',['brands' => $brands]);
    }

    public function unpublishedBrand($id){

    	$brand = brand::find($id);
    	$brand->status = 0;
    	$brand->save();

    	return redirect()->back()->with('message','Brand Info Unublished Successfully!');
    }


    public function publishedBrand($id){

    	$brand = brand::find($id);
    	$brand->status = 1;
    	$brand->save();

    	return redirect()->back()->with('message','Brand Info Published Successfully!');
    }

    public function editBrandIndex($id){

    	$brand = brand::find($id);

    	return view('Admin.brand.edit-brand',['brand' => $brand]);
    }

    public function updateBrand(Request $request){

    	$brand = brand::find($request->id);

    	$brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->status = $request->status;

        $brand->save();



    	return redirect('/brand/manage-brand')->with('message','Brand Updated Successfully!');
    }

    public function deleteBrand($id){

    	$brand = brand::find($id);
    	$brand->delete();

    	return redirect()->back()->with('message','Brand Deleted Successfully!');
    }
}
