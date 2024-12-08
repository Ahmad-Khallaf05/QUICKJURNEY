<?php

use App\Http\Controllers\BookingHistoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GuideRatingController;
use App\Http\Controllers\guide_trips;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\GuideTripController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TripImagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Models\trip;


Route::get('/', function () {
return redirect()->route('home');
});

Route::get('/dash', function () {
return view('dashboard');
})->middleware(['isAdmin'])->name('dashboard');

Auth::routes( [
    'verify' => true
]);

Route::get('/home',[HomeController::class,'index'])->name('home');

//trips start --------------------------
Route::get('/trips/view/{id}', [TripController::class, 'showBooking'])->name('trips.showBooking');
Route::resource('trips', TripController::class)->middleware(['auth' , 'isAdmin']);
Route::post('/trips/search/', [TripController::class,'search'])->name('search_trips');

Route::get('/trips/view/admin/{id}', [TripController::class, 'showadmin'])->name('trips.showadmin');
Route::post('/trips/{trip}/feedback', [TripController::class, 'storeFeedback'])->name('trips.storeFeedback');


//trips end ----------------------------

//Booking start --------------------------
Route::put('/book/{id}', [TripController::class, 'book'])->name('book');
Route::get('/bookings/{id}', [TripController::class, 'confirm'])->name('booking.confirm');

Route::resource('booking', BookingController::class)->middleware(['auth' , 'isAdmin']);
Route::get('/book/{id}', [BookingController::class, 'accept'])->name('booking.accept');
Route::get('/book/{id}/confirm', [BookingController::class, 'confirm'])->name('book.confirm');

//Booking end --------------------------

//category start ----------------------------
Route::resource('categories', CategoryController::class)->middleware(['auth' , 'isAdmin']);
Route::get('/categories/view/{id}', [CategoryController::class, 'view'])->name('categoties');
Route::post('/categories/search/', [CategoryController::class,'search'])->name('search');
//category end ------------------------------

//dashboard start----------------------------
Route::get('/dash',[DashboardController::class, 'index'] )->middleware(['isAdmin'])->name('dashboard');
//dashboard end----------------------------

//guide start----------------------------
Route::resource('/guides', GuideController::class)->middleware(['auth', 'isAdmin']);
Route::post('/guides/search/', [GuideController::class,'search'])->name('search_guides');
Route::get('/guidesview',[GuideController::class,'view']);
Route::get('/guide/{id}/', [GuideController::class, 'anotherPage'])->name('home.guide');
Route::post('/guides/{id}/rate', [GuideRatingController::class, 'store'])->name('guides.rate');
//guide end----------------------------

//testimonials start----------------------------
Route::resource('testimonials', TestimonialController::class)->middleware(['auth' ]);
//testimonials end----------------------------

//testimonials start----------------------------
Route::resource('/users', UserController::class)->middleware(['auth', 'isAdmin']);
//testimonials end----------------------------


Route::get('/tripimages/create/{id}', [TripImagesController::class, 'create'])->name('tripimages.create');
Route::post('/tripimages/store/{id}', [TripImagesController::class, 'store'])->name('tripimages.store');

Route::get('/tripguide/create/{id}', [GuideTripController::class, 'create'])->name('tripguide.create');
Route::post('/tripguide/store/{id}', [GuideTripController::class, 'store'])->name('tripguide.store');


//tripimages start----------------------------
//Route::resource('/tripimages', TripImagesController::class)->middleware(['auth', 'isAdmin']);
//tripimages end----------------------------


    Route::get('/deatils' , function (){
    return view('dashboard/trips.show_userside');
});


Route::get('/tripimages/create/{id}', [TripImagesController::class, 'create'])->name('tripimages.create');
Route::post('/tripimages/store/{id}', [TripImagesController::class, 'store'])->name('tripimages.store');
Route::delete('/trip_images/{id}', [TripImagesController::class, 'destroy'])->name('trip_images.destroy');

Route::get('/tripguide/create/{id}', [GuideTripController::class, 'create'])->name('tripguide.create');
Route::post('/tripguide/store/{id}', [GuideTripController::class, 'store'])->name('tripguide.store');
Route::delete('/tripguide/delete/{id}', [GuideTripController::class, 'destroy'])->name('tripguide.destroy');


//tripimages start----------------------------
//Route::resource('/tripimages', TripImagesController::class)->middleware(['auth', 'isAdmin']);
//tripimages end----------------------------


//contacte start---------------------------
Route::get('/contacte',[EmailController::class,'contactForm']);
Route::post('/contactMail',[EmailController::class,'contact'])->name('contacte')->middleware('verified');
Route::resource('dash/contacte', ContactController::class)->middleware(['auth']);
Route::delete('/contacte/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy')->middleware(['auth', 'isAdmin']);;

//contacte end----------------------------

//apout us page start
Route::get('/apoutus', function () {
    return view('apoutus');
});
//apout us page end


Route::get('/show/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware(['auth']);
Route::get('/profile/showadmin', [ProfileController::class, 'showadmin'])->name('profile.showadmin')->middleware(['auth']);
Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update')->middleware(['auth']);


Route::get('/service' , [ServiceController::class , 'index'])->name('service.index');
Route::get('/service/show' , [ServiceController::class , 'show'])->name('service.show');

Route::resource('bookingHistory', BookingHistoryController::class)->middleware(['auth']);

//Route::get('dashboard/categories/index', [CategoryController::class, 'index'])->name('categories.index');

