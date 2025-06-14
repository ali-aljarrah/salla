<a class="text-decoration-none" href="/product/{{$product->id}}/{{arabicSlug($product->name)}}">
    <div class="card">
        <div class="mb-2">{{$product->promo}}</div>
        <div class="mb-2">
            <img class="img-fluid" loading="lazy" width="278" height="278" src="{{asset('storage/'. $product->images[0])}}" alt="{{$product->name}}">
        </div>
        <div class="mb-3">
            <h3>{{$product->name}}</h3>
        </div>
        <div class="mb-3">
            <h3>{{$product->price}} ريال</h3>
        </div>
    </div>
</a>
