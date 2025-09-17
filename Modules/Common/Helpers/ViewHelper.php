<?php

namespace Modules\Common\Helpers;

use Carbon\Carbon;

class ViewHelper
{
    public static function formatCustomDate($date, $format = 'd M Y'): string
    {
        try {
            return $date ? Carbon::parse($date)->format($format) : '';
        } catch (\Exception $e) {
            return '';
        }
    }

    public static function currencySymbol($currencyCode): string
    {
        return match (strtoupper($currencyCode)) {
            'USD' => '$',
            'EUR' => '€',
            'INR' => '₹',
            'GBP' => '£',
            'CAD' => 'C$',
            'JPY' => '¥',
            default => $currencyCode,
        };
    }
}
