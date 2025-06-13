<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ServicesPageSettings extends Settings
{

    public ?array $services = [];

    public static function group(): string
    {
        return 'services_page';
    }

    public static function name(): string
    {
        return 'services_page_settings';
    }
}
