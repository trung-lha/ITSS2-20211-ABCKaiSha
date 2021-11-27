@section('title', 'List Product')
@extends('admin.index')
@section('content')

@if(Session::has('message'))
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
    data-delay="2000" style="position: absolute; top: 1rem; right: 1rem; width: 200px;"

>
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
<div class="c-container d-flex justify-content-between">
    <p style="font-size: x-large; font-weight: 500;">製品リスト</p>
    <a name="" id="" class="btn btn-primary" href="{{route('admin.create')}}" role="button">
        <i class="fas fa-plus-circle"></i>
        &nbsp;
        新製品を追加する
    </a>
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
            <th>{{$product['id']}}</th>
            <td class="td-start">{{$product['name']}}</td>
            <td style="text-align: center; width: 200px; height: 130px">
                <img src="{{asset('/storage/images/'.$product['image'])}}" alt="{{$product['name']}}" class="img-thumbnail" width="140" height="200">
            </td>
            <td>{{$product['description']}}</td>
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
                    リストから製品・・・を削除しますか？
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
