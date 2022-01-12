@extends('users.layout.index')
@section('header')
@include('users.layout.header', ['title' => "採用情報", 'urlBg' => "/bg_2.jpeg"])
@endsection
@section('content')
<style>
    .register {
        width: 20%;
    }
</style>
<div style="text-align: center;font-size: 50px;margin-top: 20px;">
    @if(!empty($recruit))
    {{ $recruit->name }}
    @endif
</div>
<div class="container">
<section class="ftco-section ftco-degree-bg" style='text-align: center; margin-top: -50px'>
    <div class="container" style="border-style: solid; padding: 20px">
        @if(!empty($recruit))
        <div class="detail container mt-5">
            <div class="" style="margin-top: -30px; margin-bottom: 50px">
                <span>
                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;{{ $location }}
                </span>
                <span class="ml-5">
                    <i class="fa-solid fa-dollar-sign"></i>&nbsp;&nbsp;{{ $salary }}&nbsp;万円&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                <span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp; {{ $create_at }}
                </span>
            </div>
            <div class="" style="border-style: solid; width: 60%; padding: 20px; margin-left: 20%;padding-left: 80px;padding-right: 80px;">
                <h1>登録</h1>
                <p class="text-left" style="display: block; color: red; font-size: 0.8rem;">＊は必須項目です。</p>
                <form action="{{ route('admin.candidate.store') }}" class="info" id="my-form" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="hidden" name="recrname", value="{{$name}}">
                    <div class="form-group">
                        <label for="" style="float: left">名前 <span style="color: red">*</span></label>
                        <input type="text" class="form-control text-left px-3" placeholder="" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" style="float: left">メールアドレス <span style="color: red">*</span></label>
                        <input type="email" class="form-control text-left px-3" placeholder="" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" style="float: left">電話番号 <span style="color: red">*</span></label>
                        <input type="text" class="form-control text-left px-3" placeholder="" name="phone" required>
                        @if($errors->has('phone'))
                            <div class="error" style="color: red; font-size: 15px; float:left">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label style="float: left">年齢 <span style="color: red">*</span></label>
                        <input type="text" class="form-control text-left px-3" placeholder="" name="age" required>
                    </div>
                    <div class="form-group">
                        <label style="float: left">出身 <span style="color: red">*</span></label>
                        <input type="text" class="form-control text-left px-3" placeholder="" name="address" required>
                    </div>
                    <div class="form-group">
                        <label style="float: left">実務経験 <span style="color: red">*</span></label>
                        <textarea class="form-control text-left px-3" style="height: 150px" name="exp" placeholder="グラブフードの荷送人の経営に1年の経験があり&#10;バイクの免許を持っている" required></textarea>
                    </div>
                    <div>
                        <button class="btn btn-success register" type="submit" id="form-submit">登録</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</section>
</div>
<script type="text/javascript">
    $('#form-submit').on('click', function(event) {
        dataForm = $('form').serializeArray();
        check = 1;
        dataForm.forEach((element, index) => {
            if (element.value == "") {
                check = 0;
            }
        });
        if (check == 1) {
            $('#my-form').submit();
        }
    });
</script>
@endsection
