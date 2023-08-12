<?php
/**
 * Wpstorm_Theme_Menus
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Theme_Menus
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
        add_action('after_setup_theme', [$this, 'wpstorm_theme_menus']);
    }

    public function wpstorm_theme_menus()
    {
        register_nav_menus(
            array(
                //Header Menus
                'primary-menu' => __('Primary Menu', 'wpstorm-theme'),
                'primary-mobile-menu' => __('Primary Mobile Menu', 'wpstorm-theme'),
                'user-profile-actions-menu' => __('User profile actions menu', 'wpstorm-theme'),

                //Footer Menus
                'footer-menu-1' => __('Footer Menu 1', 'wpstorm-theme'),
                'footer-menu-2' => __('Footer Menu 2', 'wpstorm-theme'),
                'footer-menu-3' => __('Footer Menu 3', 'wpstorm-theme'),
                'footer-menu-4' => __('Footer Menu 4', 'wpstorm-theme'),

                //Other Menus
                '404-menu' => __('404 Popular Pages Menu', 'wpstorm-theme'),
            )
        );

    }

    public static function get_menu_items_by_location($location) {
        $menu_name = wp_get_nav_menu_name($location);
        $menu_items = wp_get_nav_menu_items($menu_name);

        return $menu_items;
    }


    public static function has_submenu_items($menu_items, $parent_id)
    {
        foreach ($menu_items as $menu_item) {
            if ($menu_item->menu_item_parent == $parent_id) {
                return true;
            }
        }
        return false;
    }

    public static function get_submenu_items($menu_items, $parent_id)
    {
        $submenu_items = array();

        foreach ($menu_items as $menu_item) {
            if ($menu_item->menu_item_parent == $parent_id) {
                $submenu_items[] = $menu_item;
            }
        }

        return $submenu_items;
    }
}

Wpstorm_Theme_Menus::get_instance();
