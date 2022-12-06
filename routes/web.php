<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\CategoriesController;

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
Route::group(['prefix'=>'/admin'], function(){
    Route::group(['middleware'=>'isLogin'], function(){
      Route::get('/','App\Http\Controllers\AuthController@index')->name('login');
      Route::post('/','App\Http\Controllers\AuthController@login')->name('login.submit');
      Route::get('/register','App\Http\Controllers\AuthController@register')->name('register');
      Route::post('/register', 'App\Http\Controllers\AuthController@registersubmit')->name('register.submit');
    });
      Route::group(['middleware'=>'noLogin'], function(){
          Route::get('/dashboard',function(){
              return view('admin/dashboard'); 
            })->name('dashboard');


          Route::get('/profile/edit','App\Http\Controllers\ProfileController@index')->name('profile');
          Route::post('/profile/update','App\Http\Controllers\ProfileController@update')->name('profile.update');
  
  
          Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('logout');
  
          Route::get('/message','App\Http\Controllers\MessageController@index')->name('message');
  
          Route::get('/info',[NewsController::class, 'index'])->name('info');
          Route::post('/info',[NewsController::class, 'store'])->name('info.submit');
          Route::get('/info/edit/{id}',[NewsController::class, 'edit'])->name('info.edit');
          Route::post('/info/update/{id}',[NewsController::class, 'update'])->name('info.update');
          Route::get('/info/delete/{id}',[NewsController::class, 'delete'])->name('info.delete');
  
          Route::get('/contacts/edit',[ContactController::class, 'index'])->name('contacts');
          Route::post('/contacts/update/{id}',[ContactController::class, 'update'])->name('contacts.update');
  
          Route::get('/categories',[CategoriesController::class, 'index'])->name('categories');
          Route::post('/categories',[CategoriesController::class, 'store'])->name('categories.submit');
          Route::get('/categories/edit/{id}',[CategoriesController::class, 'edit'])->name('categories.edit');
          Route::post('/categories/update/{id}',[CategoriesController::class, 'update'])->name('categories.update');
          Route::get('/categories/delete/{id}',[CategoriesController::class, 'delete'])->name('categories.delete');
  
  
          Route::get('/book',[BookController::class, 'index'])->name('book');
          Route::post('/book/submit',[BookController::class, 'store'])->name('book.submit');
          Route::get('/book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
          Route::post('/book/update/{id}',[BookController::class, 'update'])->name('book.update');
          Route::get('/book/delete/{id}',[BookController::class, 'delete'])->name('book.delete');
  
          Route::get('/message/delete/{id}',[MessageController::class, 'delete'])->name('message.delete');
      
        });
    });