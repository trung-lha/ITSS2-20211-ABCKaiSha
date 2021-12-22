@section('title', 'Create Category')
@extends('admin.index')
@section('content')

<form action="{{route('recruit.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Tên <span style="color: red">*</span></label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Lương <span style="color: red">*</span></label>
        <input type="number" name="salary" class="form-control" id="exampleFormControlInput1" required value="{{old('salary')}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Địa chỉ <span style="color: red">*</span></label>
        <input type="text" name="location" class="form-control" id="exampleFormControlInput1" required value="{{old('location')}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Thời gian <span style="color: red">*</span></label>
        <input type="datetime-local" name="limitation" class="form-control" id="exampleFormControlInput1" required value="{{old('limitation')}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Ảnh <span style="color: red">*</span></label>
        <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1" required accept="image/png, image/jpeg">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả <span style="color: red">*</span></label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required>{{old('description')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection