<?php
/**
 * Wpstorm_Theme_Core
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Theme_Core
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
        // Redirect subscriber accounts out of admin and onto homepage
        add_action('admin_init', [$this, 'redirect_subs_to_frontend']);
        add_action('wp_loaded', [$this, 'no_subs_admin_bar']);
    }

    public function redirect_subs_to_frontend()
    {
        $ourCurrentUser = wp_get_current_user();

        if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
            wp_redirect(site_url('/'));
            exit;
        }
    }

    public function no_subs_admin_bar()
    {
        $ourCurrentUser = wp_get_current_user();

        if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
            show_admin_bar(false);
        }
    }
}

Wpstorm_Theme_Core::get_instance();



