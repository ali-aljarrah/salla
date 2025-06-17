toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

$("#contactSubmitForm").on("submit", function (e) {
    e.preventDefault();

    var $form = $(this);
    const $submitBtn = $(this).find('[type="submit"]');
    $submitBtn.prop("disabled", true).text("جاري الارسال...");

    // Get form values
    var fullname = $("#fullName").val().trim();
    var email = $("#email").val().trim();
    var message = $("#message").val().trim();

    // Clear previous errors
    $(".error-message").remove();
    $(".is-invalid").removeClass("is-invalid");

    var isValid = true;

    // if (!fullname) {
    //     showFieldError("fullName", "الرجاء ادخال الاسم الكامل");
    //     isValid = false;
    // }

    // if (!email) {
    //     showFieldError("email", "الرجاء ادخال البريد الالكتروني");
    //     isValid = false;
    // } else if (!isValidEmail(email)) {
    //     showFieldError(
    //         "email",
    //         "الرجاء ادخال بريد الكتروني صالح"
    //     );
    //     isValid = false;
    // }

    // if (!message) {
    //     showFieldError("message", "الرجاء ادخال الرسالة");
    //     isValid = false;
    // }

    // if (!isValid) {
    //     $submitBtn.prop("disabled", false).text("ارسال");
    //     toastr.error("الرجاء تصحيح الأخطاء في النموذج");
    //     return;
    // }

    // AJAX request
    $.ajax({
        url: $form.attr("action"),
        type: "POST",
        dataType: "json",
        data: $form.serialize(),
        success: function (response) {
            if (response.success) {
                $form[0].reset();
                $submitBtn.prop("disabled", false).text("ارسال");
                toastr.error("شكرا لرسالتكم! سيتم التواصل معكم قريبا.");
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                // Laravel validation errors
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (field, messages) {
                    var fieldName = field.replace(".", "-");
                    showFieldError(fieldName, messages.join(" "));
                });
                toastr.error("الرجاء تصحيح الأخطاء في النموذج");
            } else {
                toastr.error("حدث خطأ في الخادم، الرجاء المحاولة لاحقاً");
            }
        },
        complete: function () {
            $submitBtn.prop("disabled", false).text("ارسال");
        },
    });
});

function isValidEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

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
