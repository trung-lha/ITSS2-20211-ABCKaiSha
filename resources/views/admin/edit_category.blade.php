@section('title', 'カテゴリ編集')
@extends('admin.index')
@section('content')
<div class="content-wrapper pt-3">
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <a href="{{route('category')}}" class="float-right"><button type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>&nbsp;戻る</button></a>
              <h3 class=" mt-2 text-left">詳細情報</h3>
            </div>
            <div class="card-body">
              <form class="container" id="form_edit" enctype="multipart/form-data" method="POST" action="{{ route('category.update', $category->id) }}">
                <p class="text-left" style="display: block; color: red; font-size: 0.8rem;">＊は必須項目です。</p>
                @csrf
                @method('PATCH')
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
                  <label for="cate_name_edit">カテゴリ名 <span style="color: red">*</span></label>
                  <input type="text" name="name" class="form-control" id="cate_name_edit" required value="{{$category->name}}">
                </div>
                <div class="form-group">
                  <label for="cate_desc_edit">説明 <span style="color: red">*</span></label>
                  <textarea class="form-control" name="description" id="cate_desc_edit" rows="6" cols="50" required>
                  {{trim($category->description)}}
                  </textarea>
                </div>
                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary">更新</button>
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

<script>
  document.getElementById("cate_desc_edit").value = document.getElementById("cate_desc_edit").value.trim();
  function changeName(event) {
    document.getElementById("cate_name_edit").value = event.target.value.trim();
    console.log(document.getElementById("cate_name_edit").value);
  }

  function changeDesc(event) {
    document.getElementById("cate_desc_edit").value = document.getElementById("cate_desc_edit").value.trim();
    console.log(document.getElementById("cate_desc_edit").value);
  }
  
</script>
@endsection
