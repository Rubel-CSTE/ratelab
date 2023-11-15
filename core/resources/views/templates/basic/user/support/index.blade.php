@extends($activeTemplate . 'layouts.auth')
@section('content')
    <section class="pt-20 pb-20 contact-section overflow-hidden">
        <div class="shape-one"></div>
        <div class="shape-two"></div>
        <div class="shape-three"></div>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-12">
                    <div class="custom--card">
                        <div class="table-responsive border rounded-top">
                            <table class="table custom--table">
                                <thead>
                                    <tr>
                                        <th>@lang('Subject')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Priority')</th>
                                        <th>@lang('Last Reply')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($supports as $support)
                                        <tr>
                                            <td> <a href="{{ route('ticket.view', $support->ticket) }}" class="fw-bold">
                                                    [@lang('Ticket')#{{ $support->ticket }}] {{ __($support->subject) }}
                                                </a></td>
                                            <td>
                                                @php echo $support->statusBadge; @endphp
                                            </td>
                                            <td>
                                                @if ($support->priority == Status::PRIORITY_LOW)
                                                    <span class="badge badge--dark">@lang('Low')</span>
                                                @elseif($support->priority == Status::PRIORITY_MEDIUM)
                                                    <span class="badge  badge--warning">@lang('Medium')</span>
                                                @elseif($support->priority == Status::PRIORITY_HIGH)
                                                    <span class="badge badge--danger">@lang('High')</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }} </td>

                                            <td>
                                                <a href="{{ route('ticket.view', $support->ticket) }}"
                                                    class="btn--base btn-sm">
                                                    <i class="fa fa-desktop"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($supports->hasPages())
                            {{ paginateLinks($supports) }}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
