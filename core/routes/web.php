<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/', 'supportTicket')->name('index');
    Route::get('new', 'openSupportTicket')->name('open');
    Route::post('create', 'storeSupportTicket')->name('store');
    Route::get('view/{ticket}', 'viewTicket')->name('view');
    Route::post('reply/{ticket}', 'replyTicket')->name('reply');
    Route::post('close/{ticket}', 'closeTicket')->name('close');
    Route::get('download/{ticket}', 'ticketDownload')->name('download');
});



//company
Route::controller('SiteController')->name('company.')->prefix('company')->group(function () {
    Route::get('rating/{slug}', 'companyRating')->name('rating');

    Route::get('all', 'companies')->name('all');
    Route::get('/', 'searchFromBanner')->name('search');
    Route::get('category/{id}/{slug}', 'categoryCompany')->name('category');
    Route::get('filter', 'filterCompanies')->name('filter');
    Route::get('{id}/{slug}', 'companyDetails')->name('details');
    Route::middleware('check.status')->group(function () {
        Route::post('review/{id}', 'review')->name('user.review');
        Route::get('get/review/{id}', 'getReview')->name('get.user.review');
    });
});




Route::controller('SiteController')->group(function () {

    
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');


    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');
    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');

    Route::get('/add/click/{id}', 'SiteController@addClick')->name('add.click');

    Route::get('blog', 'SiteController@blogs')->name('blog');
    Route::get('blog/{slug}/{id}', 'blogDetails')->name('blog.details');

    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');


    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
});
