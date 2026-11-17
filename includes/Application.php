<?php

namespace WeDevs\Academy;

class Application {

    /**
     * Singleton Instance
     */
    private static ?self $instance = null;

    /**
     * প্রাইভেট কনস্ট্রাক্টর
     */
    private function __construct() {
        $this->bootProviders();
    }

    /**
     * Application এর ইনস্ট্যান্স রিটার্ন করার মেথড
     */
    public static function getInstance(): self {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * সিস্টেমের সমস্ত সার্ভিস প্রোভাইডারগুলো এখানে রেজিস্টার করা হলো
     */
    private function bootProviders(): void {
        // আমরা পরবর্তী ধাপে এই প্রোভাইডার ক্লাসগুলো তৈরি করব
        $providers = [
            \WeDevs\Academy\Admin::class, // আপনার existing ক্লাসটিকে আমরা প্রোভাইডার বানাব
            \WeDevs\Academy\Frontend::class, // existing ক্লাসটিকে প্রোভাইডার বানাব
        ];

        foreach ( $providers as $provider ) {
            if ( class_exists( $provider ) && method_exists( $provider, 'register' ) ) {
                (new $provider())->register();
            }
        }
    }
}