<?php

if (! function_exists('generate_image_url')) {
    function generate_image_url(string $url = null) {
        return "/storage/{$url}";
    }
}