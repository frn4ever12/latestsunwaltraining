<?php

if (!function_exists('get_detail')) {
    /**
     * Get a site setting by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function get_detail( $default = null)
    {
        // Fetch the setting from the database or cache
        $details = \App\Models\Organization::first();
    
        return $details ?? $default;
    }
}
