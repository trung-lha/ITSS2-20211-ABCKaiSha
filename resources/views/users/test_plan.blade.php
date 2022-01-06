<style>
  #form_contact .form-control {
    border-radius: 0;
  }

  #form_contact .btn {
    cursor: pointer;
    color: #fff;
    font-size: 1.2rem;
    padding: 10px 40px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    -ms-border-radius: 30px;
    border-radius: 30px;
    -webkit-box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09);
    -moz-box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09);
    box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09);
  }

  #form_contact .btn:hover,
  .btn:active,
  .btn:focus {
    outline: none;
  }

  #form_contact .btn.btn-primary {
    background: #82ae46;
    border: 1px solid #82ae46;
    color: #fff;
  }

  #form_contact .btn.btn-primary:hover {
    border: 1px solid #82ae46;
    background: transparent;
    color: #82ae46;
  }

  #form_contact .btn.btn-primary.btn-outline-primary {
    border: 1px solid #82ae46;
    background: transparent;
    color: #82ae46;
  }

  #form_contact .btn.btn-primary.btn-outline-primary:hover {
    border: 1px solid transparent;
    background: #82ae46;
    color: #fff;
  }
</style>

@extends('users.layout.index')
@section('header')
@include('users.layout.header', ['title' => "無料お試しプラン登録", 'urlBg' => "/about.jpg"])
@endsection

@section('content')
<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center">
        <h2 class="mb-4">無料お試しプラン登録</h2>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 mt-3">
          <form action="{{route('plan.store')}}" method="POST" id="form_contact" class="bg-white p-5">
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
              <label for="address" class="col-sm-2 col-form-label">ご住所 <span style="color: red">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="address" placeholder="" required name="address" value="{{old('address')}}">
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
                <textarea class="form-control" rows="5" id="" placeholder="" required name="content" value="{{old('content')}}"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">プラン <span style="color: red">*</span></label>
              <div class="col-sm-10">
                <select id="plan-choices" name="plan-choices[]" multiple required>
                  @foreach($products as $product)
                  <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row"><label class="col-sm-12 col-form-label"><span style="color: red">*最大3つのプランを選択できる</span></label></div>
            <div class="form-group row">
              <div class="col-sm-12 text-center">
                <button type="button" class="btn btn-primary" onclick="postsubmit()">送信</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>
<script>
  function postsubmit() {
    if ($('#plan-choices').val().length > 3 || $('#plan-choices').val().length < 1) {
      return alert('最大3つのプランを選択してください');
    } else {
      var form = document.getElementById('form_contact').submit();
    }
  }
  $(function() {
    $('#plan-choices').multiSelect();
  });
</script>

@endsection