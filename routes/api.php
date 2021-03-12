<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Main Route */
Route::get('/', function(){
    return '<h1>This is Kevin ecommerce API</h1>';
});

/* Auth Routes */
Route::get('/users', [UserController::class, 'index'])->middleware(['auth:api', 'scopes:admin']);
Route::get('/user', [UserController::class, 'user'])->middleware('auth:api');
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/signin', [UserController::class, 'signin']);
/* Auth Routes */

/* Product Routes */
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/filter', [ProductController::class, 'productFilterStatus']);
Route::get('/products/category', [ProductController::class, 'productFilterCategory']);
Route::get('/product/{id}', [ProductController::class, 'product']);
Route::post('/create_product', [ProductController::class, 'createProduct'])->middleware(['auth:api', 'scopes:admin']);
Route::put('/update_product/{id}', [ProductController::class, 'updateProduct'])->middleware(['auth:api', 'scopes:admin']);
Route::delete('/delete_product/{id}', [ProductController::class, 'deleteProduct'])->middleware(['auth:api', 'scopes:admin']);
/* Product Routes */

/* Category Routes */
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'category']);
Route::post('/create_category', [CategoryController::class, 'createCategory'])->middleware(['auth:api', 'scopes:admin']);
Route::put('/update_category/{id}', [CategoryController::class, 'updateCategory'])->middleware(['auth:api', 'scopes:admin']);
Route::delete('/delete_category/{id}', [CategoryController::class, 'deleteCategory'])->middleware(['auth:api', 'scopes:admin']);
/* Category Routes */

Route::get('/cart', [CartController::class, 'index'])->middleware('auth:api');
Route::post('/add_to_cart', [CartController::class, 'add'])->middleware('auth:api');
Route::post('/increase', [CartController::class, 'increaseQuantity'])->middleware('auth:api');
Route::post('/decrease', [CartController::class, 'decreaseQuantity'])->middleware('auth:api');
Route::post('/delete_from_cart', [CartController::class, 'removeProduct'])->middleware('auth:api');
Route::delete('/clear', [CartController::class, 'delete'])->middleware('auth:api');
