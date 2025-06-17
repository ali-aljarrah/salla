<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other يساوي :value',
    'active_url' => ':attribute ليس عنوان URL صالحًا',
    'after' => 'يجب أن يكون :attribute تاريخًا بعد :date',
    'after_or_equal' => 'يجب أن يكون :attribute تاريخًا بعد أو يساوي :date',
    'alpha' => 'يجب أن يحتوي :attribute على أحرف فقط',
    'alpha_dash' => 'يجب أن يحتوي :attribute على أحرف وأرقام وشرطات فقط',
    'alpha_num' => 'يجب أن يحتوي :attribute على أحرف وأرقام فقط',
    'array' => 'يجب أن يكون :attribute مصفوفة',
    'ascii' => 'يجب أن يحتوي :attribute على أحارف أبجدية رقمية ذات بايت واحد ورموز فقط',
    'before' => 'يجب أن يكون :attribute تاريخًا قبل :date',
    'before_or_equal' => 'يجب أن يكون :attribute تاريخًا قبل أو يساوي :date',
    'between' => [
        'array' => 'يجب أن يحتوي :attribute على عدد عناصر بين :min و :max',
        'file' => 'يجب أن يكون حجم ملف :attribute بين :min و :max كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max',
        'string' => 'يجب أن يكون طول :attribute بين :min و :max حروف',
    ],
    'boolean' => 'يجب أن تكون قيمة :attribute صحيحة أو خاطئة',
    'can' => 'يحتوي :attribute على قيمة غير مصرح بها',
    'confirmed' => 'تأكيد :attribute غير متطابق',
    'contains' => 'الحقل :attribute لا يحتوي على القيمة المطلوبة',
    'current_password' => 'كلمة المرور غير صحيحة',
    'date' => ':attribute ليس تاريخًا صالحًا',
    'date_equals' => 'يجب أن يكون :attribute تاريخًا يساوي :date',
    'date_format' => 'لا يتطابق :attribute مع الصيغة :format',
    'decimal' => 'يجب أن يحتوي :attribute على :decimal منازل عشرية',
    'declined' => 'يجب رفض :attribute',
    'declined_if' => 'يجب رفض :attribute عندما يكون :other يساوي :value',
    'different' => 'يجب أن يكون :attribute و :other مختلفين',
    'digits' => 'يجب أن يحتوي :attribute على :digits أرقام',
    'digits_between' => 'يجب أن يحتوي :attribute على عدد أرقام بين :min و :max',
    'dimensions' => 'أبعاد صورة :attribute غير صالحة',
    'distinct' => 'يحتوي :attribute على قيمة مكررة',
    'doesnt_end_with' => 'يجب ألا ينتهي :attribute بأحد القيم التالية: :values',
    'doesnt_start_with' => 'يجب ألا يبدأ :attribute بأحد القيم التالية: :values',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالح',
    'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'enum' => 'القيمة المحددة لـ :attribute غير صالحة',
    'exists' => 'القيمة المحددة لـ :attribute غير صالحة',
    'extensions' => 'يجب أن يحتوي :attribute على أحد الامتدادات التالية: :values',
    'file' => 'يجب أن يكون :attribute ملفًا',
    'filled' => 'يجب أن يحتوي :attribute على قيمة',
    'gt' => [
        'array' => 'يجب أن يحتوي :attribute على أكثر من :value عناصر',
        'file' => 'يجب أن يكون حجم ملف :attribute أكبر من :value كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value',
        'string' => 'يجب أن يكون طول :attribute أكبر من :value حروف',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي :attribute على :value عناصر أو أكثر',
        'file' => 'يجب أن يكون حجم ملف :attribute أكبر من أو يساوي :value كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من أو تساوي :value',
        'string' => 'يجب أن يكون طول :attribute أكبر من أو يساوي :value حروف',
    ],
    'hex_color' => 'يجب أن يكون :attribute لونًا سداسيًا صالحًا',
    'image' => 'يجب أن يكون :attribute صورة',
    'in' => 'القيمة المحددة لـ :attribute غير صالحة',
    'in_array' => 'يجب أن يوجد :attribute في :other',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون :attribute عنوان IP صالحًا',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحًا',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحًا',
    'json' => 'يجب أن يكون :attribute نصًا JSON صالحًا',
    'list' => 'يجب أن يكون :attribute قائمة',
    'lowercase' => 'يجب أن يكون :attribute بأحرف صغيرة',
    'lt' => [
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عناصر',
        'file' => 'يجب أن يكون حجم ملف :attribute أقل من :value كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة :attribute أقل من :value',
        'string' => 'يجب أن يكون طول :attribute أقل من :value حروف',
    ],
    'lte' => [
        'array' => 'يجب ألا يحتوي :attribute على أكثر من :value عناصر',
        'file' => 'يجب أن يكون حجم ملف :attribute أقل من أو يساوي :value كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة :attribute أقل من أو تساوي :value',
        'string' => 'يجب أن يكون طول :attribute أقل من أو يساوي :value حروف',
    ],
    'mac_address' => 'يجب أن يكون :attribute عنوان MAC صالحًا',
    'max' => [
        'array' => 'يجب ألا يحتوي :attribute على أكثر من :max عناصر',
        'file' => 'يجب ألا يتجاوز حجم ملف :attribute :max كيلوبايت',
        'numeric' => 'يجب ألا تتجاوز قيمة :attribute :max',
        'string' => 'يجب ألا يتجاوز طول :attribute :max حروف',
    ],
    'max_digits' => 'يجب ألا يحتوي :attribute على أكثر من :max أرقام',
    'mimes' => 'يجب أن يكون :attribute ملفًا من نوع: :values',
    'mimetypes' => 'يجب أن يكون :attribute ملفًا من نوع: :values',
    'min' => [
        'array' => 'يجب أن يحتوي :attribute على الأقل :min عناصر',
        'file' => 'يجب أن يكون حجم ملف :attribute على الأقل :min كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة :attribute على الأقل :min',
        'string' => 'يجب أن يكون طول :attribute على الأقل :min حروف',
    ],
    'min_digits' => 'يجب أن يحتوي :attribute على الأقل :min أرقام',
    'missing' => 'يجب أن يكون :attribute مفقودًا',
    'missing_if' => 'يجب أن يكون :attribute مفقودًا عندما يكون :other يساوي :value',
    'missing_unless' => 'يجب أن يكون :attribute مفقودًا ما لم يكن :other يساوي :value',
    'missing_with' => 'يجب أن يكون :attribute مفقودًا عندما يكون :values موجودًا',
    'missing_with_all' => 'يجب أن يكون :attribute مفقودًا عندما تكون :values موجودة',
    'multiple_of' => 'يجب أن تكون قيمة :attribute مضاعفًا لـ :value',
    'not_in' => 'القيمة المحددة لـ :attribute غير صالحة',
    'not_regex' => 'صيغة :attribute غير صالحة',
    'numeric' => 'يجب أن يكون :attribute رقمًا',
    'password' => [
        'letters' => 'يجب أن يحتوي :attribute على حرف واحد على الأقل',
        'mixed' => 'يجب أن يحتوي :attribute على حرف كبير وحرف صغير على الأقل',
        'numbers' => 'يجب أن يحتوي :attribute على رقم واحد على الأقل',
        'symbols' => 'يجب أن يحتوي :attribute على رمز واحد على الأقل',
        'uncompromised' => 'ظهر :attribute في تسريب بيانات. يرجى اختيار :attribute مختلف',
    ],
    'present' => 'يجب أن يكون :attribute موجودًا',
    'present_if' => 'يجب أن يكون :attribute موجودًا عندما يكون :other يساوي :value',
    'present_unless' => 'يجب أن يكون :attribute موجودًا ما لم يكن :other يساوي :value',
    'present_with' => 'يجب أن يكون :attribute موجودًا عندما يكون :values موجودًا',
    'present_with_all' => 'يجب أن يكون :attribute موجودًا عندما تكون :values موجودة',
    'prohibited' => 'الحقل :attribute محظور',
    'prohibited_if' => 'الحقل :attribute محظور عندما يكون :other يساوي :value',
    'prohibited_if_accepted' => 'الحقل :attribute محظور عندما يكون :other مقبولاً',
    'prohibited_if_declined' => 'الحقل :attribute محظور عندما يكون :other مرفوضاً',
    'prohibited_unless' => 'الحقل :attribute محظور ما لم يكن :other في :values',
    'prohibits' => 'الحقل :attribute يحظر وجود :other',
    'regex' => 'صيغة :attribute غير صالحة',
    'required' => 'حقل :attribute مطلوب',
    'required_array_keys' => 'يجب أن يحتوي :attribute على مدخلات لـ: :values',
    'required_if' => 'حقل :attribute مطلوب عندما يكون :other يساوي :value',
    'required_if_accepted' => 'حقل :attribute مطلوب عندما يتم قبول :other',
    'required_if_declined' => 'حقل :attribute مطلوب عندما يتم رفض :other',
    'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other في :values',
    'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجودًا',
    'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة',
    'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أي من :values موجودة',
    'same' => 'يجب أن يتطابق :attribute مع :other',
    'size' => [
        'array' => 'يجب أن يحتوي :attribute على :size عناصر',
        'file' => 'يجب أن يكون حجم ملف :attribute :size كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size',
        'string' => 'يجب أن يكون طول :attribute مساويًا لـ :size حروف',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'string' => 'يجب أن يكون :attribute نصًا',
    'timezone' => 'يجب أن يكون :attribute منطقة زمنية صالحة',
    'unique' => 'تم استخدام :attribute مسبقًا',
    'uploaded' => 'فشل تحميل :attribute',
    'uppercase' => 'يجب أن يكون :attribute بأحرف كبيرة',
    'url' => 'يجب أن يكون :attribute عنوان URL صالحًا',
    'ulid' => 'يجب أن يكون :attribute ULID صالحًا',
    'uuid' => 'يجب أن يكون :attribute UUID صالحًا',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'fullname' => 'الاسم الكامل',
        'fullName' => 'الاسم الكامل',
        'email' => 'البريد الاكتروني',
        'message' => 'الرسالة',
        'phone' => 'رقم الهاتف',
        'address' => 'العنوان',
        'product_option_id' => 'عرض السعر',
        // Add more custom attributes as needed
    ],

];
