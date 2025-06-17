    @include('include.head')
    <title>شي تريند - شكرا جزيلا</title>


</head>
  <body>
    @include('include.menu')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success mb-5">
                        <p class="fw-bold display-6">تم استلام طلبك</p>
                        <p class="mb-0">شكرا لاختيارك شي تريند سنتواصل معك خلال 24 ساعة</p>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">رقم الطلب</td>
                                    <td>{{$orderData['order_id']}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">تاريخ الطلب</td>
                                    <td>{{$orderData['order_date']}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">الاسم الكامل</td>
                                    <td>{{$orderData['fullname']}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">رقم الهاتف</td>
                                    <td>{{$orderData['phone']}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">المنتج</td>
                                    <td>{{$orderData['product']['name']}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">العرض</td>
                                    <td>{{$orderData['product_option']}} {{$orderData['product']['price']}} ريال</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">رسوم التوصيل</td>
                                    <td>{{$orderData['shipping_fee']}} ريال</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">الاحمالي</td>
                                    <td>{{$orderData['total']}} ريال</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="thank-sparkling">
                <p style="font-size: 24px;">مبروووك...</p>
                <p>لقد حصلت على منتجات بسعر المصنع بمكنك اختيار واحدة فقط</p>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 mb-4">
                         @include('components.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('include.footer')
  </body>
</html>
