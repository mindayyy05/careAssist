<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaretakerRegisterController;
use App\Http\Controllers\CaretakerLoginController;
use App\Http\Controllers\CaretakerDashboardController;
use App\Http\Controllers\HireCaretakerController;
use App\Http\Controllers\HireCaretaker2Controller;
use App\Http\Controllers\RegisteredUserController; // Add this line for RegisteredUserController
use App\Http\Controllers\CaretakerClientController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CaretakerController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ClientDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CaretakerProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MentalHealthProviderController;
use App\Http\Controllers\TherapistRegistrationController;
use App\Http\Controllers\TherapistLoginController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInfoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SupplierRegistrationController;
use App\Http\Controllers\SupplierLoginController;
use App\Http\Controllers\SupplierDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BabysitterBookingController;
use App\Http\Controllers\BabysitterDashboardController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\TherapistFeedbackController;
use App\Http\Controllers\BabysitterFeedbackController;
use App\Http\Controllers\BabysitterProfileController;
use App\Models\BabysitterFeedback;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BabysitterMessageController;
use App\Http\Controllers\CaretakerRequestController;


Route::get('/caretaker/dashboard', [CaretakerDashboardController::class, 'index'])->name('caretaker.dashboard');
Route::get('/client/{id}', [CaretakerDashboardController::class, 'clientDetails'])->name('client.details');
Route::get('/client/{id}', [CaretakerDashboardController::class, 'clientDetails'])->name('client.details');



Route::get('/caretaker/client/{clientId}', [ClientDetailsController::class, 'show'])->name('caretaker.client.details');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route for who_are_you page
Route::get('/who-are-you', function () {
    return view('who_are_you');
})->name('who_are_you');

// Route for caretaker registration form
Route::get('/caretaker-register', function () {
    return view('caretaker_register');
})->name('caretaker_register');

// Route to handle caretaker registration form submission
Route::post('/caretaker-register', [CaretakerRegisterController::class, 'store'])->name('caretaker_register_post');

Route::middleware(['auth:caretaker', 'caretaker.auth'])->group(function () {
    Route::get('/caretaker_dashboard', [CaretakerDashboardController::class, 'index'])->name('caretaker_dashboard');
});

// Route to display caretakers
Route::get('/caretakers', function () {
    return view('caretakers');
})->name('caretakers');

// Route for top caretaker 1 details
Route::get('/topcaretaker1', function () {
    return view('topcaretaker1');
})->name('topcaretaker1');

Route::get('/topcaretaker2', function () {
    return view('topcaretaker2');
})->name('topcaretaker2');

// // Route for hiring caretaker form
// Route::get('/hire-caretaker', [HireCaretakerController::class, 'showForm'])->name('hire_caretaker');

// // Route to handle hiring caretaker form submission
// Route::post('/submit-hire-form', [HireCaretakerController::class, 'submitForm'])->name('submit_hire_form');

// Route for user registration
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest'])
    ->name('register');

// Add other routes as needed
// Route::get('/show-hire-form', [HireCaretakerController::class, 'methodName'])->name('show_hire_form');

// Route::get('/show-hire-form', [HireCaretakerController::class, 'showHireForm'])->name('show_hire_form');

// Route::get('/hire-caretaker', [HireCaretakerController::class, 'showForm'])->name('hire_caretaker');
// Route::post('/submit-hire-form', [HireCaretakerController::class, 'submitForm'])->name('submit_hire_form');
Route::post('/submit-hire-form', [CaretakerClientController::class, 'submitHireForm'])->middleware('auth');


Route::get('/hire-caretaker', [CaretakerClientController::class, 'showHireForm'])->name('hire_form');
Route::post('/submit-hire-form', [CaretakerClientController::class, 'submitHireForm'])->name('submit_hire_form');

Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('userdashboard');

Route::get('/userdashboard', [UserDashboardController::class, 'showDashboard'])->name('userdashboard');

