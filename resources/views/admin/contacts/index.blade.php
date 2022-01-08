@section('title', '問い合わせ管理')
@extends('admin.index')
@section('content')
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>問い合わせ管理</h1>
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
                    <h3 class="card-title mt-2">問い合わせ一覧</h3>
                </div>
                <div class="card-body">
                    <table id="contacts-list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 30px">番号</th>
                                <th>名前</th>
                                <th style="width: 300px">内容</th>
                                <th>メールアドレス</th>
                                <th>状態</th>
                                <th>アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($contacts) == false)
                            @foreach($contacts as $i => $contact)
                            <tr>
                              <td>{{$i+1}}</td>
                              <td>{{$contact['username']}}</td>
                              <td>
                                <p style="font-weight: bolder">{{$contact['content']}}</p>
                                <p style="white-space: pre-wrap;text-align: justify;">{{$contact['contactbody']}}</p>
                              </td>
                              <td>{{$contact['email']}}</td>
                              <td>
                                @if ($contact['status'] == 1)
                                    <strong style="color: green">処理済み</strong>
                                @else
                                    <strong style="color: grey">処理なし</strong>
                                @endif
                              </td>
                              <td style="text-align: center;">
                                @if ($contact['status'] == 0)
                                <i class="fa fas fa-check fa-lg approved" style="color: green; cursor: pointer;" data-id="{{$contact['id']}}"></i>
                                @endif
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
        <form action="" method="post" id="my-form">
          @csrf
          <input type="hidden" name="status" value="" id="action-status">
        </form>
      </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>

<script>
  $(function () {
    $('#contacts-list').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(document).ready(function() {
    $('td .approved').on('click', function() {
      var id = $(this).attr("data-id");
      var form = $('#my-form');
      var url = `{{url('admin/contacts/status/update')}}/${id}`;

      form.attr("action", url);
      $('#action-status').val(1);
      $('#my-form').submit();
    });
  });
</script>
@endsection
