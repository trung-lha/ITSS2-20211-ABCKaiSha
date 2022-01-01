@section('title', '応募管理')
@extends('admin.index')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>応募管理</h1>
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
              <h3 class="card-title mt-2">応募管理一覧</h3>
            </div>
            <div class="card-body">
              <table id="contacts-list" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>名前</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>年齢</th>
                    <th>経験説明</th>
                    <th>住所</th>
                    <th>アクション</th>
                  </tr>
                </thead>
                <tbody>
                  @if (empty($candidates) == false)
                  @foreach($candidates as $candidate)
                  <tr>
                    <td>{{ $candidate['name'] }}</td>
                    <td>{{ $candidate['phoneNumber'] }}</td>
                    <td>{{ $candidate['mail'] }}</td>
                    <td>{{ $candidate['age'] }}</td>
                    <td>{{ $candidate['description'] }}</td>
                    <td>{{ $candidate['address'] }}</td>
                    <td style="text-align: center;">
                      @if ($candidate['status'] == 0)
                      <i class="fa fas fa-check fa-lg approved" style="color: green; cursor: pointer;" data-id="{{$candidate['id']}}"></i>
                      <i class="ml-4 reject fa fa-lg fa-ban" style="color: red; cursor: pointer" data-id="{{$candidate['id']}}"></i>
                      @else
                      @if ($candidate['status'] == 1)
                      <strong style="color: green">承認済み</strong>
                      @else
                      <strong style="color: grey">拒否</strong>
                      @endif
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
  $(function() {
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
    $('td .approved').on('click', function(id = 1) {
      var id = $(this).attr("data-id");
      var form = $('#my-form');
      var url = `{{url('/admin/candidate/process/')}}/${id}`;

      form.attr("action", url);
      $('#action-status').val(1);
      $('#my-form').submit();
    });
    $('td .reject').on('click', function(id = 1) {
      var id = $(this).attr("data-id");
      var form = $('#my-form');
      var url = `{{url('/admin/candidate/process/')}}/${id}`;

      form.attr("action", url);
      $('#action-status').val(2);
      $('#my-form').submit();
    })
  });
</script>
@endsection