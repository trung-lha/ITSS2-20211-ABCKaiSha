@extends('users.layout.index')
@section('content')
    @include('users.layout.slider')
    <div class="row mt-4 mb-2">
        <div class="col">
            <ul class="nav nav-tabs home-tabs">
                <li class=home-tabs-empty></li>
                <li class="nav-item home-tabs-item">
                    <a class="nav-link active group" data-id="0" id="all-product">すべて</a>
                </li>
                @foreach ($categories as $item)
                    <li class="nav-item home-tabs-item item">
                        <a class="nav-link group " data-id="{{ $item->id }}">{{$item->name}}</a>
                    </li>
                @endforeach
                <li class=home-tabs-empty></li>
            </ul>
        </div>
    </div>
    <div class="row text-center">
        <div class="col" id="list-productItems">
            @include('users.listProducts', ['productList' => $products])
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function (){
        $.ajax({
            url: '/home/'+0,
            method: "GET",
            success: function(data) {
                $('#list-productItems').html(data);
            },
        });
        $(".group").on('click', function() {
            $('.group').removeClass("active");
            var id = $(this).data('id');
            $(this).addClass("active");
            $.ajax({
                url: '/home/'+id,
                method: "GET",
                success: function(data) {
                    $('#list-productItems').html(data);
                },
            });
        });
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var link = $(this).attr('href').split("/")[4];
            var categoryId = link.split("?", 1);
            var page = link.split("?page=")[1];
            // alert(categoryId, page);
            getMoreProduct(categoryId, page);
        });

        function getMoreProduct(categoryId, page){
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
