@section('title', 'Edit Recruitment')
@extends('admin.index')
@section('content')

<form action="{{route('recruit.update', $recruit->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="exampleFormControlInput1">Tên <span style="color: red">*</span></label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required value="{{$recruit->name}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Lương <span style="color: red">*</span></label>
        <input type="number" name="salary" class="form-control" id="exampleFormControlInput1" required value="{{$recruit->salary}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Địa chỉ <span style="color: red">*</span></label>
        <input type="text" name="location" class="form-control" id="exampleFormControlInput1" required value="{{$recruit->location}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Thời gian <span style="color: red">*</span></label>
        <input type="date" name="limitation" class="form-control" id="exampleFormControlInput1" required value="{{explode(' ',$recruit->limitation)[0]}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Ảnh <span style="color: red">*</span></label>
        <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1" accept="image/png, image/jpeg">
    </div>
    <div class="form-group d-flex">
        <img src="{{$recruit->img}}" alt="{{$recruit->name}}" srcset="" width="50" height="50" class="mr-1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả <span style="color: red">*</span></label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required>{{$recruit->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection