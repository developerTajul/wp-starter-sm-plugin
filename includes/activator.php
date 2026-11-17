<?php

namespace WeDevs\Academy;

class Activator {

    /**
     * প্লাগিন অ্যাক্টিভেশনের সময় ডেটাবেস স্কিমা বা ভার্সন সেভ করার মেথড
     */
    public static function activate(): void {
        $version = defined('WD_ACADEMY_VERSION') ? WD_ACADEMY_VERSION : '1.0.0';
        
        update_option( 'wedevs_academy_version', $version );
        add_option( 'wedevs_academy_activation', time() );
    }
}