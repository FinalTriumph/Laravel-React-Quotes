<?php

if (!function_exists('navItemAvailable')) {
    function navItemAvailable(array $item): bool
    {
        return $item['scope'] === 'all'
            || ($item['scope'] === 'guest' && auth()->guest())
            || ($item['scope'] === 'auth' && auth()->check());
    }
}
