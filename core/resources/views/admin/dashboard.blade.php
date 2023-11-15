@extends('admin.layouts.app')

@section('panel')
    @if(@json_decode($general->system_info)->version > systemDetails()['version'])
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">
                    <h3 class="card-title"> @lang('New Version Available') <button class="btn btn--dark float-end">@lang('Version') {{json_decode($general->system_info)->version}}</button> </h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-dark">@lang('What is the Update ?')</h5>
                    <p><pre  class="f-size--24">{{json_decode($general->system_info)->details}}</pre></p>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(@json_decode($general->system_info)->message)
    <div class="row">
        @foreach(json_decode($general->system_info)->message as $msg)
            <div class="col-md-12">
                <div class="alert border border--primary" role="alert">
                    <div class="alert__icon bg--primary"><i class="far fa-bell"></i></div>
                    <p class="alert__message">@php echo $msg; @endphp</p>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            </div>
        @endforeach
    </div>
    @endif

    <div class="row gy-4">
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--primary has-link overflow-hidden box--shadow2">
                <a href="{{ route('admin.company.index') }}" class="item-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                    <div class="col-4">
                        <i class="la la-bank f-size--56"></i>
                    </div>
                    <div class="col-8 text-end">
                        <span class="text-white text--small">@lang('Total Companies')</span>
                        <h2 class="text-white">{{ $widget['total_companies'] }}</h2>
                    </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--success has-link box--shadow2">
                <a href="{{ route('admin.company.approved') }}" class="item-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                    <div class="col-4">
                        <i class="la la-thumbs-up f-size--56"></i>
                    </div>
                    <div class="col-8 text-end">
                        <span class="text-white text--small">@lang('Total Approved Companies')</span>
                        <h2 class="text-white">{{ $widget['total_approved_companies'] }}</h2>
                    </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--danger has-link box--shadow2">
                <a href="{{ route('admin.company.pending') }}" class="item-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                    <div class="col-4">
                        <i class="la la-pause-circle f-size--56"></i>
                    </div>
                    <div class="col-8 text-end">
                        <span class="text-white text--small">@lang('Total Pending Companies')</span>
                        <h2 class="text-white">{{$widget['total_pending_companies']}}</h2>
                    </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--red has-link box--shadow2">
                <a href="{{ route('admin.company.rejected') }}" class="item-link"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                    <div class="col-4">
                        <i class="la la-ban f-size--56"></i>
                    </div>
                    <div class="col-8 text-end">
                        <span class="text-white text--small">@lang('Total Rejected Companies')</span>
                        <h2 class="text-white">{{$widget['total_rejected_companies']}}</h2>
                    </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
    </div><!-- row end-->


    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="las la-users overlay-icon text--primary"></i>
                <div class="widget-two__icon b-radius--5 bg--primary">
                    <i class="las la-users"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{$widget['total_users']}}</h3>
                    <p>@lang('Total Users')</p>
                </div>
                <a href="{{route('admin.users.all')}}" class="widget-two__btn border border--primary btn-outline--primary">@lang('View All')</a>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="fas fa-user-check overlay-icon text--success"></i>
                <div class="widget-two__icon b-radius--5 bg--success">
                    <i class="las la-user-check"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{$widget['verified_users']}}</h3>
                    <p>@lang('Active Users')</p>
                </div>
                <a href="{{route('admin.users.active')}}" class="widget-two__btn border border--success btn-outline--success">@lang('View All')</a>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="las la-envelope overlay-icon text--danger"></i>
                <div class="widget-two__icon b-radius--5 bg--danger">
                    <i class="las la-envelope"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{$widget['email_unverified_users']}}</h3>
                    <p>@lang('Email Unvarified Users')</p>
                </div>
                <a href="{{route('admin.users.email.unverified')}}" class="widget-two__btn border border--danger btn-outline--danger">@lang('View All')</a>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="las fa-comment-slash overlay-icon text--red"></i>
                <div class="widget-two__icon b-radius--5 bg--red">
                    <i class="las la-comment-slash"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{$widget['mobile_unverified_users']}}</h3>
                    <p>@lang('Email Unvarified Users')</p>
                </div>
                
                <a href="{{route('admin.users.mobile.unverified')}}" class="widget-two__btn border border--danger btn-outline--danger">@lang('View All')</a>
            </div>
        </div><!-- dashboard-w1 end -->
    </div><!-- row end-->
   

    <div class="row mb-none-30 mt-5">
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Browser') (@lang('Last 30 days'))</h5>
                    <canvas id="userBrowserChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By OS') (@lang('Last 30 days'))</h5>
                    <canvas id="userOsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Login By Country') (@lang('Last 30 days'))</h5>
                    <canvas id="userCountryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script src="{{asset('assets/admin/js/vendor/chart.js.2.8.0.js')}}"></script>

    <script>
        "use strict";

        // Donut browser chart
        var ctx = document.getElementById('userBrowserChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_browser_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_browser_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                maintainAspectRatio: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });


        // Donut OS browser chart
        var ctx = document.getElementById('userOsChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_os_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_os_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.05)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            },
        });


        // Donut Country chart
        var ctx = document.getElementById('userCountryChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_country_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_country_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });


    </script>
@endpush