// Caretaker registration routes
Route::get('/caretaker/register', [CaretakerRegisterController::class, 'create'])->name('caretaker_register');
Route::post('/caretaker/register', [CaretakerRegisterController::class, 'store'])->name('caretaker_register_post');

// Caretaker login routes
Route::get('/caretaker/login', [CaretakerLoginController::class, 'create'])->name('caretaker_login');
Route::post('/caretaker/login', [CaretakerLoginController::class, 'store'])->name('caretaker_login_post');

// Caretaker dashboard route
Route::get('/caretaker/dashboard', [CaretakerDashboardController::class, 'index'])->name('caretaker_dashboard')->middleware('auth:caretaker');

Route::get('/caretaker-register', [CaretakerRegisterController::class, 'create'])->name('caretaker_register');
Route::post('/caretaker-register', [CaretakerRegisterController::class, 'store'])->name('caretaker_register_post');


Route::middleware('auth')->group(function () {
    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
});

Route::get('/caretaker/login', [CaretakerLoginController::class, 'create'])->name('caretaker_login');

// routes/web.php
// routes/web.php

Route::middleware(['web', 'auth:caretaker', 'caretaker.auth'])->group(function () {
    Route::get('/caretaker_dashboard', [App\Http\Controllers\CaretakerDashboardController::class, 'index'])->name('caretaker_dashboard');
    // Other caretaker routes
});
Route::middleware(['auth:caretaker'])->group(function () {
    Route::get('/caretaker_dashboard', [CaretakerDashboardController::class, 'index'])->name('caretaker_dashboard');
    // Other caretaker routes
});

//form 2



