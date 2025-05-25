<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\publiekeFaqController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FaqCategoryController;



//default homescreen
Route::get('/', function () {
    return view('home');
})->name('home');


//profiel
Route::get('/profiel/{username}', [ProfileController::class, 'show'])->name('profile.show');

//profiel route voor niet ingelogde gebruikers
Route::get('/profiel', function () {
    return view('profile.default'); // of noem het hoe je wilt
})->name('profile.default');


//login
Route::get('/login', function () {
    return view('login');
})->name('login');


//registeren
Route::get('/register', function () {
    return view('register');
})->name('register');



//admin
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function (){
    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/toggle-admin', [UserController::class, 'verhefAdmin'])->name('users.verhefAdmin');


    //create route voor de admins
Route::get('/users/create', [UserController::class, 'gebruikerCreaten'])->name('users.create');
Route::post('/users', [UserController::class, 'opslaan'])->name('users.store');
});

//route voor FAQ voor admins only
Route::middleware('auth', 'can:admin')->prefix('admin')->name('faqs.')->group(function() {
    Route::get('admin/faqs', [FaqController::class, 'index']);
    Route::get('/faqs/create', [FAQController::class, 'create'])->name('create'); //faq tonen 
    Route::post('/faqs', [FAQController::class, 'opslaan'])->name('store');  //aanmaken
});



//route voor cateogries
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('faqcategories.')->group(function () {
Route::get('/faq_categories/create', [FaqCategoryController::class, 'create'])->name('create');
Route::post('/faq_categories', [FaqCategoryController::class, 'opslaan'])->name('opslaan');
});


//deze faq is voor publieke 
Route::get('/faq', [publiekeFaqController::class, 'indexfaq'])->name('faq.index');



//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//profielinstellingen
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
