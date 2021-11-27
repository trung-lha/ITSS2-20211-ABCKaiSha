@if(!empty($product))
<div class="row">
    <div>{{$product["description"]}}</div>
    <div>{{$product["name"]}}</div>
    <img src="{{asset('/storage/images/'.$urlImage)}}" alt="{{$product['name']}}" class="img-thumbnail" style="object-fit: cover;">
</div>
@endif
