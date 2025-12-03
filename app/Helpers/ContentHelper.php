<?php

namespace App\Helpers;

use App\Models\Setting;

class ContentHelper
{
    public static function getSetting($key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
    public static function getHeroBannerText()
    {
        return self::getSetting('hero_banner_text', 'Jelajahi Dunia dengan eSIM Roaming Anti Ribet!');
    }
    public static function getHeroBannerImage()
    {
        return asset('resources/assets/img/hero-img.avif');
    }
    public static function getHeroPromo()
    {
        return self::getSetting('hero_promo', 'PROMO SPESIAL');
    }
    public static function getHeroDiscount()
    {
        return self::getSetting('hero_discount', 'Diskon 20% untuk Pelanggan Baru!');
    }
    public static function getHeroStats()
    {
        return [
            'countries' => self::getSetting('hero_stat_countries', '100+'),
            'users' => self::getSetting('hero_stat_users', '50K+'),
            'rating' => self::getSetting('hero_stat_rating', '4.9★'),
        ];
    }
}
