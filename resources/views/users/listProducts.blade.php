<div class="row">
    @if (empty($productList) == false)
    @foreach($productList as $product)
        <div class="col-md-3">
            <div style="height: 200px; width: auto">
                <a href="{{ route('product.detail', $product['id']) }}"> <img src="{{asset('/storage/images/'.$product['image'])}}" alt="{{$product['name']}}" class="img-thumbnail" style="object-fit: cover;"></a>
            </div>
            <div>{{$product['name']}}</div>
        </div>
    @endforeach
    <div class="d-flex text-center">
        {{ $productList->links() }}
    </div>
@endif
</div>
