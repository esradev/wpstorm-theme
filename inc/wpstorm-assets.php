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

class Wpstorm_Assets
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
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_main_assets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_main_assets']);
        add_action('wp_enqueue_scripts', [$this, 'load_assets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_fonts']);

        add_action('login_enqueue_scripts', [$this, 'enqueue_login_assets'], 10);
    }

    public function admin_enqueue_main_assets()
    {
        if (isset($_GET['page']) && $_GET['page'] === 'wpstorm-theme-settings') {
            wp_enqueue_script('wpstorm-theme-js', get_theme_file_uri('/build/index.js'), array('wp-element'), Wpstorm_Constants::VERSION, true);
            wp_enqueue_style('wpstorm-theme-css', get_theme_file_uri('/build/index.css'), [], Wpstorm_Constants::VERSION, 'all');
            wp_enqueue_style('wpstorm-theme-admin-styles', get_theme_file_uri('/assets/css/admin-styles.css'), [], Wpstorm_Constants::VERSION, 'all');
        }
    }

    public function enqueue_main_assets()
    {
        wp_enqueue_script('alpinejs', get_theme_file_uri('/build/alpine.js'), [], Wpstorm_Constants::VERSION, true);
        wp_enqueue_style('alpinjs-styles', get_theme_file_uri('/build/alpine.css'), [], Wpstorm_Constants::VERSION, 'all');

        wp_enqueue_script('wpstorm-theme-js', get_theme_file_uri('/build/index.js'), array('wp-element', 'wp-i18n'), Wpstorm_Constants::VERSION, true);
        wp_enqueue_style('wpstorm-theme-css', get_theme_file_uri('/build/index.css'), [], Wpstorm_Constants::VERSION, 'all');


        wp_localize_script('wpstorm-theme-js', 'wpstorm_theme_script_vars', array(
            'admin_ajax_url' => admin_url('admin-ajax.php'),
        ));

        wp_localize_script('alpinejs', 'alpine_wp_data', [
            'rest_url' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest'),
            'admin_ajax_url' => admin_url('admin-ajax.php'),
            'login_url' => wp_login_url(),
            'profile_url' => site_url('/user-profile'),
        ]);
    }

    public function load_assets()
    {

        //remove_woocommerce_styles
        if (class_exists('WooCommerce')) {
            wp_dequeue_style('woocommerce-general');
            wp_dequeue_style('woocommerce-layout');
            wp_dequeue_style('woocommerce-smallscreen');
            wp_dequeue_style('woocommerce_frontend_styles');
        }

        // if (is_cart()) { // Only load the script on the cart page
        //     wp_enqueue_script('cart-script', get_template_directory_uri() . '/woocommerce/templates/cart/cart-script.js', array('jquery'), Wpstorm_Constants::VERSION, true);
        // }
    }

    public function enqueue_fonts()
    {
        // TODO Get the font chosen by the admin, and store it in a variable
        //.Then load the CSS file of that font based on the selected font.
        // The name of all fonts in their CSS file must be Wpstorm.
        // Example: $selected_font = get_option('selected-font')
        // if ($selected_font !== 'default-font') {
        //   $font_file_url = get_template_directory_uri() . '/fonts/' . $selected_font . '/' . $selected_font . '.css';
        //   wp_enqueue_style('custom-font', $font_file_url);
        //  }
        // default-font can be the default one that you chose.

        $font_file_url = get_template_directory_uri() . '/assets/fonts/iran-sans/iran-sans.css';
        wp_enqueue_style('wpstorm-font', $font_file_url);
    }

    public function enqueue_login_assets()
    {
        wp_enqueue_style('wpstorm-login-css', get_theme_file_uri('/build/index.css'), [], Wpstorm_Constants::VERSION, 'all');
        $this->enqueue_fonts();
    }
}

Wpstorm_Assets::get_instance();