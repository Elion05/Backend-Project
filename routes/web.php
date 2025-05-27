<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\publiekeFaqController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\NieuwsController;
use App\Models\Nieuws;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\Admin\ContactController;

//default homescreen


Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');

//**** */
//Route::get('/', function () {
//    return view('home');
//})->name('home');

Route::get('/', [NieuwsController::class, 'home'])->name('home');

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


// CRUD-routes voor FAQ categorieën verbetert door chatgpt
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('faqcategories.')->group(function () {
    Route::get('/faq_categories', [FaqCategoryController::class, 'index'])->name('index'); // lijst
    Route::get('/faq_categories/create', [FaqCategoryController::class, 'create'])->name('create'); // formulier
    Route::post('/faq_categories', [FaqCategoryController::class, 'opslaan'])->name('store'); // opslaan
    Route::get('/faq_categories/{faqCategory}/edit', [FaqCategoryController::class, 'edit'])->name('edit'); // formulier voor bewerken
    Route::put('/faq_categories/{faqCategory}', [FaqCategoryController::class, 'update'])->name('update'); // update opslaan
    Route::delete('/faq_categories/{faqCategory}', [FaqCategoryController::class, 'destroy'])->name('destroy'); // verwijderen
});


//dit is voor de FAQS alleen, niet de categorien
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('faqs.')->group(function () {
    Route::get('/faqs/create', [FAQController::class, 'create'])->name('create');   // formulier
    Route::post('/faqs', [FAQController::class, 'opslaan'])->name('store');     // opslaan nieuwe vraag
    //verwijderen van faqs(alleen maar voor admins te zien)
    Route::delete('/faqs/{faq}', [FAQController::class, 'destroy'])->name('destroy');
    Route::get('/faqs/{faq}/edit', [FAQController::class, 'edit'])->name('edit');
    Route::put('/faqs/{faq}', [FAQController::class, 'update'])->name('update');
});



//deze faq is voor publieke 
Route::get('/faq', [publiekeFaqController::class, 'indexfaq'])->name('faq.index');


//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//profielinstellingen bewerkbaar
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//routes voor nieuwsberichten publiek
Route::get('/nieuws', [NieuwsController::class, 'index'])->name('nieuws.index');
Route::get('/nieuws/{nieuws}', [NieuwsController::class, 'show'])->name('nieuws.show');

Route::delete('/nieuws/{nieuw}', [NieuwsController::class, 'destroy'])->name('admin.nieuws.destroy');
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('nieuws', NieuwsController::class)->except(['index','show']);
});




//publiek contact formulier voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});
Route::get('/contact', [ContactController::class, 'create'])->name('contact.formulier');
// Alleen admin kan berichten zien
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
});

require __DIR__.'/auth.php';
