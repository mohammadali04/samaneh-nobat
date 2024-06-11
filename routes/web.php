<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\back\AdminOfficerController;
use App\Http\Controllers\back\AdminServiceController;
use App\Http\Controllers\back\AdminSettingsController;
use App\Http\Controllers\back\AdminUserController;
use App\Http\Controllers\back\BioManagerController;
use App\Http\Controllers\back\CategoryController;
use App\Http\Controllers\back\ClientMessageController;
use App\Http\Controllers\auth\CustomAuthController;
use App\Http\Controllers\back\FaqController;
// use App\Http\Controllers\front\CustommerController;فعلا به این نیاز نداریم
use App\Http\Controllers\back\AdminIndexController;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\front\SearchController;
use App\Http\Controllers\front\ServicerController;
use App\Http\Controllers\front\TurnController;
use App\Http\Controllers\back\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ServiceAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    Route::prefix('index')->group(function(){
        Route::get('/index',[IndexController::class,'index'])->name('index');
        Route::get('show-category/{service}',[IndexController::class,'showCategory'])->name('show.category.service');
        // Route::get('/show-user-panel',[IndexController::class,'showUserPanel'])->name('user.pay.list');
        // Route::get('/show-servicer-panel',[IndexController::class,'showServicerPanel'])->name('show.user.panel');
    Route::get('/show-reserved-list',[IndexController::class,'showReservedList'])->middleware('auth')->name('user.reserved.list');
    Route::get('/show-favorite-list',[IndexController::class,'showFavoriteList'])->middleware('auth')->name('user.favorite.list');
    Route::post('/add-client-message',[IndexController::class,'addClientMessage'])->name('add.client.message');
});
Route::prefix('/search')->middleware('auth')->group(function(){
    Route::get('/index',[SearchController::class,'index'])->name('search.index');
    Route::post('/do-search',[SearchController::class,'doSearch'])->name('do.search');
    Route::get('/display-search',[SearchController::class,'displaySearch'])->name('display.search');
    Route::get('/show-service-detail/{service}',[SearchController::class,'showServiceDetail'])->name('show.service.detail');
    Route::post('/show-next-week',[SearchController::class,'showNextWeek'])->name('show.next.week');
    Route::post('/show-previouse-week',[SearchController::class,'showPreviouseWeek'])->name('show.previouse.week');
    Route::post('/add-to-favorit',[SearchController::class,'addToFavorits'])->name('add.to.favorite');
    Route::get('/bookTurn/{turn}/{id}',[SearchController::class,'bookTurn'])->name('user.book.turn');
    Route::post('/add-comment',[SearchController::class,'addComment'])->name('user.add.comment');
});
// Route::prefix('/turn')->group(function(){
//     Route::get('my-turn',[TurnController::class,'showUserTurn'])->name('show.usre.turn');////
// });
Route::prefix('service')->middleware(['auth','checkService'])->group(function (){
    Route::get('/add-info',[ServicerController::class,'addInfo'])->name('servicer.add.info');
    Route::post('/store-info',[ServicerController::class,'storeInfo'])->name('servicer.store.info');
    Route::get('/show-profile',[ServicerController::class,'showProfile'])->name('servicer.show.profile');
    // Route::get('/show-login',[ServiceAuthController::class,'showLogin'])->name('servicer.show.login');
    // Route::post('/login',[ServiceAuthController::class,'serviceLogin'])->name('servicer.login');
    // Route::get('/create-register',[ServiceAuthController::class,'registration'])->name('servicer.create.register');
    // Route::post('/register',[ServiceAuthController::class,'serviceRegistration'])->name('servicer.store.register');
    // Route::get('/logout',[ServiceAuthController::class,'signOut'])->name('servicer.logout');
    Route::get('/edit-info/{service}',[ServicerController::class,'editInfo'])->middleware('checkUser')->name('servicer.edit.info');
    Route::post('/update-info/{service}',[ServicerController::class,'updateInfo'])->middleware('checkUser')->name('servicer.update.info');
    Route::get('/create-table/{service}',[ServicerController::class,'createTurnTable'])->middleware('checkUser')->name('servicer.create.table');
    Route::post('/store-table',[ServicerController::class,'storeTable'])->name('servicer.store.table');
    Route::get('/manage-set-turns/{service}',[ServicerController::class,'manageSetTurns'])->middleware('checkUser')->name('servicer.manage.turn');
    Route::get('/show-sub-day-time/{turn}',[ServicerController::class,'showDayHours'])->middleware('checkUser')->name('show.day.hours');
    Route::post('/update-day-time/{turn}',[ServicerController::class,'updateDayTime'])->middleware('checkUser')->name('update.day.time');
    Route::get('/update-table',[ServicerController::class,'updateTurnTable'])->name('servicer.edit.table');
    Route::get('/reserved-list/{service}',[ServicerController::class,'reservedList'])->middleware('checkUser')->name('servicer.reserved.list');
    Route::get('/show-user-reserved-detail/{turn}',[ServicerController::class,'showReserveDetail'])->middleware('checkUser')->name('show.user.reserved');
    // Route::get('/show-reserve-detail',[ServicerController::class,'showReserveDetail'])->name('show.reserve.detail');
    Route::get('/manage-gallery/{service}',[ServicerController::class,'manageGallery'])->middleware('checkUser')->name('servicer.manage.gallery');
    Route::get('/add-to-gallery/{service}',[ServicerController::class,'addToGallery'])->middleware('checkUser')->name('servicer.add.gallery');
    Route::post('/store-gallery/{service}',[ServicerController::class,'storeGallery'])->middleware('checkUser')->name('servicer.store.gallery');
    Route::get('/edit-gallery/{gallery}',[ServicerController::class,'editGallery'])->middleware('checkUser')->name('servicer.edit.gallery');
    Route::post('/update-gallery/{gallery}',[ServicerController::class,'updateGallery'])->middleware('checkUser')->name('servicer.update.gallery');
    Route::get('/destroy-gallery',[ServicerController::class,'destroyGallery'])->name('servicer.destroy.gallery');
});
// Route::prefix('custommer')->middleware('auth')->group(function(){
//     Route::get('/show-my-favorits',[CustommerController::class,'showMyFavorits'])->name('custommer.show.turn');
//     Route::get('/show-my-turn',[CustommerController::class,'showMyTurn'])->name('show.custommer.favorits');
//     Route::get('/dsicard-favorite/{service}',[CustommerController::class,'discardFavorite'])->name('custommer.discard.favorite');
//     Route::get('/show-my-pays',[CustommerController::class,'showMyPays'])->name('show.my.pays');
// }); فعلا به این روت ها نیازی نداریم
Route::prefix('/admin')->group(function () {
    Route::get('/register', [CustomAuthController::class, 'register'])->name('admin.register');
    Route::post('/store', [CustomAuthController::class, 'store'])->name('admin.auth.store');
    Route::get('/login', [CustomAuthController::class, 'login'])->name('admin.login');
    Route::post('/authenticate', [CustomAuthController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth','checkRole']);;
    Route::get('/logout',[CustomAuthController::class,'logout'])->name('admin.logout');
});

Route::prefix('/admin')->middleware(['auth','checkRole'])->group(function(){
    Route::get('/index',[AdminIndexController::class,'index'])->name('admin.index');
    Route::get('/add-info',[AdminIndexController::class,'addInfo'])->name('admin.add.info');
    Route::post('/store-info',[AdminIndexController::class,'storeInfo'])->name('admin.store.info');
    Route::get('/edit-info/{admin_info}',[AdminIndexController::class,'editInfo'])->name('admin.edit.info')->middleware('checkUser');
    Route::post('/update-info/{admin_info}',[AdminIndexController::class,'updateInfo'])->name('admin.update.info');
});

Route::prefix('/admincategories')->middleware(['verified','auth','checkRole'])->group(function(){
    Route::get('/index',[CategoryController::class,'index'])->name('admin.category.index');
    Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
    Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::post('/update/{category}',[CategoryController::class,'update'])->name('admin.category.update');
    Route::get('/destroy',[CategoryController::class,'destroy'])->name('admin.category.destroy');
});
Route::prefix('/admincomments')->middleware(['verified','auth','checkRole'])->group(function(){
    Route::get('/index',[CommentController::class,'index'])->name('admin.comment.index');
    Route::get('/create',[CommentController::class,'create'])->name('admin.comment.create');////
    Route::get('/edit/{comment}',[CommentController::class,'edit'])->name('admin.comment.edit');
    Route::post('/store',[CommentController::class,'store'])->name('admin.comment.store');
    Route::post('/update/{comment}',[CommentController::class,'update'])->name('admin.comment.update');
    Route::get('/destroy',[CommentController::class,'destroy'])->name('admin.comment.destroy');
});
Route::prefix('/admin-messages')->middleware(['verified','auth','checkRole'])->group(function(){
    Route::get('/index',[ClientMessageController::class,'index'])->name('admin.message.index');
    Route::get('/show/{message}',[ClientMessageController::class,'show'])->name('admin.message.show');/////////////////
    Route::get('/destroy',[ClientMessageController::class,'destroy'])->name('admin.message.destroy');
});

Route::prefix('/admin-settings')->middleware(['verified','auth','checkRole'])->group(function(){
    Route::get('/socials',[AdminSettingsController::class,'socials'])->name('admin.social.index');
    Route::get('/create-social',[AdminSettingsController::class,'createSocial'])->name('admin.create.social');
    Route::post('/store-social',[AdminSettingsController::class,'storeSocial'])->name('admin.store.social');
    Route::get('/edit-social/{socialnetwork}',[AdminSettingsController::class,'editSocial'])->name('admin.edit.social');
    Route::post('/update-social/{socialnetwork}',[AdminSettingsController::class,'updateSocial'])->name('admin.update.social');
    Route::get('/destroy-social',[AdminSettingsController::class,'destroySocial'])->name('admin.destroy.social');
    Route::get('/banner',[AdminSettingsController::class,'banner'])->name('admin.banner.show');
    Route::post('/update-banner/{banner}',[AdminSettingsController::class,'updateBanner'])->name('admin.update.banner');
    Route::get('/address',[AdminSettingsController::class,'address'])->name('admin.settings.show');
    Route::post('/update-address/{settings}',[AdminSettingsController::class,'updateAddress'])->name('admin.update.settings');
});

Route::prefix('/admin/bio-manager')->middleware(['verified','auth','checkRole'])->group(function(){
    Route::get('/edit/{about}',[BioManagerController::class,'edit'])->name('admin.bio.edit');
    Route::post('/update/{about}',[BioManagerController::class,'update'])->name('admin.bio.update');
    Route::get('/show-options',[BioManagerController::class,'showOptions'] )->name('admin.show.option');
    Route::get('/add-options',[BioManagerController::class,'addOptions'] )->name('admin.add.option');
    Route::post('/store-options',[BioManagerController::class,'storeOptions'] )->name('admin.store.option');
    Route::get('/edit-options/{option}',[BioManagerController::class,'editOptions'] )->name('admin.edit.option');
    Route::post('/update-options/{option}',[BioManagerController::class,'updateOptions'] )->name('admin.update.option');
    Route::get('/destory-options',[BioManagerController::class,'destroyOptions'] )->name('admin.destroy.option');
});
Route::prefix('admin/faq-manager')->middleware(['verified','auth','checkRole'])->group(function (){
    Route::get('/index',[FaqController::class,'index'])->name('admin.faq.index'); 
    Route::get('/create',[FaqController::class,'create'])->name('admin.faq.create'); 
    Route::post('/store',[FaqController::class,'store'])->name('admin.faq.store'); 
    Route::get('/edit/{faq}',[FaqController::class,'edit'])->name('admin.faq.edit'); 
    Route::post('/update/{faq}',[FaqController::class,'update'])->name('admin.faq.update'); 
    Route::get('/destroy',[FaqController::class,'destroy'])->name('admin.faq.destroy'); 
});
Route::prefix('admin-services')->group(function(){
    Route::get('/index',[AdminServiceController::class,'index'])->name('admin.service.index');
    Route::get('/change-status',[AdminServiceController::class,'changeStatus'])->name('admin.service.status');
    Route::get('/destroy',[AdminServiceController::class,'destroy'])->name('admin.service.destroy');
});

Route::prefix('admin-users')->middleware('checkRole')->group(function(){
    Route::get('/index',[AdminUserController::class,'index'])->name('admin.user.index');
    Route::get('/destroy',[AdminUserController::class,'destroy'])->name('admin.user.destroy');
});

Route::prefix('admin-officer') ->middleware('checkGeneralAdmin')->group(function(){
    Route::get('/index',[AdminOfficerController::class,'index'])->name('admin.officer.index');
    Route::get('/change-status/{user}',[AdminOfficerController::class,'changeStatus'])->name('admin.officer.status');
    Route::get('/change-level-1',[AdminOfficerController::class,'changeLevel1'])->name('admin.officer.level1');
    Route::get('/change-level-2',[AdminOfficerController::class,'changeLevel2'])->name('admin.officer.level2');
    Route::get('/show-info/{user}',[AdminOfficerController::class,'showInfo'])->name('admin.officer.info');
    Route::get('/destroy',[AdminOfficerController::class,'destroy'])->name('admin.officer.destroy');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::get('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');
require __DIR__.'/auth.php';