    @include('include.head')
    <title>شي تريند</title>


</head>
  <body>
    @include('include.menu')

    @if (!empty($categories) && count($categories) > 0)
        <section class="pb-5">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 mb-4">
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

    @include('include.footer')
  </body>
</html>
