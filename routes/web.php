<?php

use App\Billing\HyperPayBilling;
use App\Models\Branch;
use App\Models\Menu_Category;
use App\Models\Menu_Meal;
use App\Models\Page;
use App\Models\Restaurant;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\User;
use Devinweb\LaravelHyperpay\Facades\LaravelHyperpay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

URL::forceScheme('https');

Route::get('/', function (\Illuminate\Http\Request $request){

    event(new \App\Events\NotificationEvent('you have got new order' , date('H')));
    return view('welcome')->with(["meals" =>Menu_Meal::latest()->get() ,
        "menuCategories" => Menu_Category::latest()->get() ,
        "branches" => Branch::latest()->get()  , 'restaurant' => Restaurant::first() ,
        'settings'=>Setting::first(),'sliders' =>Slider::latest()->get(), 'pages' => Page::get(),
        ]);

})->name('home');
Route::get('/checkout/payment/{id}', [App\Http\Controllers\PaymentGWController::class, 'paymentCheckOut'])->name('paymentCheckOut');
Route::get('/hyperpay/finalize', [App\Http\Controllers\PaymentGWController::class, 'paymentStatus'])->name('paymentStatus');

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'menu'])->name('menu');
Route::get('/reservation', [App\Http\Controllers\HomeController::class, 'reservation'])->name('reservation');
Route::post('/reservation', [App\Http\Controllers\HomeController::class, 'reservation'])->name('reservation');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/checkout/view', [App\Http\Controllers\CartController::class, 'checkoutView'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::get('/receipt/{info}', [App\Http\Controllers\ReceiptController::class, 'receipt'])->name('checkoutReceipt')->middleware('auth:web');
Route::post('/user/checkout/verify', [App\Http\Controllers\CartController::class, 'verify'])->name('checkoutVerify');
Route::post('/user/verify', [App\Http\Controllers\UserController::class, 'userVerify'])->name('userVerify');

