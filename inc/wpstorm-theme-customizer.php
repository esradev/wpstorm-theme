<?php
/**
 * Wpstorm_Theme_Customizer
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Theme_Customizer
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
        add_action('customize_register', [$this, 'theme_customizer_settings']);

    }
    public function theme_customizer_settings($wp_customize)
    {
        // Add a section for Footer settings
        $wp_customize->add_section('footer_section', array(
            'title' => 'Footer',
            'priority' => 30,
        ));

        $wp_customize->add_setting('footer_company_description', array(
            'default' => 'Making the world a better place through constructing elegant hierarchies.',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('footer_company_description', array(
            'label' => 'Company Description:',
            'section' => 'footer_section',
            'type' => 'textarea',
        ));

        $wp_customize->add_setting('footer_newsletter_title', array(
            'default' => 'Subscribe to our newsletter',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('footer_newsletter_title', array(
            'label' => 'Footer newsletter title:',
            'section' => 'footer_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting('footer_newsletter_sub_title', array(
            'default' => 'The latest news, articles, and resources, sent to your inbox weekly.',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('footer_newsletter_sub_title', array(
            'label' => 'Footer newsletter sub-title:',
            'section' => 'footer_section',
            'type' => 'textarea',
        ));


        // Add a section for 404-page settings
        $wp_customize->add_section('404_page_section', array(
            'title' => '404 Page',
            'priority' => 30,
        ));

        $wp_customize->add_setting('404_heading', array(
            'default' => 'This page does not exist',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('404_heading', array(
            'label' => '404 Heading',
            'section' => '404_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting('404_sub_heading', array(
            'default' => 'Sorry, we couldn’t find the page you’re looking for.',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('404_sub_heading', array(
            'label' => '404 Sub Heading',
            'section' => '404_page_section',
            'type' => 'text',
        ));
    }
}

Wpstorm_Theme_Customizer::get_instance();