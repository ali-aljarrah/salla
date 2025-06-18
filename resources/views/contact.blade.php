@include('include.head')

<title>اتصل بنا - شي تريند | خدمة العملاء 24/7</title>
<meta name="description"
content="تواصل مع فريق شي تريند عبر الهاتف أو الواتساب أو البريد الإلكتروني. نحن هنا لمساعدتك!">

<meta property="og:title" content="اتصل بنا - شي تريند | خدمة العملاء 24/7">
<meta property="og:description"
    content="تواصل مع فريق شي تريند عبر الهاتف أو الواتساب أو البريد الإلكتروني. نحن هنا لمساعدتك!">

<link rel="canonical" href="{{Request::url()}}">
<meta property="og:url" content="{{Request::url()}}">

<link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
</head>

<body>
    @include('include.menu')

    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center dark-color contact-title">تواصل معنا:</h1>
                    <p class="text-center contact-title-sec red-color">966549485616 واتس اب </p>
                    <p class="text-center contact-title-sec red-color"><a class="red-color" href="mailto:info@shitrend.com">info@shitrend.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactSubmitForm" name="contactSubmitForm" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control form-group" id="fullName" name="fullName"
                                placeholder="الاسم الكامل">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control form-group" id="email" name="email"
                                placeholder="البريد الإلكتروني">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control form-group" id="message" name="message"
                                placeholder=" الرسالة" rows="3"></textarea>
                        </div>
                        <div class="field-group">
                            <button class="btn btn-success btn-form" type="submit">
                                <span>ارسال</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('include.footer')
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/contact.js')}}"></script>
</body>

</html>
