<?php

use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->group(function () {
    Route::controller('LoginController')->group(function () {
        Route::get('/', 'showLoginForm')->name('login');
        Route::post('/', 'login')->name('login');
        Route::get('logout', 'logout')->name('logout');
    });

    // Admin Password Reset
    Route::controller('ForgotPasswordController')->prefix('password')->name('password.')->group(function () {
        Route::get('reset', 'showLinkRequestForm')->name('reset');
        Route::post('reset', 'sendResetCodeEmail');
        Route::get('code-verify', 'codeVerify')->name('code.verify');
        Route::post('verify-code', 'verifyCode')->name('verify.code');
    });

    Route::controller('ResetPasswordController')->group(function () {
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset.form');
        Route::post('password/reset/change', 'reset')->name('password.change');
    });
});

Route::middleware('admin')->group(function () {
    Route::controller('AdminController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'profileUpdate')->name('profile.update');
        Route::get('password', 'password')->name('password');
        Route::post('password', 'passwordUpdate')->name('password.update');

        //Notification
        Route::get('notifications', 'notifications')->name('notifications');
        Route::get('notification/read/{id}', 'notificationRead')->name('notification.read');
        Route::get('notifications/read-all', 'readAll')->name('notifications.readAll');

        //Report Bugs
        Route::get('request-report', 'requestReport')->name('request.report');
        Route::post('request-report', 'reportSubmit');

        Route::get('download-attachments/{file_hash}', 'downloadAttachment')->name('download.attachment');
    });


    //== Category ==
    Route::controller('CategoryController')->name('category.')->prefix('category')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store/{id?}', 'store')->name('store');
        Route::post('status/{id}', 'status')->name('status');
    });

    //== Company ==
    Route::controller('ManageCompanyController')->name('company.')->prefix('companies')->group(function () {
        Route::get('all/{userId?}', 'index')->name('index');
        Route::get('pending', 'index')->name('pending');
        Route::get('approved', 'index')->name('approved');
        Route::get('rejected', 'index')->name('rejected');

        Route::get('details/{id}', 'details')->name('details');
        Route::post('status/{id}', 'status')->name('status');
    });

    //== Review ==
    Route::controller('ReviewController')->name('review.')->prefix('review')->group(function () {
        Route::get('all', 'index')->name('index');
        Route::post('delete/{id}/{slug}', 'delete')->name('delete');
    });


    // == Advertisement ===
    Route::controller('AdvertisementController')->name('advertisement.')->prefix('advertisement')->group(function () {
        Route::get('all', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store/{id?}', 'store')->name('store');
    });
    // End Advertisement   //



    // Users Manager
    Route::controller('ManageUsersController')->name('users.')->prefix('users')->group(function () {
        Route::get('/', 'allUsers')->name('all');
        Route::get('active', 'activeUsers')->name('active');
        Route::get('banned', 'bannedUsers')->name('banned');
        Route::get('email-verified', 'emailVerifiedUsers')->name('email.verified');
        Route::get('email-unverified', 'emailUnverifiedUsers')->name('email.unverified');
        Route::get('mobile-unverified', 'mobileUnverifiedUsers')->name('mobile.unverified');
        Route::get('mobile-verified', 'mobileVerifiedUsers')->name('mobile.verified');

        Route::get('detail/{id}', 'detail')->name('detail');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('add-sub-balance/{id}', 'addSubBalance')->name('add.sub.balance');
        Route::get('send-notification/{id}', 'showNotificationSingleForm')->name('notification.single');
        Route::post('send-notification/{id}', 'sendNotificationSingle')->name('notification.single');
        Route::get('login/{id}', 'login')->name('login');
        Route::post('status/{id}', 'status')->name('status');

        Route::get('send-notification', 'showNotificationAllForm')->name('notification.all');
        Route::post('send-notification', 'sendNotificationAll')->name('notification.all.send');
        Route::get('notification-log/{id}', 'notificationLog')->name('notification.log');
    });



    // Report
    Route::controller('ReportController')->prefix('report')->name('report.')->group(function () {
        Route::get('login/history', 'loginHistory')->name('login.history');
        Route::get('login/ipHistory/{ip}', 'loginIpHistory')->name('login.ipHistory');
        Route::get('notification/history', 'notificationHistory')->name('notification.history');
        Route::get('email/detail/{id}', 'emailDetails')->name('email.details');
    });


    // Admin Support
    Route::controller('SupportTicketController')->prefix('ticket')->name('ticket.')->group(function () {
        Route::get('/', 'tickets')->name('index');
        Route::get('pending', 'pendingTicket')->name('pending');
        Route::get('closed', 'closedTicket')->name('closed');
        Route::get('answered', 'answeredTicket')->name('answered');
        Route::get('view/{id}', 'ticketReply')->name('view');
        Route::post('reply/{id}', 'replyTicket')->name('reply');
        Route::post('close/{id}', 'closeTicket')->name('close');
        Route::get('download/{ticket}', 'ticketDownload')->name('download');
        Route::post('delete/{id}', 'ticketDelete')->name('delete');
    });


    // Language Manager
    Route::controller('LanguageController')->prefix('language')->name('language.')->group(function () {
        Route::get('/', 'langManage')->name('manage');
        Route::post('/', 'langStore')->name('manage.store');
        Route::post('delete/{id}', 'langDelete')->name('manage.delete');
        Route::post('update/{id}', 'langUpdate')->name('manage.update');
        Route::get('edit/{id}', 'langEdit')->name('key');
        Route::post('import', 'langImport')->name('import.lang');
        Route::post('store/key/{id}', 'storeLanguageJson')->name('store.key');
        Route::post('delete/key/{id}', 'deleteLanguageJson')->name('delete.key');
        Route::post('update/key/{id}', 'updateLanguageJson')->name('update.key');
    });

    Route::controller('GeneralSettingController')->group(function () {
        // General Setting
        Route::get('general-setting', 'index')->name('setting.index');
        Route::post('general-setting', 'update')->name('setting.update');

        //configuration
        Route::get('setting/system-configuration', 'systemConfiguration')->name('setting.system.configuration');
        Route::post('setting/system-configuration', 'systemConfigurationSubmit');

        // Logo-Icon
        Route::get('setting/logo-icon', 'logoIcon')->name('setting.logo.icon');
        Route::post('setting/logo-icon', 'logoIconUpdate')->name('setting.logo.icon');

        //Custom CSS
        Route::get('custom-css', 'customCss')->name('setting.custom.css');
        Route::post('custom-css', 'customCssSubmit');

        //Cookie
        Route::get('cookie', 'cookie')->name('setting.cookie');
        Route::post('cookie', 'cookieSubmit');

        //maintenance_mode
        Route::get('maintenance-mode', 'maintenanceMode')->name('maintenance.mode');
        Route::post('maintenance-mode', 'maintenanceModeSubmit');
    });

    //Notification Setting
    Route::name('setting.notification.')->controller('NotificationController')->prefix('notification')->group(function () {
        //Template Setting
        Route::get('global', 'global')->name('global');
        Route::post('global/update', 'globalUpdate')->name('global.update');
        Route::get('templates', 'templates')->name('templates');
        Route::get('template/edit/{id}', 'templateEdit')->name('template.edit');
        Route::post('template/update/{id}', 'templateUpdate')->name('template.update');

        //Email Setting
        Route::get('email/setting', 'emailSetting')->name('email');
        Route::post('email/setting', 'emailSettingUpdate');
        Route::post('email/test', 'emailTest')->name('email.test');

        //SMS Setting
        Route::get('sms/setting', 'smsSetting')->name('sms');
        Route::post('sms/setting', 'smsSettingUpdate');
        Route::post('sms/test', 'smsTest')->name('sms.test');
    });

    // Plugin
    Route::controller('ExtensionController')->prefix('extensions')->name('extensions.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('status/{id}', 'status')->name('status');
    });


    //System Information
    Route::controller('SystemController')->name('system.')->prefix('system')->group(function () {
        Route::get('info', 'systemInfo')->name('info');
        Route::get('server-info', 'systemServerInfo')->name('server.info');
        Route::get('optimize', 'optimize')->name('optimize');
        Route::get('optimize-clear', 'optimizeClear')->name('optimize.clear');
    });


    // SEO
    Route::get('seo', 'FrontendController@seoEdit')->name('seo');


    // Frontend
    Route::name('frontend.')->prefix('frontend')->group(function () {

        Route::controller('FrontendController')->group(function () {
            Route::get('templates', 'templates')->name('templates');
            Route::post('templates', 'templatesActive')->name('templates.active');
            Route::get('frontend-sections/{key}', 'frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'frontendElement')->name('sections.element');
            Route::post('remove/{id}', 'remove')->name('remove');
        });

        // Page Builder
        Route::controller('PageBuilderController')->group(function () {
            Route::get('manage-pages', 'managePages')->name('manage.pages');
            Route::post('manage-pages', 'managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete/{id}', 'managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'manageSectionUpdate')->name('manage.section.update');
        });
    });
});
