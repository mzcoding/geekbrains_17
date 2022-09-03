<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\Account\IndexController as AccountController;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;




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
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function() {
	Route::get('/', AdminController::class)
		->name('index');
	Route::resource('categories', AdminCategoryController::class);
	Route::resource('news', AdminNewsController::class);
});
});

//news routes
Route::get('/news', [NewsController::class, 'index'])
	->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('news.show');

Route::get('/collections', function() {
    $names = ['Anna', 'Jhon', 'Kim', 'Mike', 'Drake', 'Lili'];
    $collection = collect($names);

   dd($collection->map(
        fn($item) =>  strtoupper($item)
        )->sort()->toJson());
});

Route::get('/sessions', function() {
    $name = 'example';
    if(session()->has($name)) {

        session()->remove($name);
    }
    //session()->get($name);
    dd(session()->all());
    session()->put($name, 'Test example session');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
