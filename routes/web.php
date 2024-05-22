<?php
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CategoryFileAdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DataUsersController;
use App\Http\Controllers\UserTypesController;
use App\Http\Controllers\CategoryFileController;
use App\Http\Controllers\CategoryProductsController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaidController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\PersonalizedOrderController;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/admin', function () {
    return view('admin.admin');
});

//CategoryFileAdminController
Route::controller(CategoryFileAdminController::class)->group(function(){
    Route::get('admin/galleries', 'index')->name('admin.galleries.index');
    Route::get('admin/galleries/create', 'create')->name('admin.galleries.create');
    Route::post('admin/galleries', 'store')->name('admin.galleries.store');
    Route::get('admin/galleries/show','show')->name('admin.galleries.show');
    Route::delete('admin/galleries/destroy/{id}','destroy')->name('admin.galleries.destroy');
    Route::get('admin/galleries/{id}/edit', 'edit')->name('admin.galleries.edit');
    Route::patch('admin/galleries/{id}', 'update')->name('admin.galleries.update');
    });

// Productos desde la vista del administrador (ProducAdminController)
Route::controller(ProductAdminController::class)->group(function(){
Route::get('admin/products', 'index')->name('admin.products.index');
Route::get('admin/products/create', 'create')->name('admin.products.create');
Route::post('admin/products', 'store')->name('admin.products.store');
Route::get('admin/products/{product}', 'show')->name('admin.products.show');
Route::get('admin/products/{product}/edit', 'edit')->name('admin.products.edit');
Route::put('admin/products/{product}', 'update')->name('admin.products.update');
Route::delete('admin/products/{product}', 'destroy')->name('admin.products.destroy');
});
// Productos desde la vista de usuario
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

//PayU
Route::post('payu', [PayController::class, 'indexCart'])->name('pay.payCart');
Route::get('payu/{product}', [PayController::class, 'index'])->name('pay.index');

Route::get('/gracias', function(){
    return view('thanks');
})->name('thanks');
Route::post('paid/payu', [PaidController::class, 'payu'])->name('paid.payu');

// auth

Route::prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('loginVerify', [AuthController::class, 'loginVerify'])->name('auth.loginVerify');
    Route::get('registro', [AuthController::class, 'register']);
    Route::post('registroVerify', [AuthController::class, 'registerVerify']);
    Route::get('continuarRegistro', [AuthController::class, 'continuarRegistro'])->name('continuarRegistro');
    Route::get('signOut', [AuthController::class, 'signOut'])->name('signOut');
    Route::post('dataUsers', [DataUsersController::class, 'store'])->name('dataUsers');
    Route::post('dataUsersAdmin', [DataUsersController::class, 'storeAdmin'])->name('dataUsersAdmin');
    Route::get('addUser', [AuthController::class, 'registerUser'])->name('addUser');
    Route::get('continuarRegistroAdmin', [AuthController::class, 'continuarRegistroAdmin'])->name('continuarRegistroAdmin');
    Route::post('destroyUser/{id}', [AuthController::class, 'destroyUser'])->name('destroyUser');

});

// registrar tipo usuario
Route::prefix('users')->group(function(){
    Route::get('user_types', [UserTypesController::class, 'index'])->name('user_types');
    Route::get('user_types_register_form', [UserTypesController::class, 'create'])->name('user_types_register_form');
    Route::post('user_types_register', [UserTypesController::class, 'store'])->name('user_types_register');
    Route::get('user_types_consult', [UserTypesController::class, 'consult'])->name('user_types_consult');
    Route::get('user_types/{id}/Edit', [UserTypesController::class, 'edit'])->name('user_types_edit');
    Route::put('user_types/{id}', [UserTypesController::class, 'update'])->name('user_types_update');
    Route::get('data_users_consult', [UserTypesController::class, 'indexUsers'])->name('data_users_consult');

    Route::get('data_users/{user}/Edit', [DataUsersController::class, 'editUsers'])->name('data_users_edit');
    Route::put('users/{userId}/data-users/{dataUserId}', [DataUsersController::class, 'updateDataUsers'])->name('update-data-users');
    Route::post('user_types/{id}', [UserTypesController::class, 'destroy'])->name('user_types_destroy');
});


Route::middleware('auth')->group(function(){

});



// Route::get('email', [ContactanosController::class, 'index'])->name('email.contactanos');
Route::post('/', [ContactanosController::class, 'store'])->name('contactanos.store');


Route::get('admin/files', [FileController::class, 'index'])->name('admin.files.index');
Route::get('admin/files/create', [FileController::class, 'create'])->name('admin.files.create');
Route::post('admin/files', [FileController::class, 'store'])->name('admin.files.store');
Route::get('admin/files/{file}/edit', [FileController::class, 'edit'])->name('admin.files.edit');
Route::put('admin/files/{file}', [FileController::class, 'update'])->name('admin.files.update');
Route::delete('admin/files/{file}', [FileController::class, 'destroy'])->name('admin.files.destroy');

