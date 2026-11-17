<?php 
/**
 * Plugin Name: WeDevs Academy
 * Plugin URI: https://wedevs.com/
 * Description: WeDevs Academy is a medium label WordPres Starter Plugin
 * Version: 1.0.0
 * Author: Tajul Islam
 * Author URI: https://wedevs.com/
 * License: GPLv2 or later
 */
if(! defined('ABSPATH' ) ){
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

final class WeDevs_Academy{

    static $version = '1.0.0';

    private function __construct(){
        $this->define_constants();

        register_activation_hook(__FILE__, array($this, 'activate'));

        add_action('plugins_loaded', array($this, 'init_plugins'));
    }

    public static function init(){

        static $instance = false;

        if(! $instance){
            $instance = new self();
        }

        return $instance;
    }

    public function init_plugins(){
       if ( is_admin() ) {
            new WeDevs\Academy\Admin();
        } else {
            new WeDevs\Academy\Frontend();
        }
    }

    public function define_constants(){
        define('WP_ACADEMY_VERSION', self::$version);
        define('WP_ACADEMY_FILE', __FILE__);
        define('WP_ACADEMY_PATH', __DIR__);
        define('WP_ACADEMY_URL', plugins_url('', WP_ACADEMY_FILE));
        define('WP_ACADEMY_ASSETS', WP_ACADEMY_URL . '/assets/');
    }


    public function activate(){
        update_option('wedevs_academy_version', self::$version);
        add_option('wedevs_academy_activation', time());
    }
}


function wedevs_academy(){
    return WeDevs_Academy::init();
}

wedevs_academy();