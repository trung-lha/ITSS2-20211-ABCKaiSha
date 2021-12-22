@section('title', 'List Product')
@extends('admin.index')
@section('content')
<style>
    .mt-4 {
        background-color: #f2f5c5;
        padding: 20px;
    }

    .th-config {
        text-align: center;
        vertical-align: revert;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 1px solid #a55b5b;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #a55b5b;
    }

    .modal-dialog {
        margin-top: 150px;
    }

    .modal-content {
        text-align: center;
    }

    .modal-footer {
        justify-content: space-between;
    }
</style>
<div class="font-weight-bold mb-3" style="font-size: xx-large; text-align: center">製品リスト</div>
@if(Session::has('message'))
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="7000" style="position: absolute; top: 1rem; right: 1rem; width: 200px;">
    <div class="toast-header">

        <strong class="mr-auto">お知らせ</strong>
        <small>2秒</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{Session::get('message')}}
    </div>
</div>
@endif
<div class="c-container d-flex justify-content-between" style="float: right; padding-bottom: 20px; margin-top: 30px">
    <!-- <p style="font-size: x-large; font-weight: 500;">製品リスト</p> -->
    <a name="" id="" class="btn btn-primary" href="{{route('admin.create')}}" role="button">
        <i class="fas fa-plus-circle"></i>
        &nbsp;
        新製品を追加する
    </a>
</div>
<!-- <p style="font-size: x-large; font-weight: 500;">連絡線</p> -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" class="th-config" style="width: 5%">番号</th>
            <th scope="col" class="th-config" style="width: 12.5%">製品名</th>
            <th scope="col" class="th-config" style="width: 12.5%">カテゴリー</th>
            <th scope="col" class="th-config">イメージ</th>
            <th scope="col" class="th-config" style="width: 40%">説明</th>
            <th scope="col" class="th-config" style="width: 14%">アクション</th>
        </tr>
    </thead>
    <tbody>
        @if (empty($products) == false)
        @foreach($products as $product)
        <tr>
            <th style="width: 60px">{{$product['id']}}</th>
            <td class="td-start">{{$product['name']}}</td>
            <td class="td-start">{{$product['category_name']}}</td>
            <td style="text-align: center; width: 200px; height: 130px">
                <img src="{{$product['image']}}" alt="{{$product['name']}}" class="img-thumbnail" style=" width:200px; height:130px">
            </td>
            <td>
                <p style="white-space: pre-wrap;text-align: justify;margin-top: 10px">{{$product["description"]}}</p>
            </td>
            <td style="text-align: start; width: 140px;">
                <a name="" id="" class="btn btn-primary" href="{{url('/admin/products')}}/{{$product['id']}}/edit" role="button"><i class="fal fa-pencil-alt"></i></a>
                &nbsp;&nbsp;
                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary" onclick="showModalDelete(`{{$product['id']}}`)"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {{-- <a class="btn btn-primary mr-2 {{($products->currentPage() == 1? 'disabled': '')}}" href="{{$products->previousPageUrl()}}" role="button">前</a>
    <a class="btn btn-primary {{($products->currentPage() == $products->lastPage()? 'disabled': '')}}" href="{{$products->nextPageUrl()}}" role="button">次</a> --}}
    {{ $products->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">リストから製品を削除？</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formDelete">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    この製品を削除しますか？
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <button type="button" class="btn btn-primary" onclick="submitFormDelete()">削除</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showModalDelete(id) {
        var formDelete = document.getElementById('formDelete');
        formDelete.action = `{{url('/admin/products')}}/${id}`;
    }

    function submitFormDelete() {
        var formDelete = document.getElementById('formDelete');
        formDelete.submit();
    }
</script>

@endsection