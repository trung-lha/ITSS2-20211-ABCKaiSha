@section('title', 'Edit Product')
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
<div class="card" style="width: 35rem; ">
    <div class="card-body">
        <h5 class="card-title text-center mb-2"　 style="padding-bottom: 40px; padding-top: 10px; font-size: x-large">詳細情報</h5>
        <form class="container" id="form_edit" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
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
                <label for="exampleFormControlInput1">製品名</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{$product->name}}">
            </div>
            @if (empty($categories) == false)
            <div class="form-group">
                <label for="exampleFormControlSelect1">カテゴリ</label>
                <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{($product->category_id == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                <label for="exampleFormControlSelect2">イメージ</label>
                <input type="file" name="images[]" class="form-control-file" id="exampleFormControlFile1" multiple>
            </div>
            <div class="form-group d-flex">
                @if(empty($images) == false)
                    @foreach($images as $image)
                        <img src="{{$image->url}}" alt="{{$product->name}}" srcset="" width="50" height="50" class="mr-1">
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">説明</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="6" cols="50" required>
                {{trim($product->description)}}
                </textarea>
            </div>
        </form>
    </div>
</div>
<div class="text-center mt-3">
    <button type="submit" class="btn btn-primary" onclick="onSubmitForm(`{{$product->id}}`)">更新</button>
</div>
<script type="text/javascript">
    document.getElementById('exampleFormControlTextarea1').value = document.getElementById('exampleFormControlTextarea1').value.trim();
    function onSubmitForm(id) {
        var form = document.getElementById('form_edit');
        form.action = `{{url('/admin/products')}}/${id}`;
        form.submit();
    }
</script>
@endsection