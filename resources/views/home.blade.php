    @include('include.head')
    <title>شي تريند</title>


</head>
  <body>
    @include('include.menu')
    @include('components.search-bar')
    @if (!empty($categories) && count($categories) > 0)
        <section class="pb-3">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 mb-0 mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-center w-100">
                                    <a class="category-link" href="/category/{{$category->id}}/{{arabicSlug($category->name)}}">{{$category->name}}</a>
                                </div>
                                <div>|</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

{{-- prodact card --}}

    <section class="pb-2">
        <div class="container">
            <div class="row">
                @if (!empty($products) && count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            @include('components.product-card', ['product' => $product])
                        </div>
                    @endforeach

                    <div class="col-lg-12">
                        {{$products->links(data: ['scrollTo' => false])}}
                    </div>
                @else
                <div class="col-lg-12 text-center">
                    <h2>عذرا, لا يوجد منتجات لعرضها</h2>
                </div>
                @endif
            </div>
        </div>
    </section>

    @include('include.footer')
  </body>
</html>
