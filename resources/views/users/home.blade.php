@extends('users.layout.index')
@section('content')
    @include('users.layout.slider')
    <ul class="nav nav-tabs">
        @foreach ($categories as $item)
            <li class="nav-item">
                <a class="nav-link active" href="">{{$item->name}}</a>
            </li>
        @endforeach
        {{-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li> --}}
    </ul>
    @include('users.listProducts', ['productList' => $products])
@endsection
