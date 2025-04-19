<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\Homepage\HomeController;
use App\Http\Controllers\Modules\SearchBlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

$sidebarMenu = config('sidebar');

 // Homepage Search
Route::get('/',[HomeController::class,'index'])->name('homepage.index');
Route::get('/search',[HomeController::class,'search'])->name('homepage.search');
Route::get('/ajax/google-search', [\App\Http\Controllers\Homepage\HomeController::class, 'googleSearch'])->name('ajax.google.search');



// Dashboard
Route::prefix('panel')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('gate.index'); // panel/login
    Route::post('/gate', [AuthController::class, 'gateUsers'])->name('gate.users'); // panel/gate
    Route::get('/flush', [AuthController::class, 'logout'])->name('gate.logout'); // panel/flush


    Route::prefix('api')->group(function ()
    {
        // Domain API
        Route::get('/domain', [DomainController::class, 'index'])->name('cgg.domain')->middleware('auth.api'); // panel/api/domain
        Route::get('/domain/{id}', [DomainController::class, 'show'])->name('cgg.domain.show')->middleware('auth.api'); // panel/api/domain/{id}
        Route::post('/domain/store', [DomainController::class, 'store'])->name('cgg.domain.store')->middleware('auth.api'); // panel/api/domain/store
        Route::post('/domain/update/{id}', [DomainController::class, 'update'])->name('cgg.domain.update')->middleware('auth.api'); // panel/api/domain/update/{id}

        // Search API
        Route::get('/all',[SearchBlogController::class,'AllSearches'])->name('cgg.all')->middleware('auth.api');
    });

    //middleware for cors
    Route::group(['middleware' => 'cors'], function () {

        //Search API
        Route::get('/search', [SearchBlogController::class, 'index'])->name('cgg.search')->middleware(middleware: 'auth.api');
        Route::get('/image', [SearchBlogController::class,'imageScrollPage'])->name('cgg.image')->middleware('auth.api');

        // group handle middleware for admin and staff
        Route::group(['middleware' => 'auth'], function () {

            // Dashboard
            Route::get('/', function () {return redirect('panel/datatable');})->name('dashboard.index');

            // handle middleware for admin
            Route::middleware('role:admin')->group(function () {

                Route::get('/profile', function () {return view('dashboard.users.userprofile');})->name('profile.index');

                Route::get('/user-management', [UserController::class,'index'])->name('user-management.index');
                Route::get('/user-management/data', [UserController::class,'getData'])->name('user-management.data');
                Route::get('/user-management/create', [UserController::class, 'create'])->name('user-management.create');
                Route::get('/user-management/{id}', [UserController::class,'show'])->name('user-management.show');
                Route::post('/user-management/store', [UserController::class,'store'])->name('user-management.store');
                Route::put('/user-management/update/{id}', [UserController::class,'update'])->name('user-management.update');
                Route::delete('/user-management/delete/{id}', [UserController::class,'delete'])->name('user-management.delete');
                Route::get('/user-management/{id}', [UserController::class, 'edit'],)->name('user-management.show');

            });

            // Search Routes
            Route::get('/datatable', [SearchController::class, 'index'])->name('searches.index');
            Route::get('/searches/data', [SearchController::class, 'getData'])->name('searches.data');
            Route::get('/searches/{id}', [SearchController::class, 'show'])->name('searches.show');
            Route::post('/searches/store', [SearchController::class, 'store'])->name('searches.store');
            Route::post('/searches/update/{id}', [SearchController::class, 'update'])->name('searches.update');
            Route::delete('/searches/delete/{id}', [SearchController::class, 'destroy'])->name('searches.delete');

            // Export Search
            Route::post('/searches/export', [SearchController::class, 'export'])->name('searches.export');

            // Domain Routes
            Route::get('/domain', [DomainController::class, 'page'])->name('domain.index');
            Route::get('/domain/data', [DomainController::class, 'getData'])->name('domain.data');
        });
    });
});
