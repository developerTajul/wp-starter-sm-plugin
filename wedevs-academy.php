<?php
/**
 * Plugin Name: WeDevs Academy
 * Plugin URI: https://wedevs.com/
 * Description: WeDevs Academy is a medium label WordPress Starter Plugin
 * Version: 1.0.0
 * Author: Tajul Islam
 * Author URI: https://wedevs.com/
 * License: GPLv2 or later
 */

// ১. Strict Typing এনফোর্স করা
declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ২. Composer Autoloader লোড করা
require_once __DIR__ . '/vendor/autoload.php';

/**
 * ৩. গ্লোবাল কনস্ট্যান্ট ডিফাইন করা 
 * (কনস্ট্যান্টগুলো মেইন ফাইলে রাখাই বেস্ট প্র্যাকটিস, কারণ এগুলো পুরো অ্যাপ্লিকেশনে যেকোনো জায়গা থেকে লাগতে পারে)
 */
define( 'WD_ACADEMY_VERSION', '1.0.0' );
define( 'WD_ACADEMY_FILE', __FILE__ );
define( 'WD_ACADEMY_PATH', __DIR__ );
define( 'WD_ACADEMY_URL', plugins_url( '', __FILE__ ) );
define( 'WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets' );

/**
 * ৪. প্লাগিন অ্যাক্টিভেশন হুক
 * দায়িত্ব দেওয়া হলো আমাদের নতুন তৈরি করা Activator ক্লাসের হাতে
 */
register_activation_hook( __FILE__, [ \WeDevs\Academy\Activator::class, 'activate' ] );

/**
 * ৫. সিস্টেম বুটস্ট্র্যাপিং (Kernel / Application চালু করা)
 * plugins_loaded ইভেন্টে আমরা শুধু Application কে কল করে দিচ্ছি, বাকিটা সে বুঝবে!
 */
add_action( 'plugins_loaded', function() {
    \WeDevs\Academy\Application::getInstance();
});