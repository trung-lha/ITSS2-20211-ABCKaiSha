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
                    <th>お試し商品</th>
                    <th>内容</th>
                    <th>状態</th>
                    <th>アクション</th>
                  </tr>
                </thead>
                <tbody>
                  @if (empty($plans) == false)
                  @foreach($plans as $index => $plan)
                    <tr>
                        <td>{{ $plan['username'] }}</td>
                        <td>{{ $plan['phone'] }}</td>
                        <td>{{ $plan['email'] }}</td>
                        <td>
                            @foreach ($productsOfPlans[$index] as $productName)
                                <p>{{ $productName }}</p>
                            @endforeach
                        </td>
                        <td>{{ $plan['content'] }}</td>
                        <td>
                            @if ($plan['status'] == 1)
                                <strong style="color: green">処理済み</strong>
                            @else
                                <strong style="color: grey">処理なし</strong>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($plan['status'] == 0)
                            <i class="fa fas fa-check fa-lg approved" style="color: green; cursor: pointer;" data-id="{{$plan['id']}}"></i>
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
    $('td .approved').on('click', function() {
      var id = $(this).attr("data-id");
      var form = $('#my-form');
      var url = `{{url('/plans/update')}}/${id}`;

      form.attr("action", url);
      $('#action-status').val(1);
      $('#my-form').submit();
    });
  });
</script>
@endsection
