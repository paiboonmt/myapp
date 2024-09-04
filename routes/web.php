<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\TopupController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\SponsorController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// user routes
Route::middleware(['auth','user'])->group(function () {
    Route::get('/user/sponsoractive',[SponsorController::class,'active'])->name('user.sponsoractive');
    Route::get('/user/sponsorexpired',[SponsorController::class,'exprired'])->name('user.exprired');
    Route::get('/user/profile/{id}',[SponsorController::class,'profile'])->name('user.profile');
    Route::get('/user/profile_print/{id}',[SponsorController::class,'profile_print'])->name('user.profile_print');
    // route('user.dashboard')
    Route::get('/user/dashboard',[UserController::class,'index'])->name('user.dashboard');
});

// admin routes
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    // route('admin.member)
    Route::get('/admin/member',[MemberController::class,'index'])->name('admin.member');
    // route('admin.member)
    Route::get('/admin/member_create',[MemberController::class,'create'])->name('admin.member_create');
    // route('admin.member_save')
    Route::post('admin/member_save',[MemberController::class,'save'])->name('admin.member_save');
    // route('admin.member_profile')
    Route::get('/admin.member_profile/{id}',[MemberController::class,'show'])->name('admin.member_profile');

    // route('admin.product')
    Route::get('/admin/product',[ProductController::class,'index'])->name('admin.product');
    // route('admin.product_create')
    Route::post('/admin/product_create',[ProductController::class,'store'])->name('admin.product_create');
    // route('admin.product_update')
    Route::post('/admin/product_update/{id}',[ProductController::class,'update'])->name('admin.product_update');
    // route('admin.product_destroy')
    Route::delete('/admin/product_destroy/{id}',[ProductController::class,'destroy'])->name('admin.product_destroy');

    // route('admin.nationality')
    Route::get('/admin/nationality',[NationalityController::class,'index'])->name('admin.nationality');
    // route('admin.nationality_create')
    Route::post('/admin/nationality_create',[NationalityController::class,'create'])->name('admin.nationality_create');
    // route('admin.nationality_destroy')
    Route::delete('/admin/nationality_destroy/{id}',[NationalityController::class,'destroy'])->name('admin.nationality_destroy');
    // route('admin.nationality_update')
    Route::post('/admin/nationality_update/{id}',[NationalityController::class,'update'])->name('admin.nationality_update');


    // route('admin.capture')
    Route::get('/admin/capture',[MemberController::class,'capture'])->name('admin.capture');
    //topup
    Route::get('/admin/topup-monney',[TopupController::class,'index'])->name('admin.topup-monney');
    Route::post('/admin/topup',[TopupController::class,'topup'])->name('admin.topup');
    // ไปหน้าลงทะเบียนบัตร
    Route::get('/admin/register-card',[TopupController::class,'register_card'])->name('admin.register-card');
    // บันทึกข้อมูลบัตร
    Route::post('/admin/register-card-insert',[TopupController::class,'register_card_inset'])->name('admin.register_card_inset');
    Route::get('/admin/card-delete/{id}',[TopupController::class,'card_delete'])->name('admin.card_delete');
    Route::post('/admin/card-update/{id}',[TopupController::class,'card_update'])->name('admin.card_update');
});

