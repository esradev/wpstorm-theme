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
        add_action('admin_enqueue_scripts', [$this, 'load_main_assets']);
        add_action('wp_enqueue_scripts', [$this, 'load_main_assets']);
        add_action('wp_enqueue_scripts', [$this, 'load_assets']);
    }

    public function load_main_assets() {
        wp_enqueue_script('wpstormthemejs', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0.0', true);
        wp_enqueue_style('wpstormthemecss', get_theme_file_uri('/build/index.css'));
        wp_localize_script('wpstormthemejs', 'wpstorm_theme_script_vars', array(
            'admin_ajax_url' => admin_url('admin-ajax.php'),
        ));
    }

    public function load_assets()
    {
        wp_enqueue_script('header-script', get_template_directory_uri() . '/assets/js/header-script.js', array('jquery'), null, true);

        //remove_woocommerce_styles
        if (class_exists('WooCommerce')) {
            wp_dequeue_style('woocommerce-general');
            wp_dequeue_style('woocommerce-layout');
            wp_dequeue_style('woocommerce-smallscreen');
            wp_dequeue_style('woocommerce_frontend_styles');
        }

        if (is_cart()) { // Only load the script on the cart page
            wp_enqueue_script('cart-script', get_template_directory_uri() . '/woocommerce/templates/cart/cart-script.js', array('jquery'), null, true);
        }
    }
}

Wpstorm_Theme_Assets::get_instance();