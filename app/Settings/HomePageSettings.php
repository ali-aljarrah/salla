<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomePageSettings extends Settings
{
    // Hero Section
    public string $hero_title_en = '';//
    public string $hero_title_ar = '';//
    public string $hero_discreption_en = '';//
    public string $hero_discreption_ar = '';//
    public ?string $hero_image = ''; //
    public string $hero_btn1_text_en = '';//
    public string $hero_btn1_text_ar = '';//
    public string $hero_btn1_link = '#';//
    public string $hero_btn2_text_en = '';//
    public string $hero_btn2_text_ar = '';//
    public string $hero_btn2_link = '#';//
    public bool $is_hero_active = true;//

    // Benefits Section
    public array $benefits = [];//
    public bool $is_benefits_active = true;//

    // About Section
    public string $about_title_en = '';//
    public string $about_title_ar = '';//
    public string $about_description_en = '';//
    public string $about_description_ar = '';//
    public ?string $about_image = '';//
    public bool $is_about_active = true;//

    public static function group(): string
    {
        return 'home_page';
    }

    public static function name(): string
    {
        return 'home_page_settings'; // Must match migration name
    }
}
