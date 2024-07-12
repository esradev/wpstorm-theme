<?php

/**
 * Wpstorm_Theme_Helpers
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Helpers
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
        
    }

    public static function get_svg_icon($icon_name, $class = '') {
      $icon_path = get_template_directory() . '/assets/icons/' . $icon_name . '.svg';
      
      if (file_exists($icon_path)) {
          $version = filemtime($icon_path);
          $icon_content = file_get_contents($icon_path);
          $icon_content .= '<!-- SVG Icon version: ' . $version . ' -->';

          // Add class to the SVG tag
          $icon_content = preg_replace('/<svg /', '<svg class="' . esc_attr($class) . '" ', $icon_content, 1);
          return $icon_content;
      } else {
          return '<!-- SVG Icon not found: ' . esc_html($icon_name) . ' -->';
      }
    }

}

Wpstorm_Helpers::get_instance();