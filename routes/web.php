<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPage;
use App\Http\Controllers\CreationOfProfile;
use App\Http\Controllers\CreationOfClassPostRegister;

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

Route::get('/createprofile', function () {
    return view('create_profile', [CreationOfProfile::class, 'create_profile']);
})->middleware('auth');

Route::post('/createprofile', [CreationOfProfile::class, 'create_profile']);

Route::get('/home', [MainPage::class, 'main_home'])->middleware('auth');

Route::get('/classrooms', [MainPage::class, 'show_all_classrooms'])->middleware('auth');
Route::post('/addclassroom', [MainPage::class, 'create_classroom']);

Route::get('/teachers', [MainPage::class, 'show_all_teachers'])->middleware('auth');
Route::post('/addteacher', [MainPage::class, 'create_teacher'])->middleware('auth');

Route::post('/deleteclassroom/{id}', [MainPage::class, 'delete_classroom']);
Route::post('/deleteuser/{id}', [MainPage::class, 'delete_classroom'])->middleware('auth');

Route::post('/deleteentireclassroom/{id}', [MainPage::class, 'delete_entire_classroom']);
Route::post('/removeuserfromclassroom/{id}', [MainPage::class, 'remove_user_from_classroom']);