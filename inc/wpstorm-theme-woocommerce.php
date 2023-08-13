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
        add_filter('single_template', [$this, 'single_product_template']);
        add_filter('template_include', [$this, 'cart_template']);
        add_filter('template_include', [$this, 'checkout_template']);
        add_filter('template_include', [$this, 'shop_template']);
        add_filter('template_include', [$this, 'my_account_template']);

        add_action('woocommerce_thankyou', [$this, 'thank_you_template']);




        add_action('wp_ajax_remove_cart_item', [$this, 'remove_cart_item']);
        add_action('wp_ajax_nopriv_remove_cart_item', [$this, 'remove_cart_item']); // Allow non-logged-in users to use the AJAX action
    }

    public function single_product_template($template)
    {
        if (is_singular('product')) {
            $template = get_template_directory() . '/woocommerce/templates/single-product.php';
        }
        return $template;
    }

    public function cart_template($template)
    {
        if (is_cart() && WC()->cart->is_empty()) {
            return get_template_directory() . '/woocommerce/templates/cart/empty-cart-template.php';
        } elseif (is_cart()) {
            return get_template_directory() . '/woocommerce/templates/cart/cart-template.php';
        }
        return $template;
    }

    public function checkout_template($template)
    {
        if (is_checkout()) {
            return get_template_directory() . '/woocommerce/templates/checkout/checkout-template.php';
        }
        return $template;
    }

    public function shop_template($template)
    {
        if (is_shop()) {
            $custom_template = get_template_directory() . '/woocommerce/templates/shop/shop-template.php';
            if (!empty($custom_template)) {
                return $custom_template;
            }
        }
        return $template;
    }

    public function my_account_template($template)
    {
        if (is_account_page()) {
            $custom_template = get_template_directory() . '/woocommerce/templates/my-account/my-account-template.php';
            if (!empty($custom_template)) {
                return $custom_template;
            }
        }
        return $template;
    }

    public function thank_you_template($order_id)
    {

        $order = wc_get_order($order_id);

        if ($order) {
            return get_template_directory() . '/woocommerce/templates/thank-you/thank-you-template.php';
        }
    }

    public function remove_cart_item()
    {
        if (isset($_POST['cart_item_key'])) {
            $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
            WC()->cart->remove_cart_item($cart_item_key);

            echo json_encode(array('success' => true));
        }
        wp_die();
    }
}

Wpstorm_Theme_Woocommerce::get_instance();
