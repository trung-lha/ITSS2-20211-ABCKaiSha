@section('title', '採用情報管理')
@extends('admin.index')
@section('content')
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>採用情報管理</h1>
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
                    <h3 class="card-title mt-2">採用情報一覧</h3>
                    <a href="{{ route('recruit.create') }}"><button class="btn btn-success float-right" >新規追加</button></a>
                </div>
                <div class="card-body">
                    <table id="recruiments-list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 100px">採用タイトル</th>
                                <th style="width: 70px">イメージ</th>
                                <th>要約情報</th>
                                <th style="width: 40px">場所</th>
                                <th style="width: 40px">給料</th>
                                <th style="width: 80px">採用開始日</th>
                                <th>アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($recruiments) == false)
                            @foreach($recruiments as $recruit)
                            <tr>
                                <td>{{$recruit['id']}}</td>
                                <td>{{$recruit['name']}}</td>
                                <td style="text-align: center;">
                                    <img src="{{$recruit['img']}}" alt="{{$recruit['name']}}" class="img-thumbnail" style=" width:70px; height:70px">
                                </td>
                                <td><p style="white-space: pre-wrap;text-align: justify;margin-top: 10px">{{$recruit['description']}}</p></td>
                                <td>{{$recruit['location']}}</td>
                                <td>{{$recruit['salary']}}万円</td>
                                <td>{{$recruit['limitation']}}</td>
                                <td style="text-align: center; width: 100px;">
                                    <a name="" id="" class="btn btn-warning" href="{{ route('recruit.edit', $recruit['id']) }}" role="button"><i class="fa fa-pencil-alt"></i></a>
                                    &nbsp;&nbsp;
                                    <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onclick="showModalDelete(`{{$recruit['id']}}`)"><i class="fas fa-trash"></i></button>
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
                    <h5 class="modal-title" id="deleteModalLabel">採用情報を削除？</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formDelete">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        この採用情報を削除しますか？
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
        formDelete.action = `{{url('/admin/recruiments')}}/${id}/delete`;
    }
    function submitFormDelete() {
        var formDelete = document.getElementById('formDelete');
        formDelete.submit();
    }
</script>

<script>
  $(function () {
    $('#recruiments-list').DataTable({
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