Route::get('/payment/{caretaker_id}', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
Route::post('/payment/{caretaker_id}', [PaymentController::class, 'processPayment'])->name('payment.process');


// Route::post('/client/{id}/accept', [HireCaretakerController::class, 'acceptClient'])->name('client.accept');
// Route::post('/client/{id}/decline', [HireCaretakerController::class, 'declineClient'])->name('client.decline');


// Route::post('/client/{id}/accept', [HireCaretakerController::class, 'acceptClient'])->name('client.accept');
// Route::post('/client/{id}/decline', [HireCaretakerController::class, 'declineClient'])->name('client.decline');


Route::get('/add-review', function () {
    return view('add_review');
});

Route::post('/submit-review', [ReviewController::class, 'store']);

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

// Add this to your routes/web.php file
Route::get('/client/{id}/todo-list', [TodoController::class, 'showClientTodoList'])->name('client.todo.list');



Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// routes/web.php
Route::get('/caretaker/profile', [CaretakerProfileController::class, 'showProfile'])->name('caretaker.profile');



Route::middleware('auth')->group(function () {
    Route::get('/caretaker/profile', [CaretakerProfileController::class, 'showProfile'])->name('caretaker.profile');
});


Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedback'])->middleware('auth');

Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedback'])->name('submit-feedback')->middleware('auth');

Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedback'])
    ->name('submit-feedback');


Route::get('/feedbacks', [FeedbackController::class, 'showFeedbacks'])->name('feedbacks');

Route::get('/feedback', [FeedbackController::class, 'showFeedback'])->name('show-feedback');

Route::get('/topcaretaker1', [FeedbackController::class, 'showFeedback']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('/topcaretaker1', [CaretakerController::class, 'topCaretaker1'])->name('topcaretaker1');

// routes/web.php
Route::get('/client/{id}/todo-list', [TodoController::class, 'showClientTodoList'])->name('client.todo.list');

Route::get('/purchase-choose', function () {
    return view('purchase_choose');
});

// routes/web.php

Route::get('/babyproducts', function () {
    return view('babyproducts');
});

Route::get('/elderlyproducts', function () {
    return view('elderlyproducts');
});

// routes/web.php
Route::get('/mental-home', function () {
    return view('mental_home');
})->name('mental.home');


// routes/web.php
Route::get('/agency-page', function () {
    return view('agency_page'); // This should match the filename of your Blade template
});

// routes/web.php
Route::get('/therapist-profile', function () {
    return view('therapist_profile'); // Ensure this matches the filename of your Blade template
});

Route::post('/book-appointment', [AppointmentController::class, 'store']);

Route::get('/provider-register', [MentalHealthProviderController::class, 'showRegistrationForm'])->name('provider_register');
Route::post('/provider-register', [MentalHealthProviderController::class, 'register'])->name('provider_register.post');
Route::get('/provider-login', [MentalHealthProviderController::class, 'showLoginForm'])->name('provider_login');
Route::post('/provider-login', [MentalHealthProviderController::class, 'login'])->name('provider_login.post');
Route::get('/provider-dashboard', [MentalHealthProviderController::class, 'showDashboard'])->name('provider_dashboard');





// Registration Routes
Route::get('provider-register', [TherapistRegistrationController::class, 'showRegistrationForm'])->name('therapist_register');
Route::post('provider-register', [TherapistRegistrationController::class, 'register']);

// Login Routes
Route::get('provider-login', [TherapistLoginController::class, 'showLoginForm'])->name('therapist_login');
Route::post('provider-login', [TherapistLoginController::class, 'login']);

// Dashboard Route
Route::get('provider-dashboard', [MentalHealthProviderController::class, 'showDashboard'])->middleware('auth:mental_health_provider');


// Registration Routes
Route::get('provider-register', [TherapistRegistrationController::class, 'showRegistrationForm'])->name('provider_register');
Route::post('provider-register', [TherapistRegistrationController::class, 'register'])->name('provider_register.post');

// Login Routes
Route::get('provider-login', [TherapistLoginController::class, 'showLoginForm'])->name('provider_login');
Route::post('provider-login', [TherapistLoginController::class, 'login'])->name('provider_login.post');

// In routes/web.php
Route::get('/therapist-login', [TherapistLoginController::class, 'login'])->name('therapist_login');


// routes/web.php
Route::get('/therapist-login', [TherapistLoginController::class, 'showLoginForm'])->name('therapist_login');

// routes/web.php

Route::get('/provider-login', [TherapistLoginController::class, 'create'])->name('provider_login');
Route::post('/provider-login', [TherapistLoginController::class, 'store'])->name('provider_login.store');

// routes/web.php

Route::get('/therapist-register', [TherapistRegistrationController::class, 'create'])->name('therapist_register');

Route::get('/provider-register', [TherapistRegistrationController::class, 'showRegistrationForm'])->name('provider_register');
Route::post('/provider-register', [TherapistRegistrationController::class, 'register'])->name('provider_register.post');

Route::get('/provider-login', [TherapistLoginController::class, 'create'])->name('provider_login');
Route::post('/provider-login', [TherapistLoginController::class, 'store'])->name('provider_login.post');

Route::get('/provider-login', [TherapistLoginController::class, 'create']);

Route::get('/provider-dashboard', [MentalHealthProviderController::class, 'index'])->name('provider_dashboard');

Route::post('/add-to-cart', [ShoppingCartController::class, 'addToCart']);

Route::get('/shopping-cart', function () {
    return view('shoppingcart');
})->name('shoppingcart');

Route::get('/shopping-cart', [ShoppingCartController::class, 'showCart'])->name('shoppingcart');


Route::post('/save-product-info', [ProductController::class, 'store'])->name('save-product-info');

Route::post('/add-product', [ProductController::class, 'store'])->name('add.product');

// web.php
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');



Route::get('/booked-appointments', [AppointmentController::class, 'getBookedAppointments']);
Route::get('/therapist-profile', [AppointmentController::class, 'getBookedAppointments']);



Route::post('/add-to-cart', [ShoppingCartController::class, 'addToCart'])->name('add.to.cart');
// web.php
Route::post('/shoppingcart/add', [ShoppingCartController::class, 'add'])->name('shoppingcart.add');




Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
// In your web.php routes file
Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');

// routes/web.php
Route::get('/shopping-cart', function () {
    return view('shoppingcart');
})->name('shoppingcart');

// routes/web.php
Route::get('/shopping-cart', [CartController::class, 'show'])->name('shoppingcart');
// routes/web.php
Route::get('/shopping-cart', [CartController::class, 'showCart'])->name('shoppingcart');




Route::get('/babysitters', function () {
    return view('babysitters');
});




Route::post('/book-appointment', [AppointmentController::class, 'bookAppointment'])->middleware('auth');
// In routes/web.php or routes/api.php
Route::get('/therapist-profile', [AppointmentController::class, 'getBookedAppointments']);

Route::post('/book-appointment', [AppointmentController::class, 'store'])->name('book-appointment');

Route::get('/therapist-profile', [AppointmentController::class, 'getBookedAppointments']);

Route::get('/provider-login', [TherapistLoginController::class, 'showLoginForm'])->name('provider_login');


//supplier

Route::get('/supplier-register', [SupplierRegistrationController::class, 'showRegistrationForm'])->name('supplier_register');
Route::post('/supplier-register', [SupplierRegistrationController::class, 'register']);
Route::get('/supplier-login', [SupplierLoginController::class, 'showLoginForm'])->name('supplier_login');
Route::post('/supplier-login', [SupplierLoginController::class, 'login']);
Route::get('/supplier-dashboard', [SupplierDashboardController::class, 'index'])->middleware('auth:supplier')->name('supplier_dashboard');
Route::get('/supplier-login', [SupplierLoginController::class, 'showLoginForm'])->name('supplier_login');

Route::get('/supplier-orders', function () {
    return view('supplier_orders');
});

Route::get('/supplier-orders', [OrderController::class, 'showOrders'])->name('supplier.orders');





Route::get('/bagency', function () {
    return view('bagency');
})->name('bagency');

Route::get('/babysitterprofile', function () {
    return view('babysitterprofile');
})->name('babysitterprofile');





//babysitter

// Route to show the registration form
Route::get('/babysitter/register', function () {
    return view('babysitter_registration');
})->name('babysitter_register');

// Route to handle form submission
Route::post('/babysitter/register', [App\Http\Controllers\BabysitterController::class, 'register'])->name('babysitter_register');


// Route to show the login form
Route::get('/babysitter/login', function () {
    return view('babysitter_login');
})->name('babysitter_login');

// Route to handle login form submission
Route::post('/babysitter/login', [App\Http\Controllers\BabysitterAuthController::class, 'login'])->name('babysitter_login_process');

// Route to show the babysitter dashboard
Route::get('/babysitter/dashboard', function () {
    return view('babysitter_dashboard');
})->middleware('auth:babysitter')->name('babysitter_dashboard');


//checkout


Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'submitCheckout'])->name('checkout.submit');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

