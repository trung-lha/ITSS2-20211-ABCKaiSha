@extends('users.layout.index')
@section('content')
<section class="ftco-section">
    @include('users.layout.slider')
    <div class="container mt-5" id="homeRef">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    @foreach ($categories as $item)
                        <li><a href="" data-id="{{ $item->id }}" class="category {{ $item->id === 1 ? 'active' : ''}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="list-productItems">
            @include('users.listProducts', ['productList' => $products])
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function (){
        $.ajax({
            url: '/user/home/'+4,
            method: "GET",
            success: function(data) {
                $('#list-productItems').html(data);
            },
        });
        $(".category").on('click', function() {
            $('.category').removeClass("active");
            var id = $(this).data('id');
            $(this).addClass("active");
            $.ajax({
                url: '/user/home/'+id,
                method: "GET",
                success: function(data) {
                    $('#list-productItems').html(data);
                },
            });
        });
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var link = $(this).attr('href').split("/")[5];
            var categoryId = link.split("?", 1);
            var page = link.split("?page=")[1];
            // alert(categoryId, page);
            getMoreProduct(categoryId, page);
            // TODO: Scroll to #homeRef
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
