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

class Wpstorm_Templates
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

    }


    public static function get_header_template()
    {
        // TODO: Get the template_name from what admin want by get_option('header_template')
        $template_name = 'header-one';
        return 'template-parts/headers/' . $template_name;
    }

    public static function get_footer_template()
    {
        // TODO: Get the template_name from what admin want by get_option('footer_template')
        $template_name = 'footer-one';
        return 'template-parts/footers/' . $template_name;
    }

    public static function get_404_template()
    {
        // TODO: Get the template_name from what admin want by get_option('404_template')
        $template_name = '404-split-img';
        return 'template-parts/404/' . $template_name;
    }

    public static function get_post_list_template()
    {
        // TODO: Get the template_name from what admin want by get_option('post_list_template')
        $template_name = 'list-2';
        return 'template-parts/posts/lists/' . $template_name;
    }

    public static function get_hero_section_template()
    {
        // TODO: Get the template_name from what admin want by get_option('hero_section_template')
        $template_name = 'simple-centered';
        return 'template-parts/sections/heroes/' . $template_name;
    }

    public static function get_paginate_template()
    {
        $template_name = 'card-paginate';
        return 'template-parts/paginate/' . $template_name;
    }

}

Wpstorm_Templates::get_instance();