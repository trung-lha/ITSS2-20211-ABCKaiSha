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

    .billing-form .form-group {
    position: relative; }

    .billing-form label {
    color: #000000;
    font-size: 14px; }

    .billing-form .icon {
    position: absolute;
    top: 50% !important;
    right: 15px;
    font-size: 14px;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%); }
    .billing-form .icon span {
        color: black !important; }

    .billing-form .select-wrap, .billing-form .input-wrap {
    position: relative; }
    .billing-form .select-wrap select, .billing-form .input-wrap select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none; }
        
    .billing-form .form-control {
    font-weight: 300;
    border: transparent !important;
    border: 1px solid rgba(0, 0, 0, 0.1) !important;
    height: 2.5rem !important;
    padding-left: 15px;
    padding-right: 15px;
    background: transparent !important;
    color: rgba(0, 0, 0, 0.4) !important;
    font-size: 14px;
    border-radius: 0px;
    -webkit-box-shadow: none !important;
    box-shadow: none !important; }
    .billing-form .form-control::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: rgba(0, 0, 0, 0.4); }
    .billing-form .form-control::-moz-placeholder {
        /* Firefox 19+ */
        color: rgba(0, 0, 0, 0.4); }
    .billing-form .form-control:-ms-input-placeholder {
        /* IE 10+ */
        color: rgba(0, 0, 0, 0.4); }
    .billing-form .form-control:-moz-placeholder {
        /* Firefox 18- */
        color: rgba(0, 0, 0, 0.4); }
    .billing-form .form-control:focus, .billing-form .form-control:active {
        border-color: #82ae46 !important; }

    .slider-text .btn {
        cursor: pointer;
        color: #fff;
        font-size: 1.5rem;
        padding: 20px 50px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        -ms-border-radius: 30px;
        border-radius: 40px;
        -webkit-box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09);
        -moz-box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09);
        box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09); }
        .slider-text .btn:hover, .btn:active, .btn:focus {
            outline: none; }
        .slider-text .btn.btn-primary {
            background: #82ae46 !important;
            opacity: 0.9;
            border: 1px solid #82ae46; }
        .slider-text .btn.btn-primary:hover {
            border: 1px solid #82ae46;
            opacity: 0.6; }
        .slider-text .btn.btn-primary:active {
            border: 1px solid #82ae46;
            opacity: 0.6; }
        .slider-text .btn.btn-primary.btn-outline-primary {
            border: 1px solid #82ae46;
            color: #82ae46; }
        .slider-text .btn.btn-primary.btn-outline-primary:hover {
            border: 1px solid transparent;
            color: #fff; }
</style>
<section class="ftco-section">
    @include('users.layout.slider')
    <div class="container mt-5" id="homeRef">
        <div class="row justify-content-center mb-3">
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
                <h3 class="{{ $item->id != 1 ? 'd-none' : 'd-active'}}" id="category-title-{{$item->id}}" style="text-align: center;">{{$item->name}}</h3>
                <div class="{{ $item->id != 1 ? 'd-none' : 'd-active'}}" id="description-{{ $item->id }}">{{$item->description}}</div>
                @endforeach
            </div>
        </div>
        <form action="#" class="billing-form">
            <div class="d-flex justify-content-center mb-3 align-items-baseline">
                <label for="month" class="mr-3">フィルター: </label>
                <div class="form-group" style="width: 120px">
                    <div class="select-wrap">
                        <div class="icon"><span class="fas fa-angle-down"></span></div>
                        <select name="" id="month-selection" class="form-control">
                            @for ($i = 1; $i <=12; $i++)
                                <option value="{{ $i }}">{{ $months[$i-1] }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </form>
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
        $('#month-selection').change(function (e) {
            // TODO: Add them params month
            alert($(this).val())
            $.ajax({
                url: "home/"+ categoryId + "?page=1",
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
