<?php

namespace App\Providers;

use App\Constants\Status;
use App\Models\AdminNotification;
use App\Models\Company;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\Page;
use App\Models\Review;
use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $general = gs();
        $activeTemplate = activeTemplate();
        $viewShare['general']            = $general;
        $viewShare['activeTemplate']     = $activeTemplate;
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        $viewShare['language']           = Language::all();
        $viewShare['pages']              = Page::where('tempname',$activeTemplate)->where('slug','!=','/')->where('is_default', 0)->get();
        $viewShare['emptyMessage']       = 'Data not found';
        view()->share($viewShare);


        view()->composer('admin.partials.sidenav', function ($view) {
            $view->with([
                'bannedUsersCount'           => User::banned()->count(),
                'emailUnverifiedUsersCount'  => User::emailUnverified()->count(),
                'mobileUnverifiedUsersCount' => User::mobileUnverified()->count(),
                'pendingTicketCount'         => SupportTicket::whereIN('status', [Status::TICKET_OPEN, Status::TICKET_REPLY])->count(),
                'pendingCompaniesCount'      => Company::pending()->count(),
            ]);
        });

        view()->composer('admin.partials.topnav', function ($view) {
            $view->with([
                'adminNotifications'     => AdminNotification::where('is_read', Status::NO)->with('user')->orderBy('id', 'desc')->take(10)->get(),
                'adminNotificationCount' => AdminNotification::where('is_read', Status::NO)->count(),
            ]);
        });

        view()->composer('partials.seo', function ($view) {
            $seo = Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });

        if ($general->force_ssl) {
            \URL::forceScheme('https');
        }
         //Total review counter-auth- user
         view()->composer($activeTemplate . 'partials.user_left_nav', function ($view) {
            $view->with([
                'totalReview' => Review::where('user_id', auth()->id())->get('review')->count(),
            ]);
        });
        Paginator::useBootstrapFour();
    }
}
