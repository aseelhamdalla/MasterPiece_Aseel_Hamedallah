<?php

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
use App\Category;
use App\Http\Controllers\CustomerController;
use App\service;
use App\User;
use Illuminate\Notifications\Notification;
use App\user_info;
// use Illuminate\Support\Facades\Auth;

Route::get('/dashboardPages', function () {
    return view('dashboardPages.index');
});


// ********************************************************dashboard
Route::post('/Category/create', 'CategoryController@store');
Route::get('/Category/{category}/delete', 'CategoryController@delete');
Route::get('/Category', 'CategoryController@create')->name('Category');
Route::get('/Category/{category}/edit', 'CategoryController@edit');
Route::post('/category/{category}/update', 'CategoryController@update');
Route::get('/categories', 'CategoryController@index')->name('Categories');
Route::get('/Manage_services', 'ServiceController@getserviceList');
Route::get('/Manage_services/delete/{id}', 'ServiceController@delete');
Route::get('/Manage_providers', 'ProviderController@getproviderList');
Route::get('/Manage_providers/delete/{id}', 'ProviderController@delete');
Route::get('/Manage_custmers', 'CustomerController@getcustmerList');

Route::get('/Manage_custmers/delete/{id}', 'CustomerController@delete');
Route::get('/setting', function() {
    return view('dashboardPages.setting');
});
Route::get('/Manage_reviews', 'reviewController@getreviewsList');
Route::get('/Manage_reviews/delete/{id}', 'reviewController@delete');
Route::get('/Manage_booking', 'BookingController@getbookingsList');
Route::get('/Manage_booking/delete/{id}', 'BookingController@deletebook');
Route::get('/Manage_Payment', 'PaymentController@getPaymentsList');
Route::get('/Manage_Payment/delete/{id}', 'PaymentController@delete');

// *********************************************Public Pages 
// Route::get('/publicindex', function () {
//     return view('publicPages.publicIndex');
// });
Route::get('/catPublic', function () {
    return view('publicPages.catPublic');
});


Route::get('/single', function () {
    return view('publicPages.single');
});

Route::get('/about', function () {
    return view('publicPages.about');
});
Route::get('/contactus', function () {
    return view('publicPages.contactus');
});



Route::get('/', function () {
    return view('landing');
});


Route::get('/landing','UserController@index');

// Route::get('/landing/review', 'reviewController@SumRating');


Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/provider', 'ProviderController@index')->name('provider')->middleware('provider');
Route::get('/user', 'UserController@index')->name('user')->middleware('user');


// **************************************************** provider pages in dashboard  


Route::get('/services', function () {
    return view('provider.services');
});


Route::get('/reviews', function () {
    return view('provider.reviews');
});

Route::get('/ShowUserReviewsDashboard/{id}', 'reviewController@userReviewsPage');


Route::post('/create/{id}', 'ServiceController@store');



// -------------search in home page ----------------------------------
Route::post('search_service', 'ServiceController@search');


// Route::post('filter_search_service', 'ServiceController@sorting');

// ----------------search in dashboard-------------------------------------
Route::post('search_service_dashboard', 'ServiceController@searchDashboard');


// ************************************ Provider profile setting 


/////////////////////////////////////////one to many relation (cat-services)
Route::get('create',function($id){

    $cat= Category::find($id);
    $ser=new service(['name'=>'test','desc'=>'desctest','location'=>'test','price'=>'test','image'=>'test']);
    $cat->service()->save($ser);

});

// Route::get('/serviceCategories/{id}', 'CategoryController@show1');

/////////////////////////////////////////////////////////////////////////////

// *********************** To display category as selecting list in some pages

Route::get('/profile', 'CategoryController@categoryforprofile');
// *************************************************************************
// *************************************provider profile


/////////////////////////////////////////one to one relation (user-user_info)



// ***********************************************************************
////start provder dashboard
Route::get('/profile/{id}','UserInfoController@create');
Route::post('/update/{id}', 'UserInfoController@update');
Route::get('/provider_dashboard/{id}', 'UserInfoController@show2');
Route::get('/public_main/{id}', 'UserInfoController@showmain');
// Route::get('/public_main/{id}', 'UserInfoController@showmain');

Route::get('/add_service/{id}', 'UserInfoController@showservice');
Route::get('/services/{id}', 'ServiceController@proservice');
Route::get('provider_dashboard/booking_list/{id}', 'BookingController@showBookList');
Route::get('provider_dashboard/booking_list/accept/{id}', 'BookingController@accept');
Route::get('provider_dashboard/booking_list/rejecte/{id}', 'BookingController@rejecte');


Route::get('/noBooking', function () {
    return view('noBooking');
});


Route::get('/noBookingUser', function () {
    return view('noBookingUser');
});

Route::get('/noService', function () {
    return view('noService');
});
// *******************************************************************
////start user profile
Route::get('/user/dashboard/{id}','CustomerController@index');
Route::get('user/dashboard/profile/{id}','CustomerController@create');
Route::post('user/dashboard/update/{id}','CustomerController@store');
 
// ************************************Counting show in index page in dashboard
Route::get('/dashboardPages','UserController@read');









// *************To show all service in certine category *****************
Route::get('/PostsCategories/{id}', 'CategoryController@show1');

// Route::post('/PostsCategories/{id}', 'CategoryController@filter');
//************************To show single page************************************ */
Route::get('PostsCategories/service/{id}', 'ServiceController@single');
Route::get('/reviews/{id}', 'reviewController@showReviews')->name('reviews');
Route::post('/reviews/{id}', 'reviewController@storeReviews');




// ********************************************************************************

// ************************************To make edit and delet in service by provider*********
Route::get('services/service/{id}', 'ServiceController@edit');
Route::post('services/service/update/{id}', 'ServiceController@update');
Route::get('services/delet/{id}', 'ServiceController@delet');

// **************************************************** Avability******************
Route::get('/avalable/{id}', function () {
    return view('provider.avalability');
});
Route::post('/avalableeee/{id}', 'AvalabilityController@store');


// *****************Booking********************
Route::get('PostsCategories/service/book/{id}', 'BookingController@index');

Route::get('PostsCategories/service/book/{id}', 'BookingController@bookingform');
Route::post('/book/{id}', 'BookingController@create');
Route::get('/my_booking/{id}', 'BookingController@mybooking');
Route::get('my_booking/delet/{id}', 'BookingController@destroy');
Route::get('my_booking/complete/{id}', 'BookingController@complete');


// ***************************************************************Notification ***********

Route::get('/markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
  return  redirect()->back();
})->name('MarkRead');


Route::get('/deletNotification', function(){
    auth()->user()->notifications()->delete();
  return  redirect()->back();
})->name('deletNotification');

Route::get('/ShowNotification', 'NotificationController@showAllNotification')->name('ShowNotification');;
Route::get('/ShowNotificationForUser', 'NotificationController@showAllNotificationForUser')->name('ShowNotificationForUser');;


// ****************************************Payment for provider 
Route::post('/ProviderPayment/{id}', 'PaymentController@store');
Route::get('/ProviderPayment/{id}', 'PaymentController@ProPayment');

