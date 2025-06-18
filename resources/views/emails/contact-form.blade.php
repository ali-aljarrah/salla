@component('mail::layout', ['rtl' => true])
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

<!-- RTL Email Content -->
<div style="direction: rtl; text-align: right; font-family: 'Tahoma', Arial, sans-serif;">

@component('mail::message')
<div style=" text-align: right; font-size: 16px;">
    <div style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
        رسالة طلب تواصل
    </div>

    الاسم الكامل: {{ $formData['name'] }}
    البريد الالكتروني: {{ $formData['email'] }}

    تفاصيل الرسالة
    {{ $formData['message'] }}


    شكراً لكم،
    فريق {{ config('app.name') }}
</div>
@endcomponent

</div>
