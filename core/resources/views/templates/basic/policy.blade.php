@extends($activeTemplate.'layouts.frontend')
@section('content')
    <section class="pt-100 pb-100 contact-section overflow-hidden">
        <div class="shape-one"></div>
        <div class="shape-two"></div>
        <div class="shape-three"></div>
        <div class="container">
            <div class="row gy-5 gy-lg-0">
                <div class="col-lg-12">
                    <div class="row gy-4 justify-content-center">
                        <div class="custom-card">
                            <p>
                                @php echo $policy->data_values->details @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection