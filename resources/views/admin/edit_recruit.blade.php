@section('title', '採用情報編集')
@extends('admin.index')
@section('content')
  <div class="content-wrapper pt-3">
    <section class="content">
      <div class="container">
      <div class="row">
          <div class="col-12 ml-3 mb-5">
            <button type="button" class="btn" style="border: solid 1px black"><a href="{{route('recruit')}}" style="color: black">一覧に戻る</a></button>
          </div>
      </div>
        <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                  <h3 class=" mt-2 text-center">詳細情報</h3>
              </div>
              <div class="card-body">
                <form action="{{route('recruit.update', $recruit->id)}}" method="post" enctype="multipart/form-data">
                    <p class="text-left" style="display: block; color: red; font-size: 0.8rem;">＊は必須項目です。</p>
                    @csrf
                    @method('patch')
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <strong>{{ $message }}</strong>
                      </div>
                      @endif

                      @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
                    <div class="form-group">
                        <label for="exampleFormControlInput1">採用タイトル <span style="color: red">*</span></label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{$recruit->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">給料 <span style="color: red">*</span></label>
                        <p><small>(単位：万円)</small></p>
                        <input type="number" name="salary" step="0.01" class="form-control" id="exampleFormControlInput1" required value="{{$recruit->salary}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">場所 <span style="color: red">*</span></label>
                        <input type="text" name="location" class="form-control" id="exampleFormControlInput1" required value="{{$recruit->location}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">採用開始日 <span style="color: red">*</span></label>
                        <input type="date" name="limitation" class="form-control" id="exampleFormControlInput1" required value="{{explode(' ',$recruit->limitation)[0]}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">イメージ <span style="color: red">*</span></label>
                        <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1" accept="image/png, image/jpeg">
                    </div>
                    <div class="form-group d-flex">
                        <img src="{{$recruit->img}}" alt="{{$recruit->name}}" srcset="" width="50" height="50" class="mr-1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">要約情報 <span style="color: red">*</span></label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required>{{$recruit->description}}</textarea>
                    </div>
                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-primary" onclick="onSubmitForm(`{{$recruit->id}}`)">更新</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-2"></div>
        </div>
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <script type="text/javascript">
      document.getElementById('exampleFormControlTextarea1').value = document.getElementById('exampleFormControlTextarea1').value.trim();
      function onSubmitForm(id) {
          var form = document.getElementById('form_edit');
          form.action = `{{url('/admin/recruit')}}/${id}`;
          form.submit();
      }
  </script>
@endsection