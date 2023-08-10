<?php
/**
 * Wpstorm_Theme_Assets
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Theme_Assets
{
    public static $actual_link;
    /**
     * Instance
     *
     * @access private
     * @var object Class object.
     * @since 1.0.0
     */
    private static $instance;

    /**
     * Initiator
     *
     * @return object Initialized object of class.
     * @since 1.0.0
     */
    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'load_assets']);
    }

    public function load_assets()
    {
        wp_enqueue_script('wpstormthemejs', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0.0', true);
        wp_enqueue_style('wpstormthemecss', get_theme_file_uri('/build/index.css'));

        //remove_woocommerce_styles
        if (class_exists('WooCommerce')) {
            wp_dequeue_style('woocommerce-general');
            wp_dequeue_style('woocommerce-layout');
            wp_dequeue_style('woocommerce-smallscreen');
            wp_dequeue_style('woocommerce_frontend_styles');
        }
    }
}

Wpstorm_Theme_Assets::get_instance();