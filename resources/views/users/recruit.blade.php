@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['title' => "採用情報", 'urlBg' => "/bg_2.jpeg"])
@endsection
@section('content')
    <div>
        @if (!empty($recruiments))
            @foreach ($recruiments as $item)
                <div class="row">
                    <div class="col-md-12 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch d-md-flex">
                            <a href="#" class="block-20" style="background-image: url('{{asset("/images/bg_1.jpg")}}');">
                            </a>
                            <h3 class="heading"><a href="#">{{ $item->name }}</a></h3>
                            <p>{{ $item->description }}</p>
                            <p><a href="#" class="btn btn-primary py-2 px-3">もっと見る</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="productList-pagination row mt-3 mb-5">
        <div class="col">
            <div class="block-27 text-center">
                {{ $recruiments->links() }}
            </div>
        </div>
    </div>
@endsection