//bb

Route::post('/babysitter/booking', [BabysitterBookingController::class, 'store'])->name('babysitter.booking');

// bb db
Route::get('/babysitter/dashboard', [BabysitterDashboardController::class, 'showDashboard'])->name('babysitter_dashboard');


//accept/decline
Route::post('/booking/{id}/accept', [BabysitterBookingController::class, 'accept'])->name('booking.accept');
Route::post('/booking/{id}/decline', [BabysitterBookingController::class, 'decline'])->name('booking.decline');

//purchase orders
Route::get('/orderdetails', [PurchaseOrderController::class, 'showOrderDetails'])->name('orderdetails');

Route::post('/checkout', [PurchaseOrderController::class, 'store'])->name('checkout.store');

Route::get('/order-success', function () {
    return view('order-success'); // Create this view as needed
})->name('order.success');


Route::get('/supplier-orders', [OrderController::class, 'showOrders'])->name('supplier.orders');


Route::post('/todos', [UserDashboardController::class, 'storeTodoList'])->name('todos.store');
Route::post('/todo/add/{booking}', [TodoController::class, 'add'])->name('todo.add');



//feedbacks
Route::post('/submit-feedback', [TherapistFeedbackController::class, 'store'])->name('submit.feedback');


Route::get('/feedback', [FeedbackController::class, 'showFeedback']);
Route::get('/therapist-profile', [TherapistFeedbackController::class, 'show']);
Route::post('/submit-feedback', [TherapistFeedbackController::class, 'store'])->name('submit-feedback');


