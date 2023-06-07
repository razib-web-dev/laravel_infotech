<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\{HomeController,ProfileController,CompanieController,EmployeeController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register',function(){
    return redirect()->to('/login');
})->name('register');

Route::get('/',function(){
    return redirect()->to('/login');
})->name('/');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/userlist', [HomeController::class, 'userlist']);

// ProfileController
Route::get('/profile', [ProfileController::class, 'profile']);
Route::post('/profile/photo/upload', [ProfileController::class, 'profile_photo_upload']);
Route::post('/password/change', [ProfileController::class, 'password_change']);


//CompanieRouteing
Route::resource('companie', CompanieController::class);

//EmployeeRouteing
Route::resource('employee', EmployeeController::class);




