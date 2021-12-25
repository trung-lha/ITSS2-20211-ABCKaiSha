@section('title', 'カテゴリ管理')
@extends('admin.index')
@section('content')
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>カテゴリ管理</h1>
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
                    <h3 class="card-title mt-2">カテゴリ一覧</h3>
                    <a href="{{ route('category.create') }}"><button class="btn btn-success float-right" >新規追加</button></a>
                </div>
                <div class="card-body">
                    <table id="categories-list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>カテゴリー名</th>
                                <th>アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($categories) == false)
                            @foreach($categories as $category)
                            <tr>
                                <td style="width: 70px">{{$category['id']}}</td>
                                <td class="td-start">{{$category['name']}}</td>
                                <td style="text-align: center; width: 150px;">
                                    <a name="" id="" class="btn btn-warning" href="{{ route('category.edit', $category['id']) }}" role="button"><i class="fa fa-pencil-alt"></i></a>
                                    &nbsp;&nbsp;
                                    <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onclick="showModalDelete(`{{$category['id']}}`)"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deletetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">カテゴリを削除？</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formDelete">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        このカテゴリを削除しますか？
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-danger" onclick="submitFormDelete()">削除</button>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function showModalDelete(id) {
        var formDelete = document.getElementById('formDelete');
        formDelete.action = `{{url('/admin/categories')}}/${id}/delete`;
    }
    function submitFormDelete() {
        var formDelete = document.getElementById('formDelete');
        formDelete.submit();
    }
</script>

<script>
  $(function () {
    $('#categories-list').DataTable({
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