@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['title' => "会社概要", 'urlBg' => "/intro.jpeg"])
@endsection

@section('content')
<div class="container">
  <div class="col-10 offset-1">
    <div class="row mt-5 text-center" style="border: solid 1px black; border-radius: 10px; background-color: rgb(243, 241, 241)">
        <div class="col-12 mt-3">
            <form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">会社名</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="なにねねの会社">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">所存地</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="１４１−００３１東京都">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">所存地</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="１４１−００３１東京都">
                  </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5 text-center mb-5" style="border: solid 1px black; border-radius: 10px; background-color: rgb(243, 241, 241)">
      <div class="col-12 mt-3">
          <form>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">会社名</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="" placeholder="なにねねの会社">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">所存地</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="" placeholder="１４１−００３１東京都">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">所存地</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="" placeholder="１４１−００３１東京都">
                </div>
              </div>
          </form>
      </div>
  </div>
  </div>
</div>

@endsection
