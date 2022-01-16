<div class="py-1 bg-green"></div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.home') }}">なにぬね会社</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> メニュー
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{ route('user.home') }}" class="nav-link">ホーム</a></li>
        </li>
            <li class="nav-item"><a href="{{ route('intro') }}" class="nav-link">会社概要</a></li>
            <li class="nav-item"><a href=" {{route('recruitment.list')}} " class="nav-link">採用情報</a></li>
            <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">間い合わせ</a></li>
            <li class="nav-item"><a href="{{ route('plan.index') }}" class="nav-link">無料お試しプラン登録</a></li>
        </ul>
        </div>
    </div>
</nav>
<section id="home-section" class="hero">
    <div class="home-banner">
        <div class="slider-item" style="background-image: url('{{asset("/images" . $urlBg)}}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    
                    <div class="col-md-12 ftco-animate">
                        <div style="font-size: 3rem; color: white; font-weight: bolder">自然・環境を守り、安心・安全な食べものをお届け</div>
                        <div class="mt-5">
                            <span class="mr-5"><a href="{{route('plan.index')}}" class="btn btn-primary">無料お試し</a></span>
                            <span><a href="{{route('recruitment.list')}}" class="btn btn-primary">ドライバーになろう</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
