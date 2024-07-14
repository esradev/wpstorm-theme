<?php

/**
 * Wpstorm_Theme_Rest
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Rest
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
      add_action('rest_api_init', [$this, 'register_rest_images']);       
    }

    public function register_rest_images()
    {
        register_rest_field(
            'post',
            'featured_image_src',
            array(
                'get_callback'    => [$this, 'get_rest_featured_image_src'],
                'update_callback' => null,
                'schema'          => null,
            )
        );
    }

    public function get_rest_featured_image_src($object, $field_name, $request)
    {
        if ($object['featured_media']) {
            $img = wp_get_attachment_image_src($object['featured_media'], 'full');
            return $img[0];
        }
        return false;
    }

}

Wpstorm_Rest::get_instance();