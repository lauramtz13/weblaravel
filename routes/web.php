<?php

use Illuminate\Support\Facades\Route;
// crear los roles de usuario: admin y cliente
//use Spatie\Permission\Models\Role;
//Role::create(['name'=>'admin']);
//Role::create(['name'=>'cliente']);

//Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::group(['prefix' => 'admin', 	'middleware' => ['auth','role:admin']], function() {
    // rutas del usuario admin
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('detalle', App\Http\Controllers\Admin\DetalleController::class);
    Route::get('/generarpdf/{id}',  [App\Http\Controllers\Admin\UserController::class,"generarpdf"])->name("generarpdf");

    Route::resource('categoria', App\Http\Controllers\Admin\CategoriaController::class);
    Route::resource('subcategoria', App\Http\Controllers\Admin\SubcategoriaController::class);
    Route::resource('producto', App\Http\Controllers\Admin\ProductoController::class);
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
    Route::resource('config', App\Http\Controllers\Admin\ConfigController::class);
    Route::resource('carrusel', App\Http\Controllers\Admin\CarruselController::class);
    Route::resource('empresa', App\Http\Controllers\Admin\EmpresaController::class);
    


});
// rutas cart
Route::post('/store/cart-add',    [App\Http\Controllers\CartController::class,'add'])->name('cart.add');
Route::get('/store/cart-checkout',[App\Http\Controllers\CartController::class,'cart'])->name('cart.checkout');
Route::post('/store/cart-clear',  [App\Http\Controllers\CartController::class,'clear'])->name('cart.clear');
Route::post('/store/cart-removeitem',  [App\Http\Controllers\CartController::class,'removeitem'])->name('cart.removeitem');
Route::get('/store/procesar',[App\Http\Controllers\CartController::class,'proceso'])->name('cart.procesar');


Route::group(['prefix' => 'cliente', 	'middleware' => ['auth','role:cliente']], function() {
    // rutas del usuario cliente
    //echo "cliente";
});

Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::post('/buscador', [App\Http\Controllers\FrontController::class, 'buscador']);
Route::get('/blog', [App\Http\Controllers\FrontController::class, 'blog']);
Route::get('/blog/{blog:slug}', [App\Http\Controllers\FrontController::class, 'post']);

Route::view('/contacto', 'front.contacto');
Route::get('/empresa', [App\Http\Controllers\FrontController::class, 'empresa']);

Route::get('/{categoria:slug}', [App\Http\Controllers\FrontController::class, 'categoria']);
Route::get('/producto/{producto:slug}', [App\Http\Controllers\FrontController::class, 'producto']);
Route::get('/{categoria:slug}/{subcategoria:slug}', [App\Http\Controllers\FrontController::class, 'subcategoria']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
