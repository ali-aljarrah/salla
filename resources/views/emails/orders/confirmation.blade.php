@component('mail::layout', ['rtl' => true])
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

<!-- RTL Email Content -->
<div style="direction: rtl; text-align: right; font-family: 'Tahoma', Arial, sans-serif;">

@component('mail::message')
# تأكيد استلام طلب جديد

- **رقم الطلب:** #{{ $orderData['order_id'] }}
- **تاريخ الطلب:** {{ $orderData['order_date'] }}
- **اسم العميل:** {{ $orderData['fullname'] }}
- **رقم الهاتف:** {{ $orderData['phone'] }}

@component('mail::panel')
## تفاصيل الطلب

- **المنتج:** {{ $orderData['product']['name'] }}
- **العرض المختار:** {{ $orderData['product_option'] }} {{ number_format($orderData['product']['price'], 2) }} {{ $orderData['currency'] }}
- **سعر المنتج:** {{ number_format($orderData['product']['price'], 2) }} {{ $orderData['currency'] }}

@if($orderData['has_shipping_fee'])
- **رسوم الشحن:** {{ number_format($orderData['shipping_fee'], 2) }} {{ $orderData['currency'] }}
@endif

**المبلغ الإجمالي:** {{ number_format($orderData['total'], 2) }} {{ $orderData['currency'] }}
@endcomponent

**عنوان التوصيل:**
{{ $orderData['address'] }}


شكراً لكم،
فريق {{ config('app.name') }}
@endcomponent

</div>
