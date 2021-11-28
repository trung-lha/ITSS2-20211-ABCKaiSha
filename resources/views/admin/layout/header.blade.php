<style>
    .admin{
        padding: 7px;
        background-color: #6426fa;
        color: white;
        border-radius: 6px;
        width: 100px;
        text-align: center;
    }
    .navbar-light .navbar-brand {
        color: rgba(255,255,255,255);
    }
    .bg-light {
        background-color: #74b5f6!important;
    }
}
}
</style>
<div class="header">
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a href="{{route('admin.index')}}" class="navbar-brand admin ">Admin</a>
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