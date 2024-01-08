<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FeaturedCategoryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ProductCommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPropertyController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ClientProductController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Route;

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

Route::get('register' , [RegisterController::class , 'registerOtpView'])->name('registerOtp');
Route::post('registerSendMail' , [RegisterController::class , 'sendMail'])->name('sendMailProcess');
Route::get('verifyOtp/{user}' , [RegisterController::class , 'verifyOtpView'])->name('verifyOtp');
Route::post('verifyOtp/{user}/process' , [RegisterController::class , 'verifyOtp'])->name('verifyOtpProcess');
Route::delete('home/logout' , [HomeController::class , 'logout'])->name('homeLogout');

Route::prefix('')->name('client.')->group( function () {
    Route::get('/', [HomeController::class , 'index'])->name('home');
    Route::get('/product/{product}', [ClientProductController::class , 'show'])->name('showProducts');
    Route::post('/comment/{product}/store', [CommentController::class, 'store'])->name('createCommentProcess');
    Route::post('/likes/{product}/store', [LikeController::class , 'store'])->name('storeNewLike');
    Route::get('/likes', [LikeController::class, 'index'])->name('showLikes');
    Route::delete('/likes/{product}/destroy', [LikeController::class, 'destroy'])->name('deleteLike');
    Route::get('/cart', [CartController::class , 'index'])->name('showCart');
    Route::post('/cart/{product}', [CartController::class, 'storeCart'])->name('storeCart');
    Route::delete('/cart/{product}/delete', [CartController::class, 'destroy'])->name('deleteCart');
    Route::get('/order/create', [OrderController::class , 'create'])->name('createOrder');
    Route::post('/order/create/store', [OrderController::class, 'store'])->name('storeOrder');
    Route::get('/order/payment/callback', [OrderController::class, 'callback'])->name('callBack');
    Route::get('/order/{order}/show', [OrderController::class, 'show'])->name('showOrder');
});


