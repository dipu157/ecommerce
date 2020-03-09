<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
    'uses' => 'EcommerceController@index',
    'as' => '/'
]);

Route::get('/category/{id}',[
    'uses' => 'EcommerceController@category',
    'as' => 'category-product'
]);

/*=====================================Admin========================================*/

/*=========Category==========*/

Route::get('category/add-category',['uses' => 'CategoryController@addCategory', 'as' => 'add-category']);

Route::post('category/save-category',['uses' =>'CategoryController@saveCategory', 'as' => 'save-category']);

Route::get('category/manage-category',['uses' => 'CategoryController@manageCategory', 'as' => 'manage-category']);

Route::get('category/unpublished-category/{id}',['uses' => 'CategoryController@unpublishedCategory', 'as' => 'unpublished-category']);


Route::get('category/published-category/{id}',['uses' => 'CategoryController@publishedCategory', 'as' => 'published-category']);

Route::get('category/edit-category-index/{id}',['uses' => 'CategoryController@editCategoryIndex', 'as' => 'edit-category-index']);

Route::post('category/update-category',['uses' => 'CategoryController@updateCategory', 'as' => 'update-category']);

Route::get('category/delete-category/{id}',['uses' => 'CategoryController@deleteCategory', 'as' => 'delete-category']);

/*=========Brand==========*/

Route::get('brand/add-brand',['uses' => 'BrandController@addBrand', 'as' => 'add-brand']);

Route::post('brand/save-brand',['uses' =>'BrandController@saveBrand', 'as' => 'save-brand']);

Route::get('brand/manage-brand',['uses' => 'BrandController@manageBrand', 'as' => 'manage-brand']);

Route::get('brand/unpublished-brand/{id}',['uses' => 'BrandController@unpublishedBrand', 'as' => 'unpublished-brand']);


Route::get('brand/published-brand/{id}',['uses' => 'BrandController@publishedBrand', 'as' => 'published-brand']);

Route::get('brand/edit-brand-index/{id}',['uses' => 'BrandController@editBrandIndex', 'as' => 'edit-brand-index']);

Route::post('brand/update-brand',['uses' => 'BrandController@updateBrand', 'as' => 'update-brand']);

Route::get('brand/delete-brand/{id}',['uses' => 'BrandController@deleteBrand', 'as' => 'delete-brand']);

/*=========Product==========*/

Route::get('product/add-product',['uses' => 'ProductController@addProduct', 'as' => 'add-product']);

Route::post('product/save-product',['uses' =>'ProductController@saveProduct', 'as' => 'save-product']);

Route::get('product/manage-product',['uses' => 'ProductController@manageProduct', 'as' => 'manage-product']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



