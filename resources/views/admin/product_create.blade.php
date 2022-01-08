@section('title', '新商品追加')
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
                    <h3 class=" mt-2 text-center">新商品追加</h3>
                </div>
                <div class="card-body">
                    <form class="container" id="form_create" enctype="multipart/form-data" method="POST" action="{{route('admin.store')}}">
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
                            <label for="exampleFormControlInput1">商品名 <span style="color: red">*</span></label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{old('name')}}">
                        </div>
                        @if (empty($categories) == false)
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">カテゴリー <span style="color: red">*</span></label>
                            <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(old('category_id') == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">月 <span style="color: red">*</span></label>
                            <select class="form-control" name="month" id="exampleFormControlSelect1" required>
                                @for ($i = 1; $i < 13; $i++)
                                <option value="{{$i}}" {{(old('month') == $i) ? 'selected' : ''}}>{{$months[$i-1]}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">イメージ <span style="color: red">*</span></label>
                            <input type="file" name="images[]" class="form-control-file" id="exampleFormControlFile1" multiple required accept="image/png, image/jpeg">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">説明 <span style="color: red">*</span></label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required>{{old('description')}}</textarea>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary" onclick="onSubmitForm()">追加</button>
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
        function onSubmitForm() {
            var form = document.getElementById('form_create');
            form.submit();
        }
    </script>
@endsection
