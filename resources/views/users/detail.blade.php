@extends('users.layout.index')
@section('content')
@include('users.layout.slider')

@if(!empty($product))
<div class="product-detail">
    <div class="card">
        <div class="card-body">
            <div class="row info">
                <div class="col-4 product-image">
                    <img src="{{asset('/storage/images/'.$urlImage)}}" alt="{{$product['name']}}" />
                </div>
                <div class="col-8 product-description">
                    <h4>{{$product["name"]}}</h4>
                    <p>{{$product["description"]}}</p>
                </div>
            </div>
            <div class="row other">
                <div class="col-12">
                    <div class="row"><div class="col-12 title mb-2">商品イメージ</div></div>
                    <div class="row">
                        <div class="col-12 image-list">
                            <img src="{{asset('/images/default.jpeg')}}" alt="default-image" />
                            <img src="{{asset('/images/default.jpeg')}}" alt="default-image" />
                            <img src="{{asset('/images/default.jpeg')}}" alt="default-image" />
                            <img src="{{asset('/images/default.jpeg')}}" alt="default-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
