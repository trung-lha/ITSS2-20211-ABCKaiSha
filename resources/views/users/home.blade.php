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
    color: black !important;
    font-size: 14px;
    border-radius: 0px;
    -webkit-box-shadow: none !important;
    box-shadow: none !important; }
    .billing-form .form-control:focus, .billing-form .form-control:active {
        border-color: #82ae46 !important; }
</style>
<div class="container">
<section class="col-10 offset-1 ftco-section">
    <!-- <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-12 heading-section ftco-animate text-center">
        <h2 class="mb-4">自然・環境を守り、安心・安全な食べものをお届け</h2>
        </div>
    </div> -->
    @include('users.layout.slider')
    <div class="mt-5" id="homeRef">
        <form action="#" class="billing-form">
            <div class="d-flex mb-3 align-items-baseline">
                <label class="mr-5"><span><i class="fas fa-filter" style="color: gray"></i></span> フィルター: </label>
                <div class="form-group mr-3" style="width: 120px">
                    <div class="select-wrap">
                        <div class="icon"><span class="fas fa-angle-down"></span></div>
                        <select name="" id="category-selection" class="form-control">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section">
                @foreach($categories as $item)
                <h3 class="{{ $item->id != 1 ? 'd-none' : 'd-active'}}" id="category-title-{{$item->id}}" style="text-align: center;">{{$item->name}}</h3>
                <div class="{{ $item->id != 1 ? 'd-none' : 'd-active'}}" id="description-{{ $item->id }}">{{$item->description}}</div>
                @endforeach
            </div>
        </div>
        <div id="list-productItems">
            @include('users.listProducts', ['productList' => $products])
        </div>
    </div>
</section>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#category-selection').change(function (e) {
            const id = $(this).val();
            const month = $('#month-selection').val();

            $('h3.d-active').removeClass('d-active').addClass('d-none');
            $('div.d-active').removeClass('d-active').addClass('d-none');

            $(`#category-title-${id}`).removeClass('d-none').addClass('d-active');
            $(`#description-${id}`).removeClass('d-none').addClass('d-active');

            $.ajax({
                url: "{{ route('user.home') }}" + '/' + id + '/' + parseInt(month),
                method: "GET",
                success: function(data) {
                    $('#list-productItems').html(data);
                },
            });
        });
        $('#month-selection').change(function (e) {
            const categoryId = $('#category-selection').val()
            $.ajax({
                url: "home/"+ categoryId + `/${$(this).val()}`+ "?page=1",
                method: "GET",
                success: function(data) {
                    $('#list-productItems').html(data);
                },
            });
        });
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var link = $(this).attr('href').split("/")[4];
            const categoryId = $('#category-selection').val()
            const month = $('#month-selection').val();
            var page;
            if (link && link.includes('?')) {
                page = link.split("?page=")[1];
            } else {
                page = $(this).attr('href').split("?page=")[1];
            }

            getMoreProduct(categoryId, month, page);
            $('html,body').animate({
              scrollTop: $('#homeRef').offset().top
            }, 500);
        });

        function getMoreProduct(categoryId = 1, month, page){
            $.ajax({
                url: "home/"+ categoryId + `/${month}` + "?page=" + page,
                method: "GET",
                success: function(data) {
                    $('#list-productItems').html(data);
                },
            });
        }
    });
</script>
@endsection
