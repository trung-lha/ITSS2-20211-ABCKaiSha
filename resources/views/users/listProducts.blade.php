<div class="row">
    @if (empty($productList) == false)
        @foreach($productList as $key => $product)
            <div class="col-md-3">
                <div style="height: 150px; width: auto">
                    <a href="{{ route('product.detail', $product['id']) }}"> <img src="{{asset('/storage/images/'.$imageUrl[$key])}}" alt="{{$product['name']}}" class="img-thumbnail" style="object-fit: cover;"></a>
                </div>
                <div>{{$product['name']}}</div>
            </div>
        @endforeach
    @endif
</div>
<div class="text-center mt-3" style="margin-left: 35%">
    {{ $productList->links() }}
</div>
