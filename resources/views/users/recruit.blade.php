@extends('users.layout.index')
@section('header')
@include('users.layout.header', ['title' => "採用情報", 'urlBg' => "/bg_2.jpeg"])
@endsection
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@section('content')
<div class="container">
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        @if (!empty($recruiments))
        @foreach ($recruiments as $key => $item)
        <div class="row mb-4" style="border-radius: 20px; border: lightgray solid 2px; padding-top: 40px">
            <div class="col-md-12">
                <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="" class=""><img src="{{ $item->img }}" alt="re1" style="height: 200px; width: 200px"></a>
                    <div class="text d-block pl-md-4">
                        <div class="row mb-5">
                            <div class="col-12">
                                <h3 class="heading"><b><a href=" {{route('recruitment.detail', $item->id)}} ">{{$item->name}}</a></b></h3>
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;{{ $item->location }}
                            </div>
                            <div class="col-3">
                                <i class="fa-solid fa-dollar-sign"></i>&nbsp;&nbsp;{{ $item->salary }}&nbsp;万円
                            </div>

                            <div class="col-4">
                                <i class="fa-solid fa-calendar-days"></i>
                                &nbsp;
                                <?php
                                    $date = new DateTime($item->limitation);
                                    echo $date->format("Y/m/d");
                                ?>
                            </div>
                            <div class="col-2">
                                <a href=" {{route('recruitment.detail', $item->id)}} " class="btn btn-success btn-sm" style="float: right">もっと見る</a>
                            </div>
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
</div>
@endsection
