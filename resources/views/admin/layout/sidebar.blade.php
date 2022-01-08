
<section>
<nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('user.home') }}" class="nav-link">ホーム</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.logout')}}" class="nav-link">ログアウト</a>
      </li>
    </ul>
</nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">管理者</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">なにぬね会社</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">管理</li>
          <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link @if(\Route::currentRouteName() == 'admin.index') active @endif">
              <i class="nav-icon fas fa-carrot"></i>
              <p>
                商品
                {{-- <span class="badge badge-info right">2</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('category')}}" class="nav-link @if(\Route::currentRouteName() == 'category') active @endif">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                カテゴリー
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('recruit')}}" class="nav-link @if(\Route::currentRouteName() == 'recruit') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>採用情報</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.candidate') }}" class="nav-link @if(\Route::currentRouteName() == 'admin.candidate') active @endif">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                応募者候補
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('contacts')}}" class="nav-link @if(\Route::currentRouteName() == 'contacts') active @endif">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                問い合わせ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.plans')}}" class="nav-link @if(\Route::currentRouteName() == 'admin.plans') active @endif">
              <i class="nav-icon fa fas fa-book"></i>
              <p>
                無料お試しプラン
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</section>
