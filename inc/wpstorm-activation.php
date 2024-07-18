<?php

/**
 * Wpstorm_Activation
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Activation
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
      add_action('init', [$this, 'theme_activation']);
      add_action('template_redirect', [$this, 'theme_redirects']);
      add_filter('login_redirect', [$this, 'redirect_to_profile_page'], 10, 3);
    }

    /**
     * Theme activation
     */
    public function theme_activation()
    {
      $this->create_profile_page();
    }

    /**
     * Theme redirects
     */
    public function theme_redirects()
    {
      $this->redirect_to_login_page();
    }

    /**
     * Create profile page
     */
    public function create_profile_page()
    {
      $profile_page = get_page_by_path('user-profile');

      if (!$profile_page) {
        $profile_page = [
          'post_title' => 'User Profile',
          'post_name' => 'user-profile',
          'post_content' => '',
          'post_status' => 'publish',
          'post_type' => 'page',
          'page_template' => 'user-profile.php'
        ];

        wp_insert_post($profile_page);
      }
    }

    /**
     * Redirect to login page
     */
    public function redirect_to_login_page()
    {
      if (is_page('user-profile') && !is_user_logged_in()) {
        wp_redirect(wp_login_url());
        exit;
      }
    }
    
    /**
     * Redirect to profile page
     */
    public function redirect_to_profile_page($redirect_to, $request, $user)
    {
      if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('administrator', $user->roles)) {
          return admin_url();
        } else {
          return home_url('user-profile');
        }
      } else {
        return $redirect_to;
      }
    }

}

Wpstorm_Activation::get_instance();