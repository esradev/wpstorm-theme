<?php
/**
 * Wpstorm_Theme_Woocommerce
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Theme_Woocommerce
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
        // Override WooCommerce single product template
        add_filter('single_template', [$this, 'wpstorm_theme_single_product_template']);
    }

    public function wpstorm_theme_single_product_template($template)
    {
        if (is_singular('product')) {
            $template = get_template_directory() . '/woocommerce/templates/single-product.php';
        }
        return $template;
    }
}

Wpstorm_Theme_Woocommerce::get_instance();
