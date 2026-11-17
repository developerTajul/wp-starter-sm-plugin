<?php

namespace WeDevs\Academy;

/**
 * The Frontend Service Provider class
 */
class Frontend {

    /**
     * প্রোভাইডার রেজিস্টার এবং বুট করার মেথড
     */
    public function register(): void {
        // ১. কনটেক্সট চেকিং: যদি অ্যাডমিন প্যানেল হয় (এবং AJAX না হয়), তবে ফ্রন্টএন্ড লোড হবে না
        if ( is_admin() && ! wp_doing_ajax() ) {
            return;
        }

        // ২. শর্ত পূরণ হলে ফ্রন্টএন্ডের কাজ শুরু হবে
        new Frontend\Shortcode();
    }
}