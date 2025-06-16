    @include('include.head')
    <title>شي تريند - {{$product->name}}</title>


</head>
  <body>
    @include('include.menu')

    <section>
        <div class="container">
            {{-- اسم المنتج --}}
            <div class="text-center mb-5">
                <h1 class="category-title">{{$product->name}}</h1>
            </div>

            {{-- صور المنتج --}}
            @if (!empty($product->images) && count($product->images) > 0)
                <div class="row mb-5">
                    @foreach ($product->images as $index => $image)
                        <div class="col-lg-4 mb-4">
                            <div>
                                <img loading="lazy" class="img-fluid" src="{{asset('storage/' . $image)}}" alt="{{$product->name}} - {{$index}}">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row">
                {{-- صورة الخدمات --}}
                <div class="col-lg-10 mx-auto">
                    <img class="img-orange-border img-fluid" loading="lazy" src="{{asset('imgs/img-2.png')}}" alt="{{$product->name}}">
                </div>
                {{-- صورة رمضان --}}
                <div class="col-lg-10 mx-auto">
                    <img class="img-orange-border img-fluid" loading="lazy" src="{{asset('imgs/img-1.png')}}" alt="{{$product->name}}">
                </div>
            </div>
        </div>
    </section>

    {{-- العداد التنازلي لوقت الخصم --}}
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="secondary-title">الوقت المتبقي للخصم</h2>
                    <div>
                        <div class="countdown mt-3">
                            <div id="countdown-timer" class="d-flex justify-content-center gap-3">
                                <div class="text-center">
                                    <div class="seconds stock-cont px-5 fs-1 fw-bold">00</div>
                                    <div class="text-muted time-label">الثواني</div>
                                </div>
                                <div class="text-center">
                                    <div class="minutes stock-cont px-5 fs-1 fw-bold">00</div>
                                    <div class="text-muted time-label">الدقائق</div>
                                </div>
                                  <div class="text-center">
                                    <div class="hours stock-cont px-5 fs-1 fw-bold">00</div>
                                    <div class="text-muted time-label">الساعات</div>
                                </div>
                                <div class="text-center">
                                    <div class="days stock-cont px-5 fs-1 fw-bold">00</div>
                                    <div class="text-muted time-label">الايام</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- وصف المنتج --}}
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="display-5 fw-bold mb-5 title-des">وصف المنتج :</h2>
                    <div class="product-description">
                         {!! Str::markdown($product->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('include.footer')

    <script>
            // Set the date we're counting down to
            const countDownDate = new Date("{{ $product->discount_end }}").getTime();

            // Update the count down every 1 second
            const x = setInterval(function() {
                // Get today's date and time
                const now = new Date().getTime();

                // Find the distance between now and the count down date
                const distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result
                document.querySelector(".days").innerHTML = days.toString().padStart(2, '0');
                document.querySelector(".hours").innerHTML = hours.toString().padStart(2, '0');
                document.querySelector(".minutes").innerHTML = minutes.toString().padStart(2, '0');
                document.querySelector(".seconds").innerHTML = seconds.toString().padStart(2, '0');

                // If the count down is finished, hide the counter
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown-timer").innerHTML = "Discount has ended";
                }
            }, 1000);
        </script>
  </body>
</html>
