@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('S.N.')</th>
                                    <th>@lang('User') </th>
                                    <th>@lang('Email-URL')</th>

                                    <th>@lang('Category')</th>
                                    @if (request()->routeIs('admin.company.index'))
                                        <th>@lang('Status')</th>
                                    @endif
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companies as $company)
                                    <tr>
                                        <td>{{ $companies->firstItem() + $loop->index }}</td>
                                        <td>
                                            <span class="fw-bold">
                                                    {{ __($company->name) }}
                                            </span>
                                            <br>
                                            <a href="{{ route('admin.users.detail', $company->user_id) }}">
                                                <span>@<span>{{ $company->user->username }}</span></span>
                                            </a>
                                        </td>

                                        <td>
                                            {{ $company->email }}
                                            <br />
                                            <a target="__blank" href="{{ $company->url }}">{{ $company->url }}</a>
                                        </td>
                                        <td>
                                            {{ __($company->category->name) }}
                                        </td>

                                        @if (request()->routeIs('admin.company.index'))
                                            <td>
                                                @php echo $company->statusBadge @endphp
                                            </td>
                                        @endif

                                        <td>
                                            <a href="{{ route('admin.company.details', $company->id) }}"
                                                class="btn btn-sm btn-outline--primary">
                                                <i class="la la-desktop"></i>@lang('Details')
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table><!-- table end -->
                    </div>
                </div>

                @if ($companies->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($companies) }}
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-search-form />
@endpush
