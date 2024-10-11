<?php

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Models\Group;

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
Route::get('/registerTheAdmin', function () {
    return view('register');
})->name('adminRegister');



Route::get('/viewuserprofile/{id}', function ($id) {
   $member=Member::find($id);
    return view('viewProfile',[ 'member'=>$member]);
})->name('member.profile')->middleware('auth');
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

// see all member under the group
Route::get('group/{id}/member',[GroupController::class,'allMember'])->name('allMember')->middleware('auth');
// see all transaction of the member
Route::get('member/{id}/transaction',[GroupController::class,'alltransactions'])->name('transaction')->middleware('auth');

Route::get('groupdetail/{id}',[GroupController::class,'groupdetail'])->name('groupdetail')->middleware('auth');


//  route to go to edit  group page
Route::get('group/{id}',[GroupController::class, 'showEditPage'])->name('admin.editGroup')->middleware('auth');

// route  to edit
Route::put('/edit/{id}',[GroupController::class,'editGroup'])->name('admin.editGrouping')->middleware('auth');


// delete the group
Route::delete("deletegroup/{id}", [GroupController::class, 'deletegroup'])->name('deletegroup')->middleware('auth');


// show  user profile
Route::get('adminProfilePage',function(){
    $admin = Auth::user(); // Assuming you're using Laravel's built-in authentication
        //  $admin = User::find(Auth::id());
    // dd($admin);
    return view( 'adminProfilePage',['admin'=>$admin]);
})->name('adminProfilePage');

// route to  edit user page
Route::get('adminEditProfile/{id}',function($id){
    $user= User::find($id);
    // dd($user->id);
        $admin = Auth::user(); // Assuming you're using Laravel's built-in authentication
    if($admin->id !== $user->id){
    return redirect('/login');
    }
    return view('adminEditProfile',[
      'user' => $user,
    ]);
 })->name('adminEditProfile');;


 // route change password
Route::get('changePassword/{id}', function ($id) {
    $user= User::find($id);
    // dd($user->id);
        $admin = Auth::user(); // Assuming you're using Laravel's built-in authentication
    if($admin->id !== $user->id){
    return redirect('/login');
    }

    return view('changePassword',[
        'user'=>$user
    ]);
})->name('changePassword');


// Route::put('/edit/{id}',[GroupController::class,'editGroup'])->name('admin.editGrouping')->middleware('auth');
// change the password
Route::put('/editpassword/{id}',[GroupController::class,'editpassword'])->name('editpassword')->middleware('auth');



//  route for editing profile
 Route::put('/editingAdminProfile/{id}',[UserController::class,'editingAdminProfile'])->name('editingAdminProfile')->middleware('auth');


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

// Route::get('transaction/export/', [GroupController::class, 'exporttransaction'])->name('transaction.export')->middleware('auth');
Route::get('transaction/export/{id}', [GroupController::class, 'exporttransaction'])->name('transaction.export')->middleware('auth');


// route to export excel for group
Route::get('group', [GroupController::class, 'exportGroup'])->name('group')->middleware('auth');

// Route::prefix('/')->namespace('App\Http\Controllers\Admin')->group(function () {
//     Route::group(['middleware' => ['admin']], function () {
//         // Your protected admin API routes here
//     });
// });
