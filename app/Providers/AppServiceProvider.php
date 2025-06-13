<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
       Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $client = new \GuzzleHttp\Client();

            $response = $client->post(
                'https://www.google.com/recaptcha/api/siteverify',
                [
                    'form_params' => [
                        'secret' => config('services.recaptcha.secret_key'),
                        'response' => $value,
                        'remoteip' => request()->ip()
                    ]
                ]
            );

            $body = json_decode((string)$response->getBody());
            return $body->success;
        });

        // Add custom error message for recaptcha
        Validator::replacer('recaptcha', function ($message, $attribute, $rule, $parameters) {
            return __('validation.recaptcha');
        });
    }
}
