<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;

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


// route to login page
Route::get('/register', function () {
    return view('register');
});

// route to retistor  page


Route::get('/login',[UserController::class,'loginPage'])->name('login');


Route::post('/users/authenticate',[UserController::class, 'authenticate'])->name('user.auth');


// Route::post('/users', [UserController::class,'store'])->name('user.store');


// route for registration
Route::post('registerAdmin',[UserController::class, 'store'])->name('admin.register');

// logout
route::post('/logout', [UserController::class, 'logout'])->name('logoutUser')->middleware('auth');



// route to authenticate admin
// Route::post('loginAdmin',[AdminController::class,'authAdmin'])->name('Admin.authenticateAdmin');

//  route to go to edit  group page
Route::get('group/{id}',[GroupController::class, 'showEditPage'])->name('admin.editGroup')->middleware('auth');

// route  to edit
Route::put('/edit/{id}',[GroupController::class,'editGroup'])->name('admin.editGrouping')->middleware('auth');


// get request  for groups
Route::get('/',[GroupController::class,'showGroup'])->middleware('auth');

// post data in the group table
Route::post('/createGroup',[GroupController::class, 'storeGroup'])->name('admin.addGroup')->middleware('auth');

// post data in the group table
Route::post('/createMember',[GroupController::class, 'storeMember'])->name('admin.addMember')->middleware('auth');


Route::get('/',[GroupController::class,'showMember'])->middleware('auth');

// route to export excel
// Route::get('export', [GroupController::class, 'export'])->name('member.export');

Route::get('member/export/', [GroupController::class, 'exportMember'])->name('member.export')->middleware('auth');

// route to export excel for group
Route::get('group', [GroupController::class, 'exportGroup'])->name('group')->middleware('auth');

// Route::prefix('/')->namespace('App\Http\Controllers\Admin')->group(function () {
//     Route::group(['middleware' => ['admin']], function () {
//         // Your protected admin API routes here
//     });
// });
