<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\GameController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ResultController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\frontend\AccountController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ChildCategoryController;
use App\Http\Controllers\admin\CricketMatchesController;
use App\Http\Controllers\admin\Game_subcategory_child_categoryController;


// https://cricket247buzz.com/sports/4



//  Frontend Routes Start
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AccountController::class, 'login'])->name('front.login');
    Route::post('checklogin', [AccountController::class, 'checklogin'])->name('front.checklogin');
});

// Routes for authenticated users
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/', [FrontController::class, 'index'])->name('front.home');
    Route::get('/game/{categorySlug?}/{subCategorySlug?}/{childCategorySlug?}', [FrontController::class, 'gameDetails'])->name('front.gameDetails');
    Route::get('/game-ply/{slug}', [FrontController::class, 'plyGame'])->name('front.plyGame');
    Route::get('/logout', [AccountController::class, 'logout'])->name('front.logout');

    // front Account Routes
    Route::get('/account-statement', [AccountController::class, 'accountStatement'])->name('front.accountStatement');
    Route::get('/profit-loss-report', [AccountController::class, 'profitLossReport'])->name('front.profitLossReport');
    Route::get('/bet-history', [AccountController::class, 'betHistory'])->name('front.betHistory');
    Route::get('/unsetteled-bet', [AccountController::class, 'unsetteledBet'])->name('front.unsetteledBet');
    Route::get('/set-button-value', [AccountController::class, 'setButtonValue'])->name('front.setButtonValue');
    Route::get('/change-password', [AccountController::class, 'changePassword'])->name('front.changePassword');
    Route::post('/update-password', [AccountController::class, 'updatePassword'])->name('front.updatePassword');
});


