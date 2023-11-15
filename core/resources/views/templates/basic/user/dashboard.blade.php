@extends($activeTemplate.'layouts.auth')
@section('content')
    <!-- review blade -->
    @include($activeTemplate.'partials.reviews')

@endsection

@push('script')
    <script>
        "use strict";
        $(document).ready(function() {
            //update review
            $('.edit-review').on('click', function() {
                var result = $(this).data('resource');

                $('.edit-id').val(result.id);
                $('.edit-review').val(result.review);
                $('.view-company').text(result.company.name);
                $('.view-image').attr('src', $(this).data('img'));

                $('#reviewUpdateModal').find('input[name=rating]').parent('span').removeClass('checked');
                var existRating = result.rating;
                if (existRating == 5) {
                    $('#existed-rating-1').addClass('checked');
                } else if (existRating == 4) {
                    $('#existed-rating-2').addClass('checked');
                } else if (existRating == 3) {
                    $('#existed-rating-3').addClass('checked');
                } else if (existRating == 2) {
                    $('#existed-rating-4').addClass('checked');
                } else {
                    $('#existed-rating-5').addClass('checked');
                }
            });

            //delete review
            $('.delete-review').on('click', function() {
                $('.delete-id').val($(this).data('id'));
            });

            // Check Radio-box
            $(".give-rating input:radio").attr("checked", false);

            $(".give-rating input").click(function(e) {
                $(this).parent().siblings().removeClass("checked");
                $(this)
                    .parent()
                    .addClass("checked");
            });

            // Check Radio-box
            $(".give-rating input:radio").attr("checked", false);

            $(".give-rating input").click(function(e) {
                $(this).parent().siblings().removeClass("checked");
                $(this)
                    .parent()
                    .addClass("checked");
            });
        });
    </script>
@endpush
