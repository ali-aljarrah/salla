<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 15px; text-align: center; }
        .content { padding: 20px; }
        .footer { margin-top: 20px; font-size: 0.8em; color: #6c757d; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Form Submission</h2>
        </div>

        <div class="content">
            <p><strong>Name:</strong> {{ $formData['name'] }}</p>
            <p><strong>Email:</strong> <a href="mailto:{{ $formData['email'] }}">{{ $formData['email'] }}</a></p>
            @if(!empty($formData['subject']))
                <p><strong>Subject:</strong> {{ $formData['subject'] }}</p>
            @endif
            <p><strong>Message:</strong></p>
            <p>{{ $formData['message'] }}</p>
        </div>

        <div class="footer">
            <p>This message was sent via the contact form on {{ config('app.name') }} at {{ now()->format('Y-m-d H:i:s') }}.</p>
        </div>
    </div>
</body>
</html>
