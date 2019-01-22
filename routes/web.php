<?php

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

Route::get('/', 'PagesController@root')->name('root');

// 用户身份验证相关的路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');



Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

Route::resource('documents', 'DocumentsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
//Excel相关路由
Route::get('documents/excel', 'DocumentsController@excel')->name('documents.excel');
Route::post('documents/export', 'DocumentsController@export')->name('documents.export');
Route::post('documents/import', 'DocumentsController@import')->name('documents.import');

Route::get('documents/{document}/{slug?}', 'DocumentsController@show')->name('documents.show');


Route::post('documents/upload', 'DocumentsController@upload')->name('documents.upload');


Route::resource('categories','CategoriesController',['only'=>['show']]);

Route::resource('projects', 'ProjectsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::get('files/import', 'FilesController@import')->name('files.import');
Route::get('files/export', 'FilesController@export')->name('files.export');


Route::resource('files', 'FilesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'destroy']]);

//文件上传相关路由
Route::post('files/download', 'FilesController@download')->name('files.download');
Route::post('files/upload', 'FilesController@upload')->name('files.upload');

Route::resource('comments', 'CommentsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('translations', 'TranslationsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('paragraphs', 'ParagraphsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('languages', 'LanguagesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);