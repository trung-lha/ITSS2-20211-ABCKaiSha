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
                                <th style="width: 30px">ID</th>
                                <th>名前</th>
                                <th style="width: 300px">内容</th>
                                <th>メールアドレス</th>
                                <th>アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($contacts) == false)
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact['id']}}</td>
                                <td>{{$contact['username']}}</td>
                                <td>
                                  <p style="font-weight: bolder">{{$contact['content']}}</p>
                                  <p style="white-space: pre-wrap;text-align: justify;">{{$contact['contactbody']}}</p>
                                </td>
                                <td>{{$contact['email']}}</td>
                                <td style="text-align: center; width: 100px;">
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="checkSwitch">
                                      <label class="custom-control-label" for="checkSwitch"></label>
                                    </div>
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
</script>
@endsection