Route::get('/user/past/orders', [App\Http\Controllers\ProfileController::class, 'pastOrders'])->name('pastOrders');
Route::get('/user/past/order/details/{order_id}', [App\Http\Controllers\ProfileController::class, 'pastOrderDetails'])->name('pastOrderDetails');
Route::get('/account', [App\Http\Controllers\ProfileController::class, 'myaccount'])->name('myaccount')->middleware('auth:web');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::get('/change/local', [App\Http\Controllers\HomeController::class, 'langLocalization'])->name('langLocalization');
Route::get('/change/local', [App\Http\Controllers\HomeController::class, 'langLocalization'])->name('langLocalization');
Route::get("/user/register" , [App\Http\Controllers\Auth\RegisterController::class , 'registerUser'])->name('userRegister');
Route::post("/user/register" , [App\Http\Controllers\Auth\RegisterController::class , 'registerUser'])->name('userRegister');
Route::get("/user/login" , [App\Http\Controllers\Auth\LoginController::class , 'userLogin'])->name('userLogin');
Route::post("/user/login" , [App\Http\Controllers\Auth\LoginController::class , 'userLogin'])->name('userLogin');
Route::get("/user/logout" , [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('logout');

Route::get("/user/reset/mail/password" , [App\Http\Controllers\Auth\LoginController::class , 'userPasswordReset'])->name('userPasswordReset');
Route::post("/user/reset/mail/password" , [App\Http\Controllers\Auth\LoginController::class , 'userPasswordReset'])->name('userPasswordReset');
Route::get("/user/reset/password" , [App\Http\Controllers\Auth\LoginController::class , 'RESETWizard2'])->name('userPasswordReset2');
Route::post("/user/reset/password" , [App\Http\Controllers\Auth\LoginController::class , 'RESETWizard2'])->name('userPasswordReset2');

Route::post("/user/menu/meal/cart" , [App\Http\Controllers\MenuController::class , 'addToCart'])->name('addToCart');
Route::get("/user/menu/meal/detail/{meal_id}" , [App\Http\Controllers\MenuController::class , 'mealDetail'])->name('mealDetail');
Route::get("/user/menu/meal/rating/{meal_id}/{rate}" , [App\Http\Controllers\MenuController::class , 'rate'])->name('rate');
Route::post("/user/menu/meal/review" , [App\Http\Controllers\MenuController::class , 'review'])->name('review');
Route::get("/user/menu/meal/review/remove/{meal_id}/{user_id}" , [App\Http\Controllers\MenuController::class , 'reviewRemove'])->name('reviewRemove');

Route::get('/user/copouns/loyalities' , [App\Http\Controllers\HomeController::class , 'getLoyalitiesOfUser'])->name('loyalities.user');

Route::get("/user/menu/meal/cart/{cart_row_id}" , [App\Http\Controllers\CartController::class , 'mealDelete'])->name('mealDelete');
Route::post('/user/profile/password/update' , [App\Http\Controllers\ProfileController::class , 'updatePassword'])->name('updatePassword');
Route::post('/user/profile/info/update' , [App\Http\Controllers\ProfileController::class , 'updateInfo'])->name('updateInfo');

Route::get('/user/copouns/loyalities' , [App\Http\Controllers\HomeController::class , 'getLoyalitiesOfUser'])->name('loyalities.user');
Route::get("/user/menu/meal/cart/{cart_row_id}" , [App\Http\Controllers\CartController::class , 'mealDelete'])->name('mealDelete');
Route::post("/user/menu/meal/cart/coupon/check" , [App\Http\Controllers\CartController::class , 'couponCheck'])->name('couponCheck');

Route::post("/admin/login" , [App\Http\Controllers\Auth\LoginController::class , 'adminLogin'])->name('post.admin.login');
Route::get("/admin/login" , [App\Http\Controllers\Auth\LoginController::class , 'adminLogin'])->name('get.admin.login');
Route::get("/admin/logout" , [App\Http\Controllers\Auth\LoginController::class , 'adminLogout'])->name('adminLogout');
Route::get("/admin/forget/mail/password" , [App\Http\Controllers\Auth\LoginController::class , 'forgetWizard'])->name('forgetWizard');
Route::post("/admin/forget/mail/password" , [App\Http\Controllers\Auth\LoginController::class , 'forgetWizard'])->name('forgetWizard');
Route::get("/admin/reset/mail/password" , [App\Http\Controllers\Auth\LoginController::class , 'RESETWizard'])->name('RESETWizard');
Route::post("/admin/reset/mail/password" , [App\Http\Controllers\Auth\LoginController::class , 'RESETWizard'])->name('RESETWizard');
Route::post('/user/verify2', [App\Http\Controllers\Auth\LoginController::class, 'userVerify2'])->name('userVerify2');

//Route::post("/user/passwords/check" , [App\Http\Controllers\HomeController::class , 'registerPasswordsCheck'])->name('registerPasswordsCheck');

Route::group(["prefix" => "admin" , "middleware" => 'admin_auth'] ,function () {

 Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboardAccess'])->name('adminAccess');

Route::get('/menu/meals', [App\Http\Controllers\AdminController::class, 'meals'])->name('mealsGet');
Route::get('/menu/meal/add/new', [App\Http\Controllers\AdminController::class, 'mealCreation'])->name('mealPost');
Route::get('/menu/meal/details', [App\Http\Controllers\AdminController::class, 'mealDetails'])->name('mealDetails');
Route::get('/dashboard/orders', [App\Http\Controllers\OrderController::class, 'orders'])->name('orders');
    Route::get('/dashboard/order/status/{status_type}/{order_id}', [App\Http\Controllers\OrderController::class, 'changeOrderStatus'])->name('orderStatus');
Route::get('/dashboard/invoices', [App\Http\Controllers\AdminController::class, 'invoices'])->name('invoices');
Route::get('/dashboard/invoices/invoice/detail', [App\Http\Controllers\AdminController::class, 'invoiceDetail'])->name('invoiceDetails');
Route::get('/dashboard/order/invoice/{order_id}', [App\Http\Controllers\OrderController::class, 'invoiceDetail'])->name('invoiceDetails');
Route::get('/dashboard/customers', [App\Http\Controllers\AdminController::class, 'customers'])->name('customers');
Route::get('/dashboard/customers/reviews', [App\Http\Controllers\AdminController::class, 'customersReviews'])->name('customersReviews');

Route::get('/dashboard/sales', [App\Http\Controllers\AdminController::class, 'sales'])->name('sales');
Route::get('/dashboard/lang/{language}', [App\Http\Controllers\AdminController::class, 'adminDashboardLang'])->name('adminDashboardLang');

//ajax request for get weekly orders
Route::get('/dashboard/ordersFirstWeeklyStat/{month}' , [App\Http\Controllers\AdminController::class, 'getFirstWeeklyOrdersPerMonth'])->name('FirstweeklyOrders');
Route::get('/dashboard/ordersSecondWeeklyStat/{month}' , [App\Http\Controllers\AdminController::class, 'getSecondWeeklyOrdersPerMonth'])->name('SecondweeklyOrders');
Route::get('/dashboard/ordersThirdWeeklyStat/{month}' , [App\Http\Controllers\AdminController::class, 'getThirdWeeklyOrdersPerMonth'])->name('ThirdweeklyOrders');
Route::get('/dashboard/ordersFourthWeeklyStat/{month}' , [App\Http\Controllers\AdminController::class, 'getFourthWeeklyOrdersPerMonth'])->name('FourthweeklyOrders');
Route::get('/dashboard/getDay' , [App\Http\Controllers\AdminController::class, 'getDateByName'])->name('getDays');
Route::get('/dashboard/getbranchesWithOrders/{date}' , [App\Http\Controllers\AdminController::class, 'getBranchesWithTheirOrders'])->name('getbranchesOrders');


//Statistics Reports
Route::get('/dashboard/getStatisticsMeals' , [App\Http\Controllers\ReportController::class, 'GetMealsStatistics'])->name('statistics.meals');
Route::get('/dashboard/getStatisticsOrders' , [App\Http\Controllers\ReportController::class, 'GetOrdersStatistics'])->name('statistics.orders');
Route::get('/dashboard/getStatisticsUsers' , [App\Http\Controllers\ReportController::class, 'GetUsersStatistics'])->name('statistics.users');

Route::get('/dashboard/getSearchByName' , [App\Http\Controllers\ReportController::class, 'searchByName'])->name('search.ByName');
Route::get('/dashboard/getSearchByDate' , [App\Http\Controllers\ReportController::class, 'getSearchByDate'])->name('search.ByDate');
Route::get('/dashboard/getOrdersByDate' , [App\Http\Controllers\ReportController::class, 'getSearchByOrderDate'])->name('search.orderDate');
Route::get('/dashboard/getOrdersByOrderStatus' , [App\Http\Controllers\ReportController::class, 'getSearchByOrderStatus'])->name('search.orderStatus');
Route::get('/dashboard/getUsersByUsername' , [App\Http\Controllers\ReportController::class, 'getSearchByUsername'])->name('search.byUsername');
Route::get('/dashboard/getUsersByDate' , [App\Http\Controllers\ReportController::class, 'getSearchByUserDate'])->name('search.byUsersDate');
//Admin_CRUD
Route::get('/admins/index' , [App\Http\Controllers\AdminPanelController::class , 'index'])->name('admins.index')->middleware('auth:admin');
Route::get('/admins/create' , [App\Http\Controllers\AdminPanelController::class , 'create'])->name('admins.create')->middleware('auth:admin');
Route::post('/admins/store' , [App\Http\Controllers\AdminPanelController::class , 'store'])->name('admins.store');
Route::get('/admins/edit/{id}' , [App\Http\Controllers\AdminPanelController::class , 'edit'])->name('admins.edit')->middleware('auth:admin');
Route::post('/admins/update/{id}' , [App\Http\Controllers\AdminPanelController::class , 'update'])->name('admins.update');
Route::get('/admins/delete/{id}' , [App\Http\Controllers\AdminPanelController::class , 'delete'])->name('admins.delete');

//menu_category_CRUD
Route::get('/category/menu' , [App\Http\Controllers\CategoryMenuController::class , 'index'])->name('category.index')->middleware('auth:admin');
Route::get('/category/menu/create' , [App\Http\Controllers\CategoryMenuController::class , 'create'])->name('category.create')->middleware('auth:admin');
Route::post('/category/menu' , [App\Http\Controllers\CategoryMenuController::class , 'store'])->name('category.store');
Route::get('/category/menu/edit/{id}' , [App\Http\Controllers\CategoryMenuController::class , 'edit'])->name('category.edit')->middleware('auth:admin');
Route::post('/category/menu/update/{id}' , [App\Http\Controllers\CategoryMenuController::class , 'update'])->name('category.update');
Route::get('/category/menu/delete/{id}' , [App\Http\Controllers\CategoryMenuController::class , 'delete'])->name('category.delete');

//menu_meal_CRUD
Route::get('/menu/meal' , [App\Http\Controllers\MenuMealController::class , 'index'])->name('meals.index')->middleware('auth:admin');
Route::get('/menu/meal/create' , [App\Http\Controllers\MenuMealController::class , 'create'])->name('meals.create')->middleware('auth:admin');
Route::post('/menu/meal' , [App\Http\Controllers\MenuMealController::class , 'store'])->name('meals.store');
Route::get('/menu/meal/edit/{id}' , [App\Http\Controllers\MenuMealController::class , 'edit'])->name('meals.edit')->middleware('auth:admin');
Route::post('/menu/meal/update/{id}' , [App\Http\Controllers\MenuMealController::class , 'update'])->name('meals.update');
Route::get('/menu/meal/delete/{id}' , [App\Http\Controllers\MenuMealController::class , 'delete'])->name('meals.delete');

//Contacts_CRUD
Route::get('/contacts/index' , [App\Http\Controllers\ContactController::class , 'index'])->name('contacts.index')->middleware('auth:admin');
Route::get('/contacts/show/{id}' , [App\Http\Controllers\ContactController::class , 'show'])->name('contacts.show')->middleware('auth:admin');
Route::get('/contacts/delete/{id}' , [App\Http\Controllers\ContactController::class , 'delete'])->name('contacts.delete');

//Coupons_CRUD
Route::get('/coupon/index' , [App\Http\Controllers\CouponController::class , 'index'])->name('coupons.index')->middleware('auth:admin');
Route::get('/coupon/create' , [App\Http\Controllers\CouponController::class , 'create'])->name('coupons.create')->middleware('auth:admin');
Route::post('/coupon/store' , [App\Http\Controllers\CouponController::class , 'store'])->name('coupons.store');
Route::get('/coupon/edit/{id}' , [App\Http\Controllers\CouponController::class , 'edit'])->name('coupons.edit')->middleware('auth:admin');
Route::post('/coupon/update/{id}' , [App\Http\Controllers\CouponController::class , 'update'])->name('coupons.update');
Route::get('/coupon/delete/{id}' , [App\Http\Controllers\CouponController::class , 'delete'])->name('coupons.delete');

//Vats_CRUD
Route::get('/vats/index' , [App\Http\Controllers\VatController::class , 'index'])->name('vats.index')->middleware('auth:admin');
Route::get('/vats/edit/{id}' , [App\Http\Controllers\VatController::class , 'edit'])->name('vats.edit')->middleware('auth:admin');
Route::post('/vats/update/{id}' , [App\Http\Controllers\VatController::class , 'update'])->name('vats.update');

//Users_CRUD
Route::get('/users/index' , [App\Http\Controllers\UserController::class , 'index'])->name('users.index')->middleware('auth:admin');
Route::get('/users/create' , [App\Http\Controllers\UserController::class , 'create'])->name('users.create')->middleware('auth:admin');
Route::post('/users/store' , [App\Http\Controllers\UserController::class , 'store'])->name('users.store');
Route::get('/users/edit/{id}' , [App\Http\Controllers\UserController::class , 'edit'])->name('users.edit')->middleware('auth:admin');
Route::post('/users/update/{id}' , [App\Http\Controllers\UserController::class , 'update'])->name('users.update');
Route::get('/users/delete/{id}' , [App\Http\Controllers\UserController::class , 'delete'])->name('users.delete');

//Branches_CRUD
Route::get('/branches/index' , [App\Http\Controllers\BranchController::class , 'index'])->name('branches.index')->middleware('auth:admin');
Route::get('/branches/create' , [App\Http\Controllers\BranchController::class , 'create'])->name('branches.create')->middleware('auth:admin');
Route::post('/branches/store' , [App\Http\Controllers\BranchController::class , 'store'])->name('branches.store');
Route::get('/branches/edit/{id}' , [App\Http\Controllers\BranchController::class , 'edit'])->name('branches.edit')->middleware('auth:admin');
Route::post('/branches/update/{id}' , [App\Http\Controllers\BranchController::class , 'update'])->name('branches.update');
Route::get('/branches/delete/{id}' , [App\Http\Controllers\BranchController::class , 'delete'])->name('branches.delete');

//Invoices_CRUD
Route::get('/invoices/index' , [App\Http\Controllers\InvoiceController::class , 'index'])->name('invoices.index')->middleware('auth:admin');
Route::get('/invoices/show/{id}' , [App\Http\Controllers\InvoiceController::class , 'show'])->name('invoices.show')->middleware('auth:admin');
Route::get('/invoices/delete/{id}' , [App\Http\Controllers\InvoiceController::class , 'delete'])->name('invoices.delete');

//Loyalities_CRUD
Route::get('/loyality/index' , [App\Http\Controllers\LoyalityController::class , 'index'])->name('loyality.index')->middleware('auth:admin');
Route::get('/loyality/create' , [App\Http\Controllers\LoyalityController::class , 'create'])->name('loyality.create')->middleware('auth:admin');
Route::post('/loyality/store' , [App\Http\Controllers\LoyalityController::class , 'store'])->name('loyality.store');
Route::get('/loyality/edit/{id}' , [App\Http\Controllers\LoyalityController::class , 'edit'])->name('loyality.edit')->middleware('auth:admin');
Route::post('/loyality/update/{id}' , [App\Http\Controllers\LoyalityController::class , 'update'])->name('loyality.update');
Route::get('/loyality/delete/{id}' , [App\Http\Controllers\LoyalityController::class , 'delete'])->name('loyality.delete');

//Bank Info
Route::get('/banks/index' , [App\Http\Controllers\BankController::class , 'index'])->name('banks.index')->middleware('auth:admin');
Route::get('/banks/edit/{id}' , [App\Http\Controllers\BankController::class , 'edit'])->name('banks.edit')->middleware('auth:admin');
Route::post('/banks/update/{id}' , [App\Http\Controllers\BankController::class , 'update'])->name('banks.update');

    Route::get('/reservations/index' , [App\Http\Controllers\ReservationController::class , 'index'])->name('reservations');
    Route::get('/reservation/show/{reservation_id}' , [App\Http\Controllers\ReservationController::class , 'show'])->name('reservations.show');
    Route::get('/reservation/approval/{reservation_id}' , [App\Http\Controllers\ReservationController::class , 'approve'])->name('reservations.approve');
    Route::get('/settings/gen/info', [App\Http\Controllers\SettingsController::class, 'index1'])->name('settings_1');
    Route::get('/settings/cont/info', [App\Http\Controllers\SettingsController::class, 'index2'])->name('settings_2');
    Route::post('/settings/gen/info', [App\Http\Controllers\SettingsController::class, 'index1'])->name('settings_1');
    Route::post('/settings/cont/info', [App\Http\Controllers\SettingsController::class, 'index2'])->name('settings_2');
    Route::get('/settings/about/info', [App\Http\Controllers\SettingsController::class, 'index3'])->name('settings_3');
    Route::post('/settings/about/info', [App\Http\Controllers\SettingsController::class, 'index3'])->name('settings_3');

    Route::get('/images/slider', [App\Http\Controllers\SettingsController::class, 'slider'])->name('slider');
    Route::post('/images/slider', [App\Http\Controllers\SettingsController::class, 'slider'])->name('slider');
    Route::post('/images/slider/uploader/{id}', [App\Http\Controllers\SettingsController::class, 'sliderImageUploader'])->name('sliderImageUploader');
    Route::get('/images/section', [App\Http\Controllers\SettingsController::class, 'sectionImage'])->name('section');
    Route::post('/images/section', [App\Http\Controllers\SettingsController::class, 'sectionImage'])->name('section');
    Route::get('/images/section/edit/{section_id}', [App\Http\Controllers\SettingsController::class, 'sectionImageEdit'])->name('sectionEdit');
    Route::get('/images/section/categories', [App\Http\Controllers\SettingsController::class, 'sectionCategory'])->name('category_section');
    Route::post('/images/section/categories/{id}', [App\Http\Controllers\SettingsController::class, 'sectionCategory'])->name('category_section');
    Route::get('/images/section/categories/click/{id}', [App\Http\Controllers\SettingsController::class, 'sectionCategoryCustom'])->name('category_section');


});
//Route::get('{any}', function () {
//    return view('vue');
//})->where('any', '.*');
