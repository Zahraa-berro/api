<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\RoleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//test postman

Route::get('/getusers',[EmployeesController::class,'get_all_users']);
Route::get('/getuser/{id}',[EmployeesController::class,'get_user_by_id']);
Route::post('/create',[EmployeesController::class,'add_user']);
Route::delete('/delete/{id}',[EmployeesController::class,'delete_user']);
Route::put('/update/{id}',[EmployeesController::class,'update_user']);
Route::get('/getrole/{id}',[RoleController::class,'get_role_by_id']);

//mmkn shila 

Route::post('/register',[AuthController::class,'register']);


//hun sebet ejmln
Route::post('/login',[AuthController::class,'login']);
Route::middleware("auth:sanctum")->group(function(){
    Route::resource("posts", PostController::class);
});



Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working!',
        'status' => 'success',
        'timestamp' => now()
    ]);
});