Route::prefix('dashboard')->middleware([
    CheckPermission::class . ':view-dashboard',
    'auth'
])->group(function () {
    //This route will return Dashboard view
    Route::get('/' , [DashboardController::class , 'index'])->name('dashboard');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    //This Route Group will return routes of the Categories section
    Route::prefix('categories/')->group( function () {
        Route::get('/' , [CategoryController::class , 'index'])->middleware(CheckPermission::class . ':read-category')->name('showCategories');
        Route::get('/create' , [CategoryController::class , 'create'])->middleware(CheckPermission::class . ':create-category')->name('createCategory');
        Route::post('/create/store' , [CategoryController::class , 'store'])->name('createCategoryProcess');
        Route::get('/update/{category}/edit' , [CategoryController::class , 'edit'])->middleware(CheckPermission::class . ':update-category')->name('updateCategory');
        Route::patch('/update/{category}' , [CategoryController::class , 'update'])->middleware(CheckPermission::class . ':update-category')->name('updateCategoryProcess');
        Route::delete('/delete/{category}' , [CategoryController::class , 'destroy'])->middleware(CheckPermission::class . ':delete-category')->name('deleteCategory');
    });
    //This Route Group will return routes of the Brands section
    Route::prefix('/brands')->group( function () {
        Route::get('/' , [BrandController::class , 'index'])->middleware(CheckPermission::class . ':read-brand')->name('showBrands');
        Route::get('/create' , [BrandController::class , 'create'])->middleware(CheckPermission::class . ':create-brand')->name('createBrand');
        Route::post('/create/store' , [BrandController::class , 'store'])->middleware(CheckPermission::class . ':create-brand')->name('createBrandProcess');
        Route::get('/update/{brand}/edit' , [BrandController::class , 'edit'])->middleware(CheckPermission::class . ':update-brand')->name('updateBrand');
        Route::patch('/update/{brand}' , [BrandController::class , 'update'])->middleware(CheckPermission::class . ':update-brand')->name('updateBrandProcess');
        Route::delete('/delete/{brand}' , [BrandController::class , 'destroy'])->middleware(CheckPermission::class . ':delete-brand')->name('deleteBrand');
    });
    //This Route Group will return routes of the Products section
    Route::prefix('/products')->group( function () {
        Route::get('/' , [ProductController::class , 'index'])->name('showProducts');
        Route::get('/create' , [ProductController::class , 'create'])->name('createProduct');
        Route::post('/create/store', [ProductController::class, 'store'])->name('createProductProcess');
        Route::get('/update/{product}/edit' , [ProductController::class , 'edit'])->name('updateProduct');
        Route::patch('/update/{product}' , [ProductController::class , 'update'])->name('updateProductProcess');
        Route::delete('/delete/{product}' , [ProductController::class , 'destroy'])->name('deleteProduct');
        Route::get('/pictures/{product}' , [PictureController::class , 'index'])->name('showPictures');
        Route::post('/pictures/{product}/store' , [PictureController::class , 'store'])->name('storeNewPictures');
        Route::delete('/pictures/{picture}/delete' , [PictureController::class , 'destroy'])->name('deletePictures');
        Route::get('/products/{product}/discount' , [DiscountController::class , 'create'])->name('newDiscount');
        Route::post('/products/{product}/discount/store' , [DiscountController::class , 'store'])->name('newDiscountProcess');
        Route::delete('/products/{product}/discount/delete' , [DiscountController::class , 'destroy'])->name('deleteDiscount');
        Route::get('/{product}/properties/show', [ProductPropertyController::class, 'index'])->name('showProductProperties');
        Route::get('/{product}/properties/edit', [ProductPropertyController::class, 'create'])->name('createProductProperties');
        Route::post('/{product}/properties', [ProductPropertyController::class, 'store'])->name('createProductPropertyProcess');
        Route::get('/{product}/comments' , [ProductCommentController::class , 'index'])->name('showProductComments');
        Route::delete('/{comment}/comment/delete', [ProductCommentController::class, 'destroy'])->name('deleteComment');

        });

    //This Route Group will return routes of the roles
    Route::prefix('/roles')->group( function () {
        Route::get('/' , [RoleController::class , 'index'])->name('showRoles');
        Route::get('/create' , [RoleController::class , 'create'])->name('createRole');
        Route::post('/create/store' , [RoleController::class , 'store'])->name('createRoleProcess');
        Route::get('/update/{role}/edit' , [RoleController::class , 'edit'])->name('updateRole');
        Route::patch('/update/{role}' , [RoleController::class , 'update'])->name('updateRoleProcess');
    });

    //This Route Group will return routes of the users
    Route::prefix('/users')->group( function () {
        Route::get('/' , [UserController::class , 'index'])->name('showUsers');
        Route::get('/update/{user}/edit', [UserController::class, 'edit'])->name('updateUser');
        Route::patch('/update/{user}', [UserController::class, 'update'])->name('updateUserProcess');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('deleteUser');
    });

    //This Route Group will return routes of the Property Groups
    Route::prefix('/propertyGroup')->group( function () {
        Route::get('/' , [PropertyGroupController::class , 'index'])->name('showPropertyGroups');
        Route::get('/create' , [PropertyGroupController::class , 'create'])->name('createPropertyGroup');
        Route::post('/create/store', [PropertyGroupController::class, 'store'])->name('createPropertyGroupProcess');
        Route::get('/update/{propertyGroup}/edit', [PropertyGroupController::class, 'edit'])->name('updatePropertyGroup');
        Route::patch('/update/{propertyGroup}', [PropertyGroupController::class, 'update'])->name('updatePropertyGroupProcess');
        Route::delete('/delete/{propertyGroup}', [PropertyGroupController::class, 'destroy'])->name('deletePropertyGroup');
    });

    //This Route Group will return routes of the Properties
    Route::prefix('/property')->group(function () {
        Route::get('/', [PropertyController::class, 'index'])->name('showProperties');
        Route::get('/create', [PropertyController::class, 'create'])->name('createProperty');
        Route::post('/create/store', [PropertyController::class, 'store'])->name('createPropertyProcess');
        Route::get('/update/{property}/edit', [PropertyController::class, 'edit'])->name('updateProperty');
        Route::patch('/update/{property}', [PropertyController::class, 'update'])->name('updatePropertyProcess');
        Route::delete('/delete/{property}', [PropertyController::class, 'destroy'])->name('deleteProperty');
    });

    //This Route Group will return routes of the Sliders
    Route::prefix('/sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('showSliders');
        Route::get('/create', [SliderController::class, 'create'])->name('createSlide');
        Route::post('/create/store', [SliderController::class, 'store'])->name('createSlideProcess');
        Route::get('/update/{slider}/edit', [SliderController::class, 'edit'])->name('updateSlide');
        Route::patch('/update/{slider}' , [SliderController::class , 'update'])->name('updateSlideProcess');
        Route::delete('/delete/{slider}', [SliderController::class, 'destroy'])->name('deleteSlide');
    });

    //This Route Group will return routes of the Featured Category
    Route::prefix('/featuredCategory')->group(function () {
        Route::get('/', [FeaturedCategoryController::class, 'create'])->name('showFeaturedCategory');
        Route::post('/store' , [FeaturedCategoryController::class , 'store'])->name('newFeaturedCategoryProcess');
    });

    //This Route Group will return routes of the Offers
    Route::prefix('/offers')->group(function () {
        Route::get('/', [OfferController::class, 'index'])->name('showOffers');
        Route::get('/create', [OfferController::class, 'create'])->name('createOffer');
        Route::post('/create/store', [OfferController::class, 'store'])->name('createOfferProcess');
        Route::get('/update/{offer}/edit', [OfferController::class, 'edit'])->name('updateOffer');
        Route::patch('/update/{offer}', [OfferController::class, 'update'])->name('updateOfferProcess');
    });


});


