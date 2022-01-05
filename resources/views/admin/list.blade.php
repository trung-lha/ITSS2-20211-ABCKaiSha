@section('title', '商品管理')
@extends('admin.layout.index')
@section('content')
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>商品管理</h1>
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
                    <h3 class="card-title mt-2">商品リスト</h3>
                    <a href="{{ route('admin.product.create') }}"><button class="btn btn-success float-right" >新商品</button></a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>番号</th>
                                <th>月</th>
                                <th>商品名</th>
                                <th>カテゴリ</th>
                                <th>イメージ</th>
                                <th>説明</th>
                                <th>アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($products) == false)
                            @foreach($products as $i => $product)
                            <tr>
                                <td style="width: 60px">{{$i + 1}}</td>
                                <td style="width: 60px">{{$months[$product['month'] - 1]}}</td>
                                <td class="td-start">{{$product['name']}}</td>
                                <td class="td-start">{{$product['category_name']}}</td>
                                <td style="text-align: center; width: 200px; height: 130px">
                                    <img src="{{$product['image']}}" alt="{{$product['name']}}" class="img-thumbnail" style=" width:200px; height:130px">
                                </td>
                                <td>
                                    <p style="white-space: pre-wrap;text-align: justify;margin-top: 10px">{{$product["description"]}}</p>
                                </td>
                                <td style="text-align: center; width: 140px;">
                                    <a name="" id="" class="btn btn-warning" href="{{ route('admin.edit', $product['id']) }}" role="button"><i class="fa fa-pencil-alt"></i></a>
                                    &nbsp;&nbsp;
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger" onclick="showModalDelete(`{{$product['id']}}`)"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">リストから商品を削除？</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formDelete">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        この商品を削除しますか？
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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
