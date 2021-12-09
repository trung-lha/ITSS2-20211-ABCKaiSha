@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['title' => "素早く提供する最高の農作物をあなたへ", 'urlBg' => "/bg_1.jpg"])
@endsection
@section('content')
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
                <h3 class="mb-4" id="category-title">{{$categories[0] -> name}}</h3>
                <div id="description-group">水分が多い草本性で食用となる植物を指す。主に葉や根、茎（地下茎を含む）、花・つぼみ・果実を副食として食べるものをいう</div>
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
            switch (id) {
                case 1:
                    $('#category-title').html('{{$categories[0] -> name}}');
                    $('#description-group').html("水分が多い草本性で食用となる植物を指す。主に葉や根、茎（地下茎を含む）、花・つぼみ・果実を副食として食べるものをいう");
                    break;
                case 2:
                    $('#category-title').html('{{$categories[1] -> name}}');
                    $('#description-group').html("塊茎かいけい 植物の地下茎が枝分れし、その先のほうが著しく肥大して塊状となったもの。 ジャガイモ、キクイモなどのいもの部分がこれにあたる");
                    break;
                case 3:
                    $('#category-title').html('{{$categories[2] -> name}}');
                    $('#description-group').html("飲食物に香気や辛味を添えて風味を増す種子・果実・葉・根・木皮・花など。");
                    break;
                default:
                    $('#category-title').html('{{$categories[0] -> name}}');
                    $('#description-group').html("水分が多い草本性で食用となる植物を指す。主に葉や根、茎（地下茎を含む）、花・つぼみ・果実を副食として食べるものをいう");
                    break;
            }
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
            var categoryId = link.split("?", 1);
            var page = link.split("?page=")[1];
            getMoreProduct(categoryId, page);
            $('html,body').animate({
              scrollTop: $('#homeRef').offset().top
            }, 500);
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
