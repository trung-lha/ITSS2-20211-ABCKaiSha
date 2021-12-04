<div class="row productList">
    @if (empty($productList) == false)
        @foreach($productList as $key => $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{ route('product.detail', $product['id']) }}" class="img-prod"><img class="img-fluid" src="{{asset('/storage/images/'.$imageUrl[$key])}}" alt="{{$product['name']}}"
                        style="height: 200px; width: 250px; object-fit: cover;"
                    >
                        <!-- <span class="status">NEW</span>
                        <div class="overlay"></div> -->
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{ route('product.detail', $product['id']) }}">{{$product['name']}}</a></h3>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="productList-pagination row mt-3">
    <div class="col">
        <div class="block-27 text-center">
            {{ $productList->links() }}
        </div>
    </div>
</div>
