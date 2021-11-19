@extends('admin.index')
@section('content')
<div class="c-container d-flex justify-content-between">
    <p style="font-size: x-large; font-weight: 500;">製品リスト</p>
    <button type="button" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
        &nbsp;
        新製品を追加する
    </button>
</div>
<p style="font-size: x-large; font-weight: 500;">連絡線</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">製品名</th>
            <th scope="col">イメージ</th>
            <th scope="col">説明</th>
            <th scope="col">アクション</th>
        </tr>
    </thead>
    <tbody>
        @if (empty($products) == false)
            @foreach($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <td class="td-start">{{$product->name}}</td>
                    <td style="text-align: center; width: 200px;">
                        <img src="https://d1sag4ddilekf6.azureedge.net/cuisine/62/icons/FastFood_4710e425c3d24db2aa4280aa207a22d3_1547819143037208832.jpg" alt="..." class="img-thumbnail" width="140" height="200">
                    </td>
                    <td>{{$product->description}}</td>
                    <td style="text-align: start; width: 140px;">
                        <button type="button" class="btn btn-primary"><i class="fal fa-pencil-alt"></i></button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end">
    <!-- <a class="btn btn-primary mr-2" href="{{route('admin.index', ['page'=>$products->currentPage() - 1])}}" role="button">前</a>
    <a class="btn btn-primary" href="{{route('admin.index', ['page'=>$products->currentPage() + 1])}}" role="button">次</a> -->
    <a class="btn btn-primary mr-2" href="{{$products->previousPageUrl()}}" role="button">前</a>
    <a class="btn btn-primary" href="{{$products->nextPageUrl()}}" role="button">次</a>
</div>
@endsection