// In routes/web.php
Route::get('/userdashboard_therapy', function () {
    return view('userdashboard_therapy');
});


//therapy dashboard user
Route::get('/userdashboard_therapy', [AppointmentController::class, 'getBookedAppointmentss'])->name('userdashboard_therapy');

//complete appt btn
Route::put('/appointments/{id}/complete', [AppointmentController::class, 'markAsCompleted']);

//calender
Route::get('/babysitterprofile', [BabysitterBookingController::class, 'showBookings'])->name('babysitterprofile');
Route::get('/babysitterprofile', [BabysitterBookingController::class, 'showCalendar'])->name('calendar.show');


//bb feedback
Route::post('/submit-feedback', [BabysitterFeedbackController::class, 'store'])->name('submit.feedback');
Route::get('/babysitter-profile', [BabysitterFeedbackController::class, 'showFeedbacks'])->name('babysitter.profile');

Route::post('/submit-feedback', [TherapistFeedbackController::class, 'store'])->name('submit-feedback');
Route::post('/submit-feedback', [BabysitterFeedbackController::class, 'store'])->name('submit.feedback');

Route::post('/submit-feedback', [TherapistFeedbackController::class, 'submit'])->name('submit-feedback');

//bbdbtodoupdate
Route::post('/update-status', [BabysitterDashboardController::class, 'updateStatus'])->name('update.status');
Route::post('/submit-feedback', [FeedbackController::class, 'store'])->name('submit.feedback');


Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('userdashboard');
Route::get('/userdashboard/{babysitter_booking_id}', [UserDashboardController::class, 'showToDoList']);
Route::post('/submit-feedback', [TherapistFeedbackController::class, 'store'])->name('submit-feedback');

Route::post('/submit-feedback', [FeedbackController::class, 'store'])->name('submit.feedback');


Route::get('/supplier-orders', [PurchaseOrderController::class, 'showOrderDetails'])->name('supplier.orders');
Route::get('/supplier-orders', [OrderController::class, 'showOrders'])->name('supplier.orders');


Route::post('/submit-feedback', [BabysitterFeedbackController::class, 'store'])->name('submit.feedback');





Route::get('/babysitterprofile', [BabysitterBookingController::class, 'showProfile'])->name('babysitterprofile');


// Route to display the chat messages
Route::get('/chat', [MessageController::class, 'index'])->name('messages.index');

// Route to store new messages
Route::post('/chat', [MessageController::class, 'store'])->name('messages.store');

// Route to display the babysitter dashboard
Route::get('/babysitter-dashboard', [BabysitterDashboardController::class, 'showDashboard'])->name('babysitter.dashboard');

// Route to store new messages



Route::get('/babysitter-dashboard', [BabysitterDashboardController::class, 'showDashboard'])->name('babysitter.dashboard');


// Route to show the babysitter dashboard
Route::get('/babysitter-dashboard', [BabysitterDashboardController::class, 'showDashboard'])
    ->name('babysitter.dashboard')
    ->middleware('auth');



//new babysitter form
Route::post('/confirm-booking', [BookingController::class, 'confirmBooking'])->name('confirm.booking');
Route::post('/save-feeding-schedule', [BookingController::class, 'saveFeedingSchedule'])->name('save.feeding.schedule');
Route::post('/save-nap-schedule', [BookingController::class, 'saveNapSchedule'])->name('save.nap.schedule');

Route::get('/get-booking-details/{id}', [BookingController::class, 'getBookingDetails']);


