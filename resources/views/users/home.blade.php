@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['urlBg' => "/bg_1.jpg"])
@endsection
@section('content')
<style>
    .d-none {
        display: none;
    }

    .d-active {
        display: block;
    }
</style>
<section class="ftco-section">
    @include('users.layout.slider')
    <div class="container mt-5" id="homeRef">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <ul class="product-category">
                    @foreach ($categories as $item)
                        <li><a href="" data-id="{{ $item->id }}" class="category {{ $item->id === 1 ? 'active' : ''}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section">
                @foreach($categories as $item)
                <h3 class="mb-4 {{ $item->id != 1 ? 'd-none' : 'd-active'}}" id="category-title-{{$item->id}}" style="text-align: center;">{{$item->name}}</h3>
                <div class="{{ $item->id != 1 ? 'd-none' : 'd-active'}}" id="description-{{ $item->id }}">{{$item->description}}</div>
                @endforeach
            </div>
        </div>
        <div id="list-productItems">
            @include('users.listProducts', ['productList' => $products])
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function (){
        $(".category").on('click', function(event) {
            event.preventDefault();
            $('.category').removeClass("active");
            var id = $(this).data('id');

            $('h3.d-active').removeClass('d-active').addClass('d-none');
            $('div.d-active').removeClass('d-active').addClass('d-none');

            $(`#category-title-${id}`).removeClass('d-none').addClass('d-active');
            $(`#description-${id}`).removeClass('d-none').addClass('d-active');

            $(this).addClass("active");
            $.ajax({
                url: "{{ route('user.home') }}" + '/' + id,
                method: "GET",
                success: function(data) {
                    $('#list-productItems').html(data);
                },
            });
        });
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var link = $(this).attr('href').split("/")[4];
            var categoryId = 1;
            var page;
            if (link && link.includes('?')) {
                categoryId = link.split("?", 1);
                page = link.split("?page=")[1];
            } else {
                page = $(this).attr('href').split("?page=")[1];
            }

            getMoreProduct(categoryId, page);
            $('html,body').animate({
              scrollTop: $('#homeRef').offset().top
            }, 500);
        });

        function getMoreProduct(categoryId = 1, page){
            $.ajax({
                url: "home/"+ categoryId + "?page=" + page,
                method: "GET",
                success: function(data) {
                    $('#list-productItems').html(data);
                },
            });
        }
    });
</script>
@endsection
