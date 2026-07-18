<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admins','middleware'=>'admin'],function(){
    Route::get('page',[AdminController::class,'adminHome'])->name('adminHome');
    Route::get('all/user',[AdminController::class,'allUser'])->name('allUserPage');
    Route::get('all/author',[AdminController::class,'allAuthor'])->name('allAuthorPage');
    Route::get('user/report',[AdminController::class,'allReport'])->name('allReportPage');
    Route::get('user/suggest',[AdminController::class,'allSuggest'])->name('allSuggestPage');
    Route::get('requset/promo',[AdminController::class,'requestToPromo'])->name('requestToPromoPage');
    Route::post('view-mode',[AdminController::class,'switchViewMode'])->name('viewMode#Process');
    Route::post('view-mode/reset',[AdminController::class,'resetViewMode'])->name('viewMode#Reset');
    Route::post('demote/{id}',[AdminController::class,'demoteProcess'])->name('demote#Process');
    Route::post('promotion/{id}',[AdminController::class,'promotion'])->name('promote.process');
    Route::delete('delete/user/{id}/{image?}',[AdminController::class,'deleteUser'])->name('deleteUserProcess');
    Route::post('user/report/mark-seen',[AdminController::class,'markReportsSeen'])->name('reports.markSeen');
    Route::post('user/suggest/mark-seen',[AdminController::class,'markSuggestionsSeen'])->name('suggestions.markSeen');
    Route::get('reportedContent/{id?}',[AdminController::class,'reportedContent'])->name('reportedContentPage');



});

Route::group(['prefix'=>'profile'],function(){
    Route::get('show',[profileController::class,'showProfile'])->name('adminProfile#Page');

});

//category
Route::group(['prefix'=>'category'],function(){
    Route::get('page',[CategoryController::class,'categoryPage'])->name('category#Page');
    Route::post('Process',[CategoryController::class,'createProcess'])->middleware('readonly.view')->name('create#Process');
    Route::delete('delete/{id}',[CategoryController::class,'deleteProcess'])->middleware('readonly.view')->name('delete#Process');
});
