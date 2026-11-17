<?php 

namespace WeDevs\Academy;

/**
 * The Admin Service Provider class
 */
class Admin {

    /**
     * প্রোভাইডার রেজিস্টার এবং বুট করার মেথড
     */
    public function register(): void {
        // ১. কনটেক্সট চেকিং: ক্লাস নিজেই চেক করবে তার লোড হওয়া উচিত কি না
        // যদি অ্যাডমিন প্যানেল না হয়, অথবা যদি কোনো AJAX রিকোয়েস্ট হয়, তবে আমরা অ্যাডমিন লোড করব না
        if ( ! is_admin() || wp_doing_ajax() ) {
            return;
        }

        // ২. শর্ত পূরণ হলে তবেই অ্যাডমিনের অন্যান্য ক্লাস ইনিশিয়ালাইজ হবে
        new Admin\Menu();
    }
}