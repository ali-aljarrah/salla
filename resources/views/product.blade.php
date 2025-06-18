@include('include.head')

<title>شي تريند | {{$product->name}} | {{$product->price}} | ريال</title>
<meta name="description"
content="اشتري {{$product->name}} من شي تريند. . توصيل سريع.">

<meta property="og:title" content="شي تريند | {{$product->name}} | {{$product->price}} | ريال">
<meta property="og:description"
    content="اشتري {{$product->name}} من شي تريند. . توصيل سريع.">

<meta property="og:type" content="product">
<meta property="product:price:amount" content="{{$product->price}}">
<meta property="product:price:currency" content="SAR">

<link rel="canonical" href="{{Request::url()}}">
<meta property="og:url" content="{{Request::url()}}">

<link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

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

                    <form id="orderSubmitForm" name="orderSubmitForm" action="{{ route('orders-submit') }}" method="POST">
                        @csrf
                        <div class="row my-3">
                            @foreach ($product->options as $index => $option)
                            <div class="col-lg-12 mb-2">
                                <div class="option-wrapper">
                                    <div>
                                        <label for="option-{{$index+1}}">
                                            <span>{{$option->title}} {{$option->price}} ريال</span>
                                            <input type="radio" value="{{$option->id}}" name="productOption"
                                                id="option-{{$index+1}}" {{$index == 0 ? 'checked' : ''}}>
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
                                <div>
                                    <label for="fullname" class="form-label">الاسم الكامل:</label>
                                    <input class="form-control" type="text" id="fullname" name="fullname" value="" placeholder="يرجى ادخال الاسم الكامل">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="">
                                    <label for="phone" class="form-label">رقم الموبايل:</label>
                                    <input class="form-control" type="text" id="phone" name="phone" value="" placeholder="رقم الهاتف يجب ان يكون اقل شي 10 ارقام">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="address" class="form-label">العنوان:</label>
                                <textarea class="form-control" name="address" id="address" cols="30" placeholder="العنوان يجب ان يكون اقل شي 10 احرف"
                                    rows="5"></textarea>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <p>المجموع:</p>
                                    </div>
                                    <div class="col-2">
                                        <p id="total-price">0</p>
                                    </div>
                                    <div class="col-2">
                                        <p>ريال</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <p>الشحن:</p>
                                    </div>
                                    <div class="col-2">
                                        <p id="shipping-fee">0</p>
                                    </div>
                                    <div class="col-2">
                                        <p>ريال</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8">
                                        <p>الاجمالي :</p>
                                    </div>
                                    <div class="col-2">
                                        <p id="grand-total">0</p>
                                    </div>
                                    <div class="col-2">
                                        <p>ريال</p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="policy-stat">
                                    <p>قرأت وأوافق على الشروط والأحكام&nbsp;وسياسة&nbsp;الخصوصية</p>
                                    <input type="radio" checked="" disabled="">
                                </div>
                                <input type="hidden" name="productID" value="{{$product->id}}">
                                <button class="submit-order-btn" id="orderSubmitBtn" type="submit">تأكيد الطلب</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('include.footer')


    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script>
        // Get the product options
        var productOptions = @json($product->options);

        document.getElementById('total-price').innerHTML = productOptions[0].price;
        document.getElementById('shipping-fee').innerHTML = productOptions[0].has_shipping_fee ? parseFloat(productOptions[0].shipping_fees) : 0;
        document.getElementById('grand-total').innerHTML = productOptions[0].has_shipping_fee ? productOptions[0].price + parseFloat(productOptions[0].shipping_fees) : productOptions[0].price;

        const optionBtns = document.querySelectorAll('input[name="productOption"]');

        // Calculate the values after the option change
        optionBtns.forEach(btn => {
            btn.addEventListener('change', function() {
                if (this.checked) {
                    var selectedOption = productOptions.find(option => option.id == this.value);
                    document.getElementById('total-price').innerHTML = selectedOption.price;
                    if(selectedOption.has_shipping_fee) {
                        document.getElementById('shipping-fee').innerHTML = parseFloat(selectedOption.shipping_fees);
                        document.getElementById('grand-total').innerHTML = selectedOption.price + parseFloat(selectedOption.shipping_fees);
                    } else {
                        document.getElementById('grand-total').innerHTML = selectedOption.price;
                    }
                }
            });
        });

        // Check if phone valid
        document.getElementById('phone').addEventListener('input', function(e) {
            // Remove all non-numeric characters except optional + at start
            this.value = this.value.replace(/[^\d+]/g, '');
            // Ensure only one + at start
            if (this.value.startsWith('+')) {
                this.value = '+' + this.value.substring(1).replace(/\D/g, '');
            }
        });

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $('#orderSubmitForm').on('submit', function(e) {
            e.preventDefault();

            var $form = $(this);
            const $submitBtn = $(this).find('[type="submit"]');
            $submitBtn.prop('disabled', true).text('جاري المعالجة...');

            // Get form values
            var product_option_id = $('input[name="productOption"]:checked').val();
            var fullname = $('#fullname').val().trim();
            var phone = $('#phone').val().trim();
            var address = $('#address').val().trim();

            // Clear previous errors
            $('.error-message').remove();
            $('.is-invalid').removeClass('is-invalid');

            var isValid = true;

            if (!product_option_id) {
                showFieldError('productOption', 'الرجاء اختيار عرض السعر');
                isValid = false;
            }

            if (!fullname) {
                showFieldError('fullname', 'الرجاء ادخال الاسم الكامل');
                isValid = false;
            }

            if (!phone) {
                showFieldError('phone', 'الرجاء ادخال رقم الهاتف');
                isValid = false;
            } else if (phone.length < 10) {
                showFieldError('phone', 'عشرة ارقام على الاقل , الرجاء ادخال رقم الهاتف');
                isValid = false;
            }

            if (!address) {
                showFieldError('address', 'الرجاء ادخال العنوان');
                isValid = false;
            }
            else if (address.length < 10) {
                showFieldError('address', 'العنوان قصير جداً، الرجاء ادخال عنوان مفصل');
                isValid = false;
            }

            if (!isValid) {
                $submitBtn.prop('disabled', false).text('تأكيد الطلب');
                toastr.error('الرجاء تصحيح الأخطاء في النموذج');
                return;
            }

            // AJAX request
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $form.serialize(),
                success: function(response) {
                    if (response.success) {
                        toastr.success("شكرا لاختيارك شي تريند سنتواصل معك خلال 24 ساعة.");
                        window.location.href = response.redirect_url;
                    }
                },
               error: function(xhr) {
                    if (xhr.status === 422) {
                        // Laravel validation errors
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            var fieldName = field.replace('.', '-');
                            showFieldError(fieldName, messages.join(' '));
                        });
                        toastr.error('الرجاء تصحيح الأخطاء في النموذج');
                    } else {
                        toastr.error('حدث خطأ في الخادم، الرجاء المحاولة لاحقاً');
                    }
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).text('تأكيد الطلب');
                }
            });
        });

        // Function to display field errors
        function showFieldError(fieldName, message) {
            var $field = $('[name="' + fieldName + '"], #' + fieldName);
            $field.addClass('is-invalid');

            if ($field.is(':radio')) {
                $field.closest('.radio-group').append('<div class="error-message text-danger">' + message + '</div>');
            } else {
                $field.after('<div class="error-message text-danger">' + message + '</div>');
            }
        }

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
