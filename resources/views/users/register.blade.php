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
       配送ドライバー
    </div> 
    <section class="ftco-section ftco-degree-bg" style = 'text-align: center; margin-top: -50px'>
        <div class="container" style = "border-style: solid; padding: 20px">
        @if(!empty($recruit))
            <div class="detail container mt-5">
                <div class="" style="margin-top: -30px; margin-bottom: 50px">
                        <span>
                            <i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp; {{ $create_at }}&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                        <span>
                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;{{ $location }}
                        </span>
                        <span class="ml-5">
                            <i class="fa-solid fa-dollar-sign"></i>&nbsp;&nbsp;{{ $salary }}&nbsp;万円
                        </span>
                </div>
                <div class="" style="border-style: solid; width: 60%; padding: 20px; margin-left: 20%;padding-left: 80px;padding-right: 80px;">
    					<h1>登録</h1>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="" style="float: left">名前</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label style="float: left">生年</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label style="float: left">出身</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label style="float: left">実務経験</label>
                            <textarea  class="form-control text-left px-3" placeholder="" style="height: 150px"></textarea>
                        </div>
                    </form>
                </div>
                <div style = "padding: 20px;">
                    <a href="" class="btn btn-success btn-sm register"　style = "width: 10%; padding: 20px">登録</a>
                </div>                
            </div>
        @endif
        </div>
    </section>
@endsection
