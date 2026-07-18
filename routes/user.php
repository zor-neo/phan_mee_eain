<?php

use App\Http\Controllers\Auther\AutherProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ReactController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('guest',[guestController::class,'guestPlace'])->name('guest#Place');
Route::group(['prefix'=>'user','middleware'=>'user'],function(){
    Route::get('home',[UserController::class,'userhome'])->name('userHome');
});

//nev
Route::group(['prefix'=>'layout','middleware'=>'readonly.view'],function(){
    Route::get('editProfile',[UserProfileController::class,'editPage'])->name('edit#Page');
    Route::post('edit/process',[UserProfileController::class,'editProcess'])->name('edit#Process');
    Route::get('profile',[UserProfileController::class,'profilePage'])->name('profile#Page');
    Route::get('ChangePass',[UserProfileController::class,'ChPassPage'])->name('ChPass#Page');
    Route::post('ChPass/Process',[UserProfileController::class,'ChPassProcess'])->name('ChPass#Process');
    Route::get('promote',[UserProfileController::class,'promotePage'])->name('promote#Page');
    Route::post('promote/process',[UserProfileController::class,'promoteProcess'])->name('promote#Process');
    Route::get('auther/room',[UserProfileController::class,'autherRoom'])->name('auther#Room');
    Route::get('suggestion',[UserProfileController::class,'SuggestionPage'])->name('suggestion#Page');
    Route::post('suggestion/process',[UserProfileController::class,'SuggestionProcess'])->name('suggestion#Process');

});

Route::middleware('auth')->get('media/{directory}/{path}', [MediaController::class, 'show'])
    ->where('path', '.*')
    ->name('media.show');

//contents
Route::group(['prefix'=>'content'],function(){
    Route::get('show/contentPage/{find?}',[ContentController::class,'contentPage'])->name('content#Page');
});

Route::group(['prefix'=>'auther','middleware'=>'readonly.view'],function(){
    Route::get('playlist',[AutherProfileController::class,'playlistPage'])->name('playlist#Page');
    Route::get('content',[AutherProfileController::class,'contentPage'])->name('autherContent#Page');
    Route::get('comment',[AutherProfileController::class,'commentPage'])->name('comment#Page');
    Route::post('comment/mark-seen',[AutherProfileController::class,'markCommentsSeen'])->name('comment.markSeen');
    Route::get('createContent',[AutherProfileController::class,'createContentPage'])->name('createContent#Page');
    Route::post('create',[AutherProfileController::class,'createContentProcess'])->name('createContent#Process');
    Route::get('createQuize',[AutherProfileController::class,'createQuizePage'])->name('createQuize#Page');
    Route::get('createVContent',[AutherProfileController::class,'createVContentPage'])->name('createVContent#Page');
    Route::get('editContent/{id}',[AutherProfileController::class,'editContentPage'])->name('editContent#Page');
    Route::post('editContent/Process',[AutherProfileController::class,'editContentProcess'])->name('editContent#Process');
    Route::delete('deleteContent/Process/{id}/{image?}',[AutherProfileController::class,'deleteContentProcess'])->name('deleteContent#Process');
});

Route::group(['prefix'=>'content','middleware'=>'readonly.view'],function(){
    Route::post('react/{user_id}/{content_id}/{type}',[ReactController::class,'reactionProcess'])->name('reaction.Process');
    Route::post('comment',[CommentController::class,'commentProcess'])->name('comment.Process');
    Route::delete('comment/delete/{commentId}', [CommentController::class, 'commentDelete'])->name('comment.Delete');
    Route::post('report/process',[ReportController::class,'reportProcess'])->name('report.Process');
    Route::post('saveContent/{userId}/{contentId}',[SavedController::class,'saveContent'])->name('save.Content');
    Route::get('resource/{resource}',[ContentController::class,'downloadResource'])->name('contentResource.download');
    });
