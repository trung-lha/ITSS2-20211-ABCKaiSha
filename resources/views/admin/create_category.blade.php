@section('title', 'カテゴリーを新規追加')
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
                    <h3 class=" mt-2 text-left">カテゴリーを新規追加</h3>
                </div>
                <div class="card-body">
                    <form class="container" id="form_create" enctype="multipart/form-data" method="POST" action="{{route('category.store')}}">
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
                            <label for="category_name_create">カテゴリー名 <span style="color: red">*</span></label>
                            <input type="text" name="name" class="form-control" id="category_name_create" required value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="category_desc_create">説明<span style="color: red">*</span></label>
                            <textarea name="description" class="form-control" id="category_desc_create" required>{{old('description')}}</textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success">追加</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            <div class="col-3"></div>
          </div>
        </div>
      </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>

    <script>
      function changeName(event) {
        document.getElementById("category_name_create").value = event.target.value.trim();
        console.log(document.getElementById("category_name_create").value);
      }

      function changeDesc(event) {
        document.getElementById("category_desc_create").value = document.getElementById("category_desc_create").value.trim();
        console.log(document.getElementById("category_desc_create").value);
      }
      document.getElementById("category_desc_create").value = document.getElementById("category_desc_create").value.trim();
    </script>
@endsection
