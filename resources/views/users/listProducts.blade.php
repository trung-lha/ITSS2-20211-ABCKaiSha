<div class="productList row">
    @if (empty($productList) == false)
        @foreach($productList as $key => $product)
            <div class="col-md-3 mb-3">
                <div class="card text-center" style="width: auto">
                    <img src="{{asset('/storage/images/'.$imageUrl[$key])}}" alt="{{$product['name']}}" class="card-img-top" style="object-fit: cover;">
                    <div class="card-body">
                        <div class="card-title">{{$product['name']}}
                            <span class="tooltiptext">{{$product['name']}}</span>
                        </div>
                        <a href="{{ route('product.detail', $product['id']) }}" class="btn btn-warning small-text"><small>もっと見る</small></a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="productList-pagination text-center mt-3">
    {{ $productList->links() }}
</div>
