    @include('include.head')
    <title>شي تريند - تواصل</title>


</head>
  <body>
    @include('include.menu')

  <section class="py-3">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h2 class="text-center dark-color contact-title">تواصل معنا:</h2>
                  <p class="text-center contact-title-sec red-color">966549485616 واتس اب </p>
                  <p class="text-center contact-title-sec red-color">info@shitrend.com</p>
              </div>
          </div>
      </div>
  </section>

  <section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                  <input type="text" class="form-control form-group" id="exampleFormControlInput2" placeholder="الاسم الكامل">
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control form-group" id="exampleFormControlInput1" placeholder="البريد الإلكتروني">
                </div>
                <div class="mb-3">
                  <textarea class="form-control form-group" id="exampleFormControlTextarea1"  placeholder=" الرسالة" rows="3"></textarea>
                </div>
                <div class="field-group">
                  <button class="btn btn-success btn-form" type="submit">
                      <span>ارسال</span>
                  </button>
                </div>
            </div>
        </div>
    </div>
  </section>

    @include('include.footer')
  </body>
</html>
