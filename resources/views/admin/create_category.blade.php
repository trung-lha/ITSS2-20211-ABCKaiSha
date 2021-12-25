@section('title', 'カテゴリを新規追加')
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
                    <h3 class=" mt-2 text-left">カテゴリを新規追加</h3>
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
                            <label for="exampleFormControlInput1">カテゴリ名 <span style="color: red">*</span></label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">説明<span style="color: red">*</span></label>
                            <textarea name="description" class="form-control" id="exampleFormControlInput2" required value=""></textarea>
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
@endsection
