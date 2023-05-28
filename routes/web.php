<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\{
    AdminController,
    AboutController,
    ProfileController,
    BookController,
    NewsController,
    ContactController,
    CategoriesController,
    SliderController,
    TestimonialController,
    UserController
};
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use App\Models\Testimonial;

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
    });
      Route::group(['middleware'=>'noLogin'], function(){
          Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');

          Route::get('/profile/edit',[ProfileController::class, 'index'])->name('profile');
          Route::post('/profile/update',[ProfileController::class, 'update'])->name('profile.update');
  
  
          Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
  
          Route::get('/message',[MessageController::class,'index'])->name('message');
          Route::get('/message/delete/{id}',[MessageController::class, 'delete'])->name('message.delete');
          
          Route::get('/orders',[AdminController::class, 'orderTable'])->name('order');
          Route::get('/orders/delete/{id}',[AdminController::class, 'delete'])->name('order.delete');

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

          Route::get('/testimonial',[TestimonialController::class, 'index'])->name('testimonial');
          Route::post('/testimonial',[TestimonialController::class, 'store'])->name('testimonial.submit');
          Route::get('/testimonial/edit/{id}',[TestimonialController::class, 'edit'])->name('testimonial.edit');
          Route::post('/testimonial/update/{id}',[TestimonialController::class, 'update'])->name('testimonial.update');
          Route::get('/testimonial/delete/{id}',[TestimonialController::class, 'delete'])->name('testimonial.delete');

          Route::get('/slider',[SliderController::class, 'index'])->name('slider');
          Route::post('/slider',[SliderController::class, 'store'])->name('slider.submit');
          Route::get('/slider/edit/{id}',[SliderController::class, 'edit'])->name('slider.edit');
          Route::post('/slider/update/{id}',[SliderController::class, 'update'])->name('slider.update');
          Route::get('/slider/delete/{id}',[SliderController::class, 'delete'])->name('slider.delete');

          Route::get('/abouts/edit',[AboutController::class, 'index'])->name('about');
          Route::post('/abouts/update',[AboutController::class, 'update'])->name('about.update');
  
          

          Route::get('/users',[UserController::class,'index'])->name('user');
          Route::post('/users',[UserController::class, 'store'])->name('user.submit');
          Route::get('/users/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
          Route::post('/users/update/{id}',[UserController::class, 'update'])->name('user.update');
          Route::get('/users/delete/{id}',[UserController::class, 'delete'])->name('user.delete');

        });
    });

      Route::get('/',[FrontController::class,'index'])->name('home');
      Route::get('/books',[FrontController::class,'books'])->name('front.book');
      Route::get('/books-single/{book}',[FrontController::class,'booksSingle'])->name('book.single');

      Route::get('/books/{id}',[FrontController::class,'category'])->name('category');

      Route::get('/news',[FrontController::class,'news'])->name('front.news');
      Route::get('/news-single/{news}',[FrontController::class,'newsSingle'])->name('front.news.single');
      Route::get('/about us',[FrontController::class,'about'])->name('front.about');
      Route::get('/message',[FrontController::class,'message'])->name('front.message');
      Route::post('/message',[MessageController::class,'message'])->name('front.message.submit');

      Route::get('/user/sign-up',[UserController::class,'register'])->name('user.register');
      Route::post('/user/sign-up/submit',[UserController::class,'registerSubmit'])->name('user.register.submit');

      Route::get('/user/login',[UserController::class,'login'])->name('user.login');
      Route::post('/user/login-submit',[UserController::class,'loginSubmit'])->name('user.login.submit');
      Route::group(['middleware'=>'userLogin'] ,function(){
        Route::get('/order/{id}',[AdminController::class, 'order'])->name('front.order');
        Route::get('/order/table/{id}',[AdminController::class, 'orders'])->name('front.orders');
        Route::get('/order/cancel/{id}',[AdminController::class, 'orderCancel'])->name('order.cancel');
      });
      
      

      Route::get('/user/logout',[UserController::class, 'logout'])->name('user.logout');
      // Route::get('/users',[FrontController::class,'edit'])->name('user');

