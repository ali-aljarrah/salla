<?php

if (!function_exists('arabicSlug')) {
    function arabicSlug($string) {
        // Replace spaces with dashes
        $string = str_replace(' ', '-', $string);

        // Remove special characters (optional, depending on your requirements)
        $string = preg_replace('/[^\p{Arabic}\p{N}\s-]/u', '', $string);

        // Trim dashes from the beginning and end
        $string = trim($string, '-');

        return $string;
    }
}
