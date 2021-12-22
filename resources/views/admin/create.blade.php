@section('title', 'Create Product')
@extends('admin.index')
@section('content')
<style>
    .mt-4{
    display: grid;
    justify-content: center;
    background-color: #ebe1e1;
    padding: 20px;
    }
  </style>
   <h2 class="card-title text-center mb-2"　 style="padding-bottom: 40px; padding-top: 10px; font-size: x-large"><b>新製品追加</b></h2>
    <!-- <p style="font-size: x-large; font-weight: 500; margin-right: 10%;">連絡線</p> -->
    <!-- <h5 class="card-title text-center mb-2"　 style="padding-bottom: 20px;font-size: larger; font-weight: 480; text-align: center">以下のフォームに製品情報を入力してください</h5> -->
<div class="card ">
    <div class="card-body">
        <p class="text-left" style="display: block; color: red; font-size: 0.8rem;">＊は必須項目です。</p>
        <form class="container" id="form_create" enctype="multipart/form-data" method="POST" action="{{route('admin.store')}}">
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
                <label for="exampleFormControlInput1">製品名 <span style="color: red">*</span></label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{old('name')}}">
            </div>
            @if (empty($categories) == false)
            <div class="form-group">
                <label for="exampleFormControlSelect1">カテゴリ <span style="color: red">*</span></label>
                <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{(old('category_id') == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                <label for="exampleFormControlSelect2">イメージ <span style="color: red">*</span></label>
                <input type="file" name="images[]" class="form-control-file" id="exampleFormControlFile1" multiple required accept="image/png, image/jpeg">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">説明 <span style="color: red">*</span></label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required>{{old('description')}}</textarea>
            </div>
        </form>
    </div>
</div>
<div class="text-center mt-3" style="width: 35rem; padding: 10px;">
    <button type="submit" class="btn btn-primary" onclick="onSubmitForm()">追加</button>
</div>

<script type="text/javascript">
    function onSubmitForm() {
        var form = document.getElementById('form_create');
        form.submit();
    }
</script>
@endsection