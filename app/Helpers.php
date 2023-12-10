<?php
if (!function_exists('generateShortUrl')) {
    function generateShortUrl($length = 6){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $shortUrl = '';

        for ($i = 0; $i < $length; $i++) {
            $shortUrl .= $characters[rand(0, $charactersLength - 1)];
        }

        while (\App\Models\Url::where('short_url', $shortUrl)->exists()) {
            $shortUrl = '';
            for ($i = 0; $i < $length; $i++) {
                $shortUrl .= $characters[rand(0, $charactersLength - 1)];
            }
        }

        return $shortUrl;
    }
}
