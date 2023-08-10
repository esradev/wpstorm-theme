<?php

function wpstorm_theme_load_assets()
{
    wp_enqueue_script('wpstormthemejs', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0.0', true);
    wp_enqueue_style('wpstormthemecss', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'wpstorm_theme_load_assets');

function has_submenu_items($menu_items, $parent_id)
{
    foreach ($menu_items as $menu_item) {
        if ($menu_item->menu_item_parent == $parent_id) {
            return true;
        }
    }
    return false;
}

function get_submenu_items($menu_items, $parent_id)
{
    $submenu_items = array();

    foreach ($menu_items as $menu_item) {
        if ($menu_item->menu_item_parent == $parent_id) {
            $submenu_items[] = $menu_item;
        }
    }

    return $submenu_items;
}

function wpstorm_theme_supports()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu', 'wpstorm-theme'),
            'primary-mobile-menu' => __('Primary Mobile Menu', 'wpstorm-theme'),
            '404-menu' => __('404 Popular Pages Menu'),
            'footer-menu-1' => __('Footer Menu 1', 'wpstorm-theme'),
            'footer-menu-2' => __('Footer Menu 2', 'wpstorm-theme'),
            'footer-menu-3' => __('Footer Menu 3', 'wpstorm-theme'),
            'footer-menu-4' => __('Footer Menu 4', 'wpstorm-theme'),
        )
    );

    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));

    add_theme_support('post-thumbnails');

}

add_action('after_setup_theme', 'wpstorm_theme_supports');

// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend()
{
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar()
{
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}

function theme_customizer_settings($wp_customize)
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

add_action('customize_register', 'theme_customizer_settings');
