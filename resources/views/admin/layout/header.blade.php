<div class="header">
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Admin</a>
        <div class="d-inline-flex p-2">
            <img src="{{auth()->user()->avatar}}" class="rounded-circle" width="50" height="40">
            <div class="dropdown ml-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    プロフィール
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('admin.logout')}}">ログアウト</a>
                </div>
            </div>
        </div>
    </nav>
</div>