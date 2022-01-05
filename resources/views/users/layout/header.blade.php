<style>
    .slider-text .btn {
        cursor: pointer;
        color: #fff;
        font-size: 1.5rem;
        padding: 20px 50px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        -ms-border-radius: 30px;
        border-radius: 40px;
        -webkit-box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09);
        -moz-box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09);
        box-shadow: 0px 24px 36px -11px rgba(0, 0, 0, 0.09); }
        .slider-text .btn:hover, .btn:active, .btn:focus {
            outline: none; }
        .slider-text .btn.btn-primary {
            background: #82ae46 !important;
            opacity: 0.9;
            border: 1px solid #82ae46; }
        .slider-text .btn.btn-primary:hover {
            border: 1px solid #82ae46;
            opacity: 0.7; }
        .slider-text .btn.btn-primary:active {
            border: 1px solid #82ae46;
            opacity: 0.7; }
        .slider-text .btn.btn-primary.btn-outline-primary {
            border: 1px solid #82ae46;
            color: #82ae46; }
        .slider-text .btn.btn-primary.btn-outline-primary:hover {
            border: 1px solid transparent;
            color: #fff; }
</style>
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
                    <div class="col-md-12 ftco-animate text-center">
                        <p><a href="{{route('test-plan')}}" class="btn btn-primary">無料お試しプラン登録</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
