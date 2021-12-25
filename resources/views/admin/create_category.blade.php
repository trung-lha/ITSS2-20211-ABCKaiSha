@section('title', 'カテゴリを新規追加')
@extends('admin.index')
@section('content')
    <div class="content-wrapper pt-3">
      <section class="content">
        <div class="container">
        <div class="row">
            <div class="col-12 ml-3 mb-5">
                <button type="button" class="btn" style="border: solid 1px black"><a href="{{route('category')}}" style="color: black">一覧に戻る</a></button>
            </div>
        </div>
          <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                    <h3 class=" mt-2 text-center">カテゴリを新規追加</h3>
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
                            <label for="exampleFormControlInput1">カテゴリ名<span style="color: red">*</span></label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{old('name')}}">
                        </div>
                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-primary" onclick="onSubmitForm()">追加</button>
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
    <script type="text/javascript">
        function onSubmitForm() {
            var form = document.getElementById('form_create');
            form.submit();
        }
    </script>
@endsection