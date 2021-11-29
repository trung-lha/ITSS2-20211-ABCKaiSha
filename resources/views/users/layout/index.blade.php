<!doctype html>
<html lang="en">

<head>
    <title>ABC会社</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        /* * {box-sizing: border-box;}

/* Common */
body {
  font-family: Verdana, sans-serif; 
  margin: 0;
  color: #444444;
  background-color: #c3f7e6;
}

.container{
  background-color: #c3f7e6;
}
.container-single-page {
  max-width: 80%;
  margin: auto;
  padding: 3rem;
}

/* Header */
.header-title {
  margin-bottom: 0;
  padding: 2rem;
  border: solid lightgray;
  border-width: 1px 0 1px 0;
  background-color: white;
}

/* Carousel */
#carouselBanner .carousel-inner img {
  height: 200px;
  object-fit: cover; 
  opacity: 0.9;
}

/* Home */
.productList .card {
  box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
  transition: 0.1s;
}

.productList .card-title {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.card-title .tooltiptext {
  visibility: hidden;
  width: auto;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 10px;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  bottom: 50%;
  left: 50%;
  margin-left: -60px;
}

.card-title:hover .tooltiptext {
  visibility: visible;
}

.home-tabs-empty {
  width: 20%
}

.home-tabs-item {
  width: 15%;
  text-align: center;
}

.productList-pagination {
  display: flex;
  justify-content: center;
}

/* Product Detail */
.product-detail {
  margin-top: 3rem;
}

.product-detail .card {
  padding: 20px;
  box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
  transition: 0.1s;
}

.product-detail .info {
  margin-bottom: 2rem;
}

.product-detail .info .product-description {
  padding-left: 2rem;
}

.product-detail .info .product-description p {
  text-align: justify;
}

.product-detail .product-image img {
  width: 250px;
  height: 200px;
  object-fit: cover;
}

.product-detail .other .image-list {
  display: inline-block;
}

.product-detail .other .image-list img {
  width: 150px;
  height: 100px;
  object-fit: cover; 
}  
.item{
  width: 120px;
}
.home-tabs-empty {
    width: 15%;
}
    </style>
</head>
<body>
    @include('users.layout.header')
    <!-- Tuy trang ma tryen vao title khac nhau -> TODO: truyen bien -->
    <h1 class="header-title text-center">事業内容・ビジネス商品</h1>
    <div class="container">
        <div class="container-single-page">
            @yield('content')
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('.toast').toast('show');
    });
</script>
</body>
</html>
