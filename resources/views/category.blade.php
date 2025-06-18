    @include('include.head')

<title>شي تريند | تشكيلة واسعة بأسعار مميزة - {{$category->name}}</title>
<meta name="description"
content="تصفح أحدث تشكيلة {{$category->name}} في شي تريند. ✓ خصومات تصل إلى 50% ✓ دفع عند الاستلام ✓ شحن سريع.">

<meta property="og:title" content="شي تريند | تشكيلة واسعة بأسعار مميزة - {{$category->name}}">
<meta property="og:description"
    content="تصفح أحدث تشكيلة {{$category->name}} في شي تريند. ✓ خصومات تصل إلى 50% ✓ دفع عند الاستلام ✓ شحن سريع.">

<link rel="canonical" href="{{Request::url()}}">
<meta property="og:url" content="{{Request::url()}}">
</head>
  <body>
    @include('include.menu')

    <section>
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="category-title">{{$category->name}}</h1>
            </div>
        </div>
    </section>

    @include('components.search-bar')

    @if (!empty($categories) && count($categories) > 0)
        <section class="py-3">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-center w-100">
                                    <a class="category-link" href="/category/{{$category->id}}/{{arabicSlug($category->name)}}">{{$category->name}}</a>
                                </div>
                                <div class="d-none d-lg-block">|</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="pb-5">
        <div class="container">
            <div class="row">
                @if (!empty($products) && count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-6 mb-4">
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
