@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['title' => "採用情報", 'urlBg' => "/bg_2.jpeg"])
@endsection
@section('content')
<style>
    .register{
        width: 10%;
    }
    </style>
    <div style="text-align: center;font-size: 50px;margin-top: 20px;" >
        @if(!empty($recruit))
            {{ $recruit->name }}
        @endif
    </div>
    <section class="ftco-section ftco-degree-bg" style = 'text-align: center; margin-top: -50px'>
        <div class="container" style = "border-style: solid; padding: 20px">
        @if(!empty($recruit))
            <div class="detail container mt-5">
                <div class="meta mb-3">
                        <span>
                        <i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;{{ $recruit->location }}
                        </span>
                        <span class="ml-5">
                            <i class="fa-solid fa-dollar-sign"></i>&nbsp;&nbsp;{{ $recruit->salary }}&nbsp;万円
                        </span>
                        <span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp; <?php
                                    $date = new DateTime($recruit->limitation);
                                    echo $date->format("Y/m/d");
                                ?>
                        </span>
                </div>

                    <div class="image">
                        <a href="" class="image-popup"><img src="{{ $recruit->img }}"  class="img-fluid" style="height: 200px; width: 200px"></a>
                    </div>

                <div class="row other">
                    <div class="col-12">
                        <div class="row"><div class="col-12 title mb-3 mt-3 text-bold">{{$recruit->description}}</div></div>
                    </div>
                </div>
                <div>
                    <a href=" {{route('recruitment.register', $recruit->id)}}" class="btn btn-success btn-sm register"　style = "width: 20%">登録</a>
                </div>
            </div>
        @endif
        </div>
    </section>
@endsection