Route::get('files', [FileController::class, 'index'])->name('files.index');
Route::get('files/create', [FileController::class, 'create'])->name('files.create');
Route::post('files', [FileController::class, 'store'])->name('files.store');
Route::get('files/{file}/edit', [FileController::class, 'edit'])->name('files.edit');
Route::get('files/{id}', [FileController::class, 'show'])->name('files.show');
Route::get('files/{file}/edit', [FileController::class, 'edit'])->name('files.edit');


Route::get('galleries', [CategoryFileController::class, 'index'])->name('galleries.index');
Route::get('galleries/{category}', [CategoryFileController::class, 'show'])->name('galleries.show');


// categorias de productos
Route::prefix('categoryProducts')->group(function(){
    Route::get('categoryProductsIndex', [CategoryProductsController::class, 'index'])->name('categoryProductsIndex');
    Route::get('categoryProductsCreate', [CategoryProductsController::class, 'createProducts'])->name('categoryProductsCreate');
    Route::post('categoryProductsShow', [CategoryProductsController::class, 'showProducts'])->name('categoryProductsShow');
    Route::get('categoryProducts/{id}/Edit', [CategoryProductsController::class, 'edit'])->name('categoryProductsEdit');
    Route::put('categoryProducts/{id}', [CategoryProductsController::class, 'update'])->name('categoryProductsUpdate');
    Route::delete('categoryProductsDelete/{id}', [CategoryProductsController::class, 'destroy'])->name('categoryProductsDelete');
});

//Articulos
Route::get('admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
Route::get('admin/articles/create/', [ArticleController::class, 'create'])->name('admin.articles.create');
Route::post('admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
Route::get('admin/articles/{id}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
Route::Patch('admin/articles/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
Route::delete('admin/articles/{id}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

//Menus
Route::get('admin/menus', [MenuController::class, 'index'])->name('admin.menus.index');
Route::get('admin/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
Route::post('admin/menus', [MenuController::class, 'store'])->name('admin.menus.store');
Route::get('admin/menus/{id}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
Route::patch('admin/menus/{menu}', [MenuController::class, 'update'])->name('admin.menus.update');
Route::delete('admin/menus/{id}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');

// carrito
Route::get('/cart-checkout', [cartController::class, 'cart'])->name('cart.checkout');
Route::post('/cart-add', [cartController::class, 'add'])->name('cart.add');
Route::post('/cart-clear', [cartController::class, 'clear'])->name('cart.clear');
Route::post('/cart-removeitem', [cartController::class, 'removeitem'])->name('cart.removeitem');
Route::get('culturalRoute', function () {
    return view('culturalRoute.index');
})->name('culturalRoute');

Route::get('inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('user/{user}/edit', [UserProfileController::class, 'edit'])->name('user_profile.edit');
Route::put('user/{user}', [UserProfileController::class, 'update'])->name('user_profile.update');


// Rutas para 'rutaCultural'
Route::get('/posts/inicio', [PostController::class, 'inicio'])->name('posts.inicio');

//Route::get('/rutaCultural', [PostController::class, 'index'])->name('rutaCultural.inicio');
Route::get('/rutaCultural/create', [PostController::class, 'create'])->name('rutaCultural.create');
Route::post('/rutaCultural', [PostController::class, 'store'])->name('rutaCultural.store');
Route::get('/rutaCultural/{post}', [PostController::class, 'show'])->name('rutaCultural.show');
Route::get('/rutaCultural/{post}/edit', [PostController::class, 'edit'])->name('rutaCultural.edit');
Route::put('/rutaCultural/{post}', [PostController::class, 'update'])->name('rutaCultural.update');
Route::delete('/rutaCultural/{post}', [PostController::class, 'destroy'])->name('rutaCultural.destroy');

Route::get('/all-routes', [PostController::class, 'allRoutes'])->name('allRoutess');


use App\Http\Controllers\PersonalizedSaleController;

// Ruta para mostrar el formulario con datos
//Route::get('/personalizedSale', [PersonalizedSaleController::class, 'create'])->name('personalizedSaleCreate');

// Ruta para procesar el formulario
//Route::post('/personalizedSale', [PersonalizedSaleController::class, 'store'])->name('personalizedSaleStore');

Route::get('/personalized-sale', [PersonalizedSaleController::class, 'create'])->name('personalizedSaleCreate');
Route::post('/personalized-sale/store', [PersonalizedSaleController::class, 'store'])->name('personalizedSaleStore');

// Ruta para mostrar el formulario de creación de productos personalizables
Route::get('/personalized/create_product', [PersonalizedSaleController::class, 'showCreateProductForm'])->name('personalized.create_product');

// Ruta para manejar el almacenamiento de un nuevo producto personalizable
Route::post('/personalized/store_product', [PersonalizedSaleController::class, 'storeProduct'])->name('personalized.store_product');

Route::get('/personalized/products', [PersonalizedSaleController::class, 'listProducts'])->name('personalized.list_products');
Route::get('/personalized/products/edit/{id}', [PersonalizedSaleController::class, 'editProduct'])->name('personalized.edit_product');
Route::put('/personalized/products/update/{id}', [PersonalizedSaleController::class, 'updateProduct'])->name('personalized.update_product');
Route::delete('/personalized/products/delete/{id}', [PersonalizedSaleController::class, 'deleteProduct'])->name('personalized.delete_product');
