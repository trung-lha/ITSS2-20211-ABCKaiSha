@section('title', '商品編集')
@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class=" mt-2 text-center">詳細情報</h3>
            </div>
            <div class="card-body">
              <form class="container" id="form_edit" enctype="multipart/form-data" method="POST">
                <p class="text-left" style="display: block; color: red; font-size: 0.8rem;">＊は必須項目です。</p>
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
                  <label for="exampleFormControlInput1">商品名 <span style="color: red">*</span></label>
                  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{$product->name}}">
                </div>
                @if (empty($categories) == false)
                <div class="form-group">
                  <label for="exampleFormControlSelect1">カテゴリー <span style="color: red">*</span></label>
                  <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{($product->category_id == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                @endif
                <div class="form-group">
                  <label for="exampleFormControlSelect1">月 <span style="color: red">*</span></label>
                  <select class="form-control" name="month" id="exampleFormControlSelect1" required>
                    @for ($i = 1; $i < 13; $i++) <option value="{{$i}}" {{($product->month == $i || old('month') == $i) ? 'selected' : ''}}>{{$months[$i-1]}}</option>
                      @endfor
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2">イメージ <span style="color: red">*</span></label>
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
                  <label for="exampleFormControlTextarea1">説明 <span style="color: red">*</span></label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="6" cols="50" required>
                  {{trim($product->description)}}
                  </textarea>
                </div>
                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary" onclick="onSubmitForm(`{{$product->id}}`)">更新</button>
                </div>
              </form>
            </div>
          </div>
        </div>
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
    form.action = `{{url('/admin/products')}}/${id}`;
    form.submit();
  }
</script>
@endsection
