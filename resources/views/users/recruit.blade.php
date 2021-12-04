@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['title' => "採用情報", 'urlBg' => "/bg_2.jpeg"])
@endsection
@section('content')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            @if (!empty($recruiments))
                @foreach ($recruiments as $key => $item)
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-entry align-self-stretch d-md-flex">
                            <a href="" class="block-20"><img src="{{ asset("/images/recruit". ($key+1) . ".jpeg") }}" alt="re1" style="height: 200px; width: 200px"></a>
                            <div class="text d-block pl-md-4">
                                <div class="meta mb-3">
                                    <div>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        {{ $item->created_at->isoFormat('dddd D/MM/YYYY') }}
                                    </div>
                                </div>
                                <h3 class="heading"><a href="#">{{$item->name}}</a></h3>
                                <p>{{$item->description}}</p>
                                <div>
                                    <span>
                                        <i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;{{ $item->location }}
                                    </span>
                                    <span class="ml-5">
                                        <i class="fa-solid fa-dollar-sign"></i>&nbsp;&nbsp;{{ $item->salary }}&nbsp;万円
                                    </span>
                                    <span><a href="" class="btn btn-success btn-sm" style="float: right">もっと見る</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>
    <div class="productList-pagination row mt-3 mb-5">
        <div class="col">
            <div class="block-27 text-center">
                {{ $recruiments->links() }}
            </div>
        </div>
    </div>
@endsection
