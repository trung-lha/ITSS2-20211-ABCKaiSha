@extends('users.layout.index')
@section('header')
@include('users.layout.header', ['title' => "お問い合わせ", 'urlBg' => "/contact.jpeg"])
@endsection

@section('content')
<div class="container">
  <div class="row mt-5" style="border: solid 1px black; border-radius: 10px">
    <div class="col-12 mt-3">
      <form action="{{route('contact.post')}}" method="POST" id="form_contact">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">お名前 <span style="color: red">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" placeholder="" required name="username" value="{{old('username')}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">メールアドレス <span style="color: red">*</span></label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="" placeholder="" required name="email" value="{{old('email')}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">郵便番号 <span style="color: red">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" placeholder="" required name="postcode" value="{{old('postcode')}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">お電話番号 <span style="color: red">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" placeholder="" required name="phone" value="{{old('phone')}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">お問合せ内容 <span style="color: red">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" placeholder="" required name="content" value="{{old('content')}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">お問合せ本文 <span style="color: red">*</span></label>
          <div class="col-sm-10">
            <textarea type="text" class="form-control" id="" placeholder="" required name="contactbody">{{old('contactbody')}}</textarea>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row mb-5 mt-3">
    <div class="col-12 text-center">
      <button type="submit" class="btn btn-primary" onclick="postsubmit()">送信</button>
    </div>
  </div>
</div>

<script>
  function postsubmit() {
    var form = document.getElementById('form_contact').submit();
  }
</script>

@endsection
