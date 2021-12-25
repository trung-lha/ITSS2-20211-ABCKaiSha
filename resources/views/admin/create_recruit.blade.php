@section('title', '採用情報を新規追加')
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
                    <h3 class=" mt-2 text-center">採用情報を新規追加</h3>
                </div>
                <div class="card-body">
                    <form class="container" id="form_create" action="{{route('recruit.store')}}" method="post" enctype="multipart/form-data">
                    <p class="text-left" style="display: block; color: red; font-size: 0.8rem;">＊は必須項目です。</p>
                        @csrf
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
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">給料 <span style="color: red">*</span></label>
                            <p><small>(単位：万円)</small></p>
                            <input type="number" name="salary" class="form-control" id="exampleFormControlInput1" required value="{{old('salary')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">場所 <span style="color: red">*</span></label>
                            <input type="text" name="location" class="form-control" id="exampleFormControlInput1" required value="{{old('location')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">採用開始日 <span style="color: red">*</span></label>
                            <input type="date" name="limitation" class="form-control" id="exampleFormControlInput1" required value="{{old('limitation')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">イメージ <span style="color: red">*</span></label>
                            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1" required accept="image/png, image/jpeg">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">要約情報 <span style="color: red">*</span></label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required>{{old('description')}}</textarea>
                        </div>
                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-primary" onclick="onSubmitForm()">追加</button>
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
        function onSubmitForm() {
            var form = document.getElementById('form_create');
            form.submit();
        }
    </script>
@endsection