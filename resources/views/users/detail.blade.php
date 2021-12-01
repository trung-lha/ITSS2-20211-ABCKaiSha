@extends('users.layout.index')
@section('content')
<section class="ftco-section">
    @include('users.layout.slider')
    @if(!empty($product))
    <div class="detail container mt-5">
        <div class="row">
            <div class="col-lg-5 image">
                <a href="{{asset('/storage/images/'.$urlImage)}}" class="image-popup"><img src="{{asset('/storage/images/'.$urlImage)}}" class="img-fluid"></a>
            </div>
            <div class="col-lg-7 product-details pl-md-5">
                <h3>{{$product["name"]}}</h3>
                <p style="white-space: pre-wrap;text-align: justify;margin-top: 10px">{{$product["description"]}}</p>
            </div>
        </div>
        <div class="row other">
            <div class="col-12">
                <div class="row"><div class="col-12 title mb-3 mt-3 text-bold">商品イメージ</div></div>
                <div class="row">
                    @if(empty($images) == false)
                        @foreach($images as $image)
                        <div class="col-md-6 col-lg-3" style="padding: 0 2rem 0 0;">
                            <div class="product" style="">
                                <a href="{{asset('/storage/images/'.$image->url)}}" class="img-prod image-popup">
                                    <img class="img-fluid" src="{{asset('/storage/images/'.$image->url)}}" alt="{{$product->name}}"
                                    style="height: 150px; width: 100%; object-fit: cover;">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
