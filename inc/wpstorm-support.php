<?php
/**
 * Wpstorm_Support
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Support
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
        add_action('after_setup_theme', [$this, 'wpstorm_theme_add_supports']);
    }

    public function wpstorm_theme_add_supports()
    {
        add_theme_support('custom-logo', array(
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
        ));

        add_theme_support('post-thumbnails');

    }
}

Wpstorm_Support::get_instance();