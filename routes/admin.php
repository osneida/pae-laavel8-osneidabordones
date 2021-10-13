<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin');
Route::resource('/users',UserController::class)->only([ 'index', 'edit', 'update' ])->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('/categories',CategoryController::class)->except('show')->names('admin.categories');
Route::resource('/posts',PostController::class)->names('admin.posts');
Route::resource('/tags', CategoryController::class)->only([ 'index', 'edit', 'update' ])->names('admin.tags');

// con can:nombrePermiso protejo una ruta, cuando la ruta la creo con resource los permisos los coloco en el controlador
