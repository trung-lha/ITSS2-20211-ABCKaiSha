@extends('users.layout.index')
@section('content')
    @include('users.layout.slider')
    @include('users.listProducts', ['productList' => $products])
@endsection
