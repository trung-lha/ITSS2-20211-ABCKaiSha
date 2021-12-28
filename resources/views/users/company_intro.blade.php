@extends('users.layout.index')
@section('header')
    @include('users.layout.header', ['title' => "会社概要", 'urlBg' => "/intro.jpeg"])
@endsection

@section('content')
<div class="container">
  <div class="col-10 offset-1">
    <div class="row mt-5 text-center" style="border: solid 1px black; border-radius: 10px; background-color: rgb(243, 241, 241)">
      <div class="col-4">
        <img src="{{ asset('images/kaisha2.jpeg') }}" alt="kaisha" style="object-fit: cover; height: 400px; width: 300px; border-radius: 10px; margin-left: -5.5%">
      </div>
      <div class="col-8 mt-3">
            <form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">会社称号</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="なにねねの会社">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">所存地</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="〒141−0031東京都">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">設立</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="2016年11月28日">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">資本金</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="344億3,372万円（2020年12月31日現在）">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">代表者</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="代表取締役 社長執行役員　掬川 正純">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">従業員数</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="連結：7,452名　個別：3,119名（2020年12月31日現在）">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">売上</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="" placeholder="連結：3,553億円［IFRS］　個別：2,819億円 （2020年12月期）">
                  </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5 mb-5" style="padding: 30px; padding-top: 10px;border: solid 1px black; border-radius: 10px; background-color: rgb(243, 241, 241)">
      <div class="">
          <label style="margin-left: 210px">弘前支店</label><br></br>
          <div>〒036-0233</div>
          <div>青森県平川市日沼富田19-7</div>
          <div>TEL 0172-57-5555</div>
          <div>FAX 0172-57-5577</div>
          <br>
          <div>ＪＲ弘前駅より車で15分。</div>
          <div>東北自動車道黒石ＩＣより弘前方面へ車で15分。</div>
          </div>
      </div>
  </div>
  </div>
</div>

@endsection
