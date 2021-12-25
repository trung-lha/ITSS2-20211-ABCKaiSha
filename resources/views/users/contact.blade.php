@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['title' => "", 'urlBg' => "/contact.jpeg"])
@endsection

@section('content')
<div class="container">
    <div class="row mt-5" style="border: solid 1px black; border-radius: 10px">
        <div class="col-12 mt-3">
            <form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">お名前</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">メールアドレス</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">郵便番号</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">お電話番号</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">お問合せ内容</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">お問合せ本文</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="" placeholder=""></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-5 mt-3">
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">送信</button>
      </div>
    </div>
</div>

@endsection
