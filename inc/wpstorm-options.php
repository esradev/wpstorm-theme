<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Options
{
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
     * @since 1.0.0
     * @return object Initialized object of class.
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
        add_action('init', [$this, 'register_settings_options']);
    }

    /**
     * Register settings options.
     *
     * @return void
     * @since 1.0.0
     */
    public function register_settings_options()
    {
        $settings_options = '';
        add_option('wpstorm_settings_options', $settings_options);
    }

}
Wpstorm_Options::get_instance();
