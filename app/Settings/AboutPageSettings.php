<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutPageSettings extends Settings
{
    // Section 1: About Company
    public ?string $about_title_en = '';
    public ?string $about_title_ar = '';
    public ?string $about_description_en = '';
    public ?string $about_description_ar = '';
    public ?string $about_image = '';
    public bool $is_about_active =true ;

    // Section 2: Our Values
    public ?string $values_title_en = '';
    public ?string $values_title_ar = '';
    public ?string $values_subtitle_en = '';
    public ?string $values_subtitle_ar = '';
    public ?array $values = []; // Array of value items
    public bool $is_values_active = true;

    // Section 3: Cool Facts
    public ?string $facts_background_image = '';
    public ?array $facts = []; // Array of fact items
    public bool $is_facts_active = true;

    // Section 4: Manufacturing Process
    public ?string $process_title_en = '';
    public ?string $process_title_ar = '';
    public ?string $process_subtitle_en = '';
    public ?string $process_subtitle_ar = '';
    public ?array $process_steps = []; // Array of process steps
    public ?string $process_image = '';
    public bool $is_process_active = true;

    public static function group(): string
    {
        return 'about_page';
    }

    public static function name(): string
    {
        return 'about_page_settings';
    }
}
