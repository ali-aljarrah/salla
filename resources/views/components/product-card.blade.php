<a class="text-decoration-none" href="/product/{{$product->id}}/{{arabicSlug($product->name)}}">
    <div class="card">
        <div class="mb-2 top-card">{{$product->promo}}</div>
        <div class="mb-1">
            <img class="img-fluid" loading="lazy" width="278" height="278" src="{{asset('storage/'. $product->images[0])}}" alt="{{$product->name}}">
        </div>
        <div class="mb-0 product-title text-center">
            <p class="mb-1">{{$product->name}}</p>
        </div>
        <div class="mb-1 product-price text-center">
            <p class="mb-1">{{$product->price}} ريال</p>
        </div>
    </div>
</a>
