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
                        <img loading="lazy" class="img-fluid" src="{{asset('storage/' . $image)}}"
                            alt="{{$product->name}} - {{$index}}">
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <div class="row">
                {{-- صورة الخدمات --}}
                <div class="col-lg-10 mx-auto">
                    <img class="img-orange-border img-fluid" loading="lazy" src="{{asset('imgs/img-2.png')}}"
                        alt="{{$product->name}}">
                </div>
                {{-- صورة رمضان --}}
                <div class="col-lg-10 mx-auto">
                    <img class="img-orange-border img-fluid" loading="lazy" src="{{asset('imgs/img-1.png')}}"
                        alt="{{$product->name}}">
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

    {{-- المخزون --}}
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="w-100 shadow-1 rounded p-2 text-center">
                        <p class="text-count">متبقي في المخزون <span>{{$product->storage_quantity}}</span> قطعة</p>
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

    {{-- اختيار الكمية --}}
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="w-100 shadow-1 rounded p-2 text-center">
                        <p class="mb-0">الرجاء اختيار الكمية</p>
                    </div>

                    <form action="">
                        @csrf
                        <div class="row my-3">
                            @foreach ($product->options as $index => $option)
                                <div class="col-lg-12 mb-2">
                                    <div class="option-wrapper">
                                        <div>
                                            <label for="option-{{$index+1}}">
                                                <span>{{$option->title}} {{$option->price}} ريال</span>
                                                <input required type="radio" value="{{$option->id}}" name="product-option" id="option-{{$index+1}}">
                                            </label>
                                        </div>
                                        @if ($option->has_shipping_fee)
                                            <div>رسوم التوصيل {{$option->shipping_fees}} ريال</div>
                                        @else
                                            <div>شحن مجاني</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                                <div class="col-lg-12 mb-2">
                                    <p class="mb-0">الدفع عند الاستلام</p>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="">
                                        <label for="fullname" class="form-label">الاسم الكامل:</label>
                                        <input class="form-control" type="text" id="fullname" name="fullname" value="">
                                    </div>
                                </div>
                                 <div class="col-lg-6 mb-4">
                                    <div class="">
                                        <label for="phone" class="form-label">رقم الموبايل:</label>
                                        <input class="form-control" type="text" id="phone" name="phone" value="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <label for="address" class="form-label">العنوان:</label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="5"></textarea>
                                </div>
                        </div>
                    </form>
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
