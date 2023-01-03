<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\{
    AboutController,
    ProfileController,
  BookController,
  NewsController,
  ContactController,
  CategoriesController
};
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\MessageController;

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
      Route::get('/',[AuthController::class, 'index'])->name('login');
      Route::post('/',[AuthController::class, 'login'])->name('login.submit');
      // Route::get('/register',[AuthController::class, 'register'])->name('register');
      // Route::post('/register', [AuthController::class, 'resgistersubmit'])->name('register.submit');
    });
      Route::group(['middleware'=>'noLogin'], function(){
          Route::get('/dashboard',function(){return view('admin/dashboard');})->name('dashboard');

          Route::get('/profile/edit',[ProfileController::class, 'index'])->name('profile');
          Route::post('/profile/update',[ProfileController::class, 'update'])->name('profile.update');
  
  
          Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
  
          Route::get('/message',[MessageController::class,'index'])->name('message');
  
          Route::get('/info',[NewsController::class, 'index'])->name('info');
          Route::post('/info',[NewsController::class, 'store'])->name('info.submit');
          Route::get('/info/edit/{id}',[NewsController::class, 'edit'])->name('info.edit');
          Route::post('/info/update/{id}',[NewsController::class, 'update'])->name('info.update');
          Route::get('/info/delete/{id}',[NewsController::class, 'delete'])->name('info.delete');
  
          Route::get('/contacts/edit',[ContactController::class, 'index'])->name('contacts');
          Route::post('/contacts/update',[ContactController::class, 'update'])->name('contacts.update');
  
          Route::get('/categories',[CategoriesController::class, 'index'])->name('categories');
          Route::post('/categories',[CategoriesController::class, 'store'])->name('categories.submit');
          Route::get('/categories/edit/{id}',[CategoriesController::class, 'edit'])->name('categories.edit');
          Route::post('/categories/update/{id}',[CategoriesController::class, 'update'])->name('categories.update');
          Route::get('/categories/delete/{id}',[CategoriesController::class, 'delete'])->name('categories.delete');
  
  
          Route::get('/book',[BookController::class, 'index'])->name('book');
          Route::post('/book',[BookController::class, 'store'])->name('book.submit');
          Route::get('/book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
          Route::post('/book/update/{id}',[BookController::class, 'update'])->name('book.update');
          Route::get('/book/delete/{id}',[BookController::class, 'delete'])->name('book.delete');

    
          Route::get('/abouts/edit',[AboutController::class, 'index'])->name('about');
          Route::post('/abouts/update',[AboutController::class, 'update'])->name('about.update');
  
          Route::get('/message/delete/{id}',[MessageController::class, 'delete'])->name('message.delete');
      
        });
    });

      Route::get('/',[FrontController::class,'index'])->name('home');
      Route::get('/books',[FrontController::class,'books'])->name('front.book');
      Route::get('/books-single/{book}',[FrontController::class,'booksSingle'])->name('book.single');
      Route::get('/news',[FrontController::class,'news'])->name('front.news');
      Route::get('/news-single',[FrontController::class,'newsSingle'])->name('front.news.single');
      Route::get('/about us',[FrontController::class,'about'])->name('front.about');
      Route::get('/message',[FrontController::class,'message'])->name('front.message');


