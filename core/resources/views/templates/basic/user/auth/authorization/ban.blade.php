@extends($activeTemplate .'layouts.frontend')
@section('content')
<section class="pt-100 pb-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="contact-wrapper">
                <div class="card-body">
                    <h4 class="text-center text-danger">@lang('You are banned')</h4>
                    <p class="fw-bold mb-1">@lang('Reason'):</p>
                    <p>{{ $user->ban_reason }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<section/>
@endsection
