<div class="py-1 bg-green"></div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.home') }}">ABC会社</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{ route('user.home') }}" class="nav-link">ホーム</a></li>
            <!-- <li class="nav-item dropdown"> -->
            <!-- <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">タイトル</a> -->
            <!-- <div class="dropdown-menu" aria-labelledby="dropdown04"> -->
                <!-- <a class="dropdown-item" href="#">タイトル</a> -->
                <!-- <a class="dropdown-item" href="#">タイトル</a> -->
            <!-- </div> -->
        </li>
            <li class="nav-item"><a href="#" class="nav-link">会社概要</a></li>
            <li class="nav-item"><a href="#" class="nav-link">事業内容</a></li>
            <li class="nav-item"><a href="#" class="nav-link">採用情報</a></li>
            <li class="nav-item"><a href="#" class="nav-link">間い合わせ</a></li>
        </ul>
        </div>
    </div>
</nav>
<section id="home-section" class="hero">
    <div class="home-banner">
        <div class="slider-item" style="background-image: url('{{asset('/images/bg_1.jpg')}}');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="">事業内容・ビジネス商品</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
