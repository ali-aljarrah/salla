<a class="text-decoration-none" href="/product/{{$product->id}}/{{arabicSlug($product->name)}}">
    <div class="card border-0 product-card">
        <div class="top-card">{{$product->promo}}</div>
        <div class="mb-1">
            @php
                $imageSrc = $product->preview_image != null ? $product->preview_image : $product->images[0];
            @endphp
            <img class="img-fluid w-100 h-100" loading="lazy" width="278" height="278" src="{{asset('storage/'. $imageSrc)}}" alt="{{$product->name}}">
        </div>
        <div class="mb-0 product-title text-center">
            <p class="mb-1">{{$product->name}}</p>
        </div>
        <div class="mb-1 product-price text-center">
            <p class="mb-1">{{$product->price}} ريال</p>
        </div>
    </div>
</a>