//babysitterdashboardlinks
Route::get('/acceptedbookings', function () {
    return view('acceptedbookings'); // The name of your Blade file without the .blade.php extension
})->name('acceptedbookings');

Route::post('/bookings/{id}/status', [BookingController::class, 'updateStatus']);
Route::post('/accept-booking/{id}', [BookingController::class, 'acceptBooking'])->name('accept.booking');



//messages




// routes/web.php



Route::get('/message/view', function () {
    return view('message'); // Ensure 'message' is the correct view name
})->name('message.view');

Route::get('/message', [MessageController::class, 'index'])->name('message.index');
Route::post('/message', [MessageController::class, 'store'])->name('messages.store');
Route::get('/message/view', [MessageController::class, 'index'])->name('message.view');

// routes/web.php


Route::get('/babysitter/messages/view', function () {
    return view('babysitter_message'); // Ensure this matches the actual view name
})->name('babysitter_message.view'); // Changed the route name and URL path

Route::get('/babysitter/messages', [BabysitterMessageController::class, 'index'])->name('babysitter_message.index');
Route::post('/babysitter/messages', [BabysitterMessageController::class, 'store'])->name('babysitter_message.store');
Route::get('/babysitter/messages/view', [BabysitterMessageController::class, 'index'])->name('babysitter_message.view');


Route::get('/declined-bookings', [BookingController::class, 'declined'])->name('declinedbookings');

Route::get('/acceptedbookings', [BookingController::class, 'acceptedBookings'])->name('acceptedbookings');
Route::post('/bookings/{id}/mark-as-done', [BookingController::class, 'markAsDone']);


Route::get('/user-dashboard', [BookingController::class, 'showUserDashboard']);
Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('userdashboard');
// Optional: If you have an additional method to fetch messages for a specific user dynamically
Route::middleware('auth')->group(function () {
    Route::get('/messages', [BabysitterMessageController::class, 'index'])->name('babysitter_message.index');
    Route::post('/messages', [BabysitterMessageController::class, 'store'])->name('babysitter_message.store');
    Route::get('/messages/{user}', [BabysitterMessageController::class, 'showMessages'])->name('babysitter_message.show');
});


// In web.php
Route::post('/check-booking', [BookingController::class, 'checkDateAvailability']);

Route::get('/babysitter-profile', [BookingController::class, 'showBabysitterProfile'])->name('babysitterProfile');
Route::post('/store-review', [BookingController::class, 'storeReview'])->name('storeReview');

Route::get('/babysitterprofile', [BabysitterProfileController::class, 'showProfile'])->name('babysitterprofile');

Route::post('/report-babysitter', [BookingController::class, 'report'])->name('reportBabysitter');


//caretaker
Route::post('/caretaker/store', [CaretakerRequestController::class, 'store'])->name('caretaker.store')->middleware('auth');


Route::get('/userdashboard/caretaker', [UserDashboardController::class, 'caretaker'])->name('userdashboard_caretaker');

Route::get('/caretaker_bookings', function () {
    return view('caretaker_bookings');
})->name('caretaker_bookings');


Route::get('/caretaker_bookings', [UserDashboardController::class, 'showCaretakerBookings'])->middleware('auth')->name('caretaker_bookings');

Route::get('/caretaker_dashboard', [CaretakerDashboardController::class, 'showDashboard'])->name('caretaker_dashboard');

Route::post('/accept-request/{id}', [CaretakerRequestController::class, 'acceptRequest'])->name('acceptRequest');
Route::post('/decline-request/{id}', [CaretakerRequestController::class, 'declineRequest'])->name('declineRequest');


Route::post('/submit-feedback', [FeedbackController::class, 'store'])->name('feedback.submit');

use App\Models\CaretakerFeedback;

Route::get('/get-feedbacks', function () {
    $feedbacks = CaretakerFeedback::orderBy('created_at', 'desc')->get();
    return response()->json($feedbacks);
});



Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
