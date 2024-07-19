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
      add_action('rest_api_init', [$this, 'register_change_password_endpoint']);
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

    public function register_change_password_endpoint()
    {
        register_rest_route('wp/v2', '/users/(?P<id>\d+)/change-password', array(
            'methods'  => 'POST',
            'callback' => [$this, 'change_password'],
            'params' => [
                'id' => [
                    'description' => 'User ID',
                    'type' => 'integer',
                    'required' => true
                ],
                'current_password' => [
                    'description' => 'Current password',
                    'type' => 'string',
                    'required' => true
                ],
                'new_password' => [
                    'description' => 'New password',
                    'type' => 'string',
                    'required' => true
                ],
                'confirm_password' => [
                    'description' => 'Confirm password',
                    'type' => 'string',
                    'required' => true
                ]
            ]
        ));
    }

    /**
     * Change user password
     */
    public function change_password(WP_REST_Request $request)
    {
        $user = get_user_by('id', $request['id']);

        $current_password = $request['current_password'];
        $new_password = $request['new_password'];
        $confirm_password = $request['confirm_password'];

        // Check if current password is not set
        if (!isset($current_password) || empty($current_password)) {
            wp_send_json_error([
                'current_password' => 'Current password is required'
            ], 400);
        }

        // Check if current password is not correct
        if (!wp_check_password($current_password, $user->user_pass, $user->ID)) {
            wp_send_json_error([
                'current_password' => 'Current password is incorrect'
            ], 400);
        }

        // Check if password is not set
        if (!isset($new_password) || empty($new_password)) {
            wp_send_json_error([
                'new_password' => 'New password is required'
            ], 400);            
        }

        // Check if confirm password is not set
        if (!isset($confirm_password) || empty($confirm_password)) {
            wp_send_json_error([
                'confirm_password' => 'Confirm password is required'
            ], 400);
        }

        // Check if password and confirm password are not same
        if ($new_password !== $confirm_password) {
            wp_send_json_error([
                'confirm_password' => 'Password and confirm password do not match'
            ], 400);
        }

        wp_set_password($new_password, $user->ID);

        $response = [
            'status' => 200,
            'message' => 'Password changed successfully'
        ];

        wp_send_json_success($response);
        
    }

}

Wpstorm_Rest::get_instance();