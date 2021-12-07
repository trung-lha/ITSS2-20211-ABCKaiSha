@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['title' => "採用情報", 'urlBg' => "/bg_2.jpeg"])
@endsection
@section('content')
<style>
    .register{
        width: 20%;
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
                    <form action="{{ route('user.register') }}" class="info" id="my-form">
                        <div class="form-group">
                            <label for="" style="float: left">名前</label>
                            <input type="text" class="form-control text-left px-3" placeholder="" name="name" required>
                        </div>
                        <div class="form-group">
                            <label style="float: left">生年</label>
                            <input type="text" class="form-control text-left px-3" placeholder="" name="age" required>
                        </div>
                        <div class="form-group">
                            <label style="float: left">出身</label>
                            <input type="text" class="form-control text-left px-3" placeholder="" name="address" required>
                        </div>
                        <div class="form-group">
                            <label style="float: left">実務経験</label>
                            <textarea  class="form-control text-left px-3" placeholder="" style="height: 150px" name="exp" required></textarea>
                        </div>
                        <div>
                            <button class="btn btn-success register"　type="submit" id="form-submit">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        </div>
    </section>

<script type="text/javascript">
    $('#form-submit').on('click', function(event){
        // event.preventDefault();
        dataForm = $('form').serializeArray();
        check = 1;
        dataForm.forEach((element, index) => {
            if (element.value == "") {
                check =0;
            }
        });
        // console.log(dataForm[1]);
        if (check == 1) {
            event.preventDefault();
            Swal.fire({
                title: 'ありがとうございます',
                text: "登録フォームが保存しました",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '採用情報ページへいきます',
                cancelButtonText: 'キャンセル'
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#my-form').submit();
                }
            })

        }
    });
</script>
@endsection