// Admin Routes Start ----------------------------------------------------------------------------------
// Email : sajid-super-admin@gmail.com
// Password : 12345678

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AuthController::class, 'login'])->name('admin.login');
        Route::post('auth-login', [AuthController::class, 'authLogin'])->name('admin.authLogin');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/datetime', [DashboardController::class, 'show']);
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('logout', [DashboardController::class, 'logout'])->name('admin.logout');
        Route::get('change-password', [DashboardController::class, 'changePassword'])->name('admin.changePassword');
        Route::put('/update-password', [DashboardController::class, 'updatePassword'])->name('admin.updatePassword');

        // Role Routes
        Route::get('/role', [RoleController::class, 'roleList'])->name('admin.role.list');
        Route::get('/role/add', [RoleController::class, 'roleAdd'])->name('admin.role.add');
        Route::post('/role/create', [RoleController::class, 'roleCreate'])->name('admin.role.create');
        Route::get('/role/edit/{id}', [RoleController::class, 'roleEdit'])->name('admin.role.edit');
        Route::post('/role/update/{id}', [RoleController::class, 'roleUpdate'])->name('admin.role.update');
        Route::get('/role/delete/{id}', [RoleController::class, 'roleDelete'])->name('admin.role.delete');
        // User Routes
        Route::get('/export', [UserController::class, 'export'])->name('admin.user.export');
        Route::get('/user', [UserController::class, 'userList'])->name('admin.user.list');
        Route::get('/user/add', [UserController::class, 'userAdd'])->name('admin.user.add');
        Route::post('/user/create', [UserController::class, 'userCreate'])->name('admin.user.create');
        Route::get('/user/edit/{id}', [UserController::class, 'userEdit'])->name('admin.user.edit');
        Route::get('/user/status/{id}', [UserController::class, 'status'])->name('admin.user.status');
        Route::post('/user/update/{id}', [UserController::class, 'userUpdate'])->name('admin.user.update');
        Route::delete('/user/delete/{id}', [UserController::class, 'userDelete'])->name('admin.user.delete');
        // Matches List admin.cricket_add.matches.create
        Route::get('/cricket/matches/list',[CricketMatchesController::class,'list'])->name('admin.cricket.matches.list');
        Route::get('/cricket/matches/add',[CricketMatchesController::class,'addMatch'])->name('admin.cricket_add.matches.add');
        Route::post('/cricket/matches/create',[CricketMatchesController::class,'createMatch'])->name('admin.cricket_add.matches.create');
        Route::post('/cricket/matches/edit/{id}',[CricketMatchesController::class,'editMatch'])->name('admin.cricket.matches.edit');
        Route::delete('/cricket/matches/delete/{id}',[CricketMatchesController::class,'deleteMatch'])->name('admin.cricket.matches.delete');
        Route::get('admin/cricket/matches/video/list/{id}',[CricketMatchesController::class,'videoList'])->name('admin.cricket.matches.video.list');
        Route::post('admin/cricket/matches/video/store/{id}',[CricketMatchesController::class,'videostore'])->name('admin.cricket.matches.video.store');
       
        // Category Routes
        Route::get('/category', [CategoryController::class, 'categoryList'])->name('admin.category.list');
        Route::get('/category/add', [CategoryController::class, 'categoryAdd'])->name('admin.category.add');
        Route::post('/category/create', [CategoryController::class, 'categoryCreate'])->name('admin.category.create');
        Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('admin.category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('admin.category.update');
        Route::delete('/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.category.delete');
        // Slug route
        Route::get('/getSulg', function (Request $request) {
            $slug = '';
            if (!empty($request->title)) {
                $slug = Str::slug($request->title);
            }
            return response()->json([
                'status' => true,
                'slug' => $slug
            ]);
        })->name('getSulg');

        // SubCategory Routes
        Route::get('/sub-category', [SubCategoryController::class, 'subCategoryList'])->name('admin.subcategory.list');
        Route::get('/sub-category/add', [SubCategoryController::class, 'subCategoryAdd'])->name('admin.subcategory.add');
        Route::post('/sub-category/create', [SubCategoryController::class, 'subCategoryCreate'])->name('admin.subcategory.create');
        Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'subCategoryEdit'])->name('admin.subcategory.edit');
        Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'subCategoryUpdate'])->name('admin.subcategory.update');
        Route::delete('/sub-category/delete/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('admin.subcategory.delete');

        // Child Category Routes
        Route::get('/child-category', [ChildCategoryController::class, 'childCategoryList'])->name('admin.childcategory.list');
        Route::get('/child-category/add', [ChildCategoryController::class, 'childCategoryAdd'])->name('admin.childcategory.add');
        Route::post('/child-category/create', [ChildCategoryController::class, 'childCategoryCreate'])->name('admin.childcategory.create');
        Route::get('/child-category/edit/{id}', [ChildCategoryController::class, 'childCategoryEdit'])->name('admin.childcategory.edit');
        Route::post('/child-category/update/{id}', [ChildCategoryController::class, 'childCategoryUpdate'])->name('admin.childcategory.update');
        Route::delete('/child-category/delete/{id}', [ChildCategoryController::class, 'childCategoryDelete'])->name('admin.childcategory.delete');

        // Game Category Routes
        Route::get('/game', [GameController::class, 'gameList'])->name('admin.game.list');
        Route::get('/game/add', [GameController::class, 'gameAdd'])->name('admin.game.add');
        Route::post('/game/create', [GameController::class, 'gameCreate'])->name('admin.game.create');
        Route::get('/game/edit/{id}', [GameController::class, 'gameEdit'])->name('admin.game.edit');
        Route::post('/game/update/{id}', [GameController::class, 'gameUpdate'])->name('admin.game.update');
        Route::delete('/game/delete/{id}', [GameController::class, 'gameDelete'])->name('admin.game.delete');
        // fetch-subcategory , fetch-child-category
        Route::post('game-fetch-subcategory', [Game_subcategory_child_categoryController::class, 'fetchSubCategory'])->name('game.fetchSubCategory');
        Route::post('game-fetch-child-category', [Game_subcategory_child_categoryController::class, 'fetchChildCategory'])->name('game.fetchChildCategory');

        // Result Routes
        Route::get('/result', [ResultController::class, 'resultList'])->name('admin.result.list');
        Route::get('/result/add', [ResultController::class, 'resultAdd'])->name('admin.result.add');
        Route::post('/result/create', [ResultController::class, 'resultCreate'])->name('admin.result.create');
        Route::get('/result/edit/{id}', [ResultController::class, 'resultEdit'])->name('admin.result.edit');
        Route::post('/result/update/{id}', [ResultController::class, 'resultUpdate'])->name('admin.result.update');
        Route::delete('/result/delete/{id}', [ResultController::class, 'resultDelete'])->name('admin.result.delete');
    });
});
