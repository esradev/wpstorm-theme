<?php

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

function wpstorm_theme_load_assets()
{
    wp_enqueue_script('wpstormthemejs', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0.0', true);
    wp_enqueue_style('wpstormthemecss', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'wpstorm_theme_load_assets');


function wpstorm_theme_supports()
{
    register_nav_menu('primary-menu', __('Primary Menu', 'wpstorm-theme'));
    register_nav_menu('primary-mobile-menu', __('Primary Mobile Menu', 'wpstorm-theme'));
    register_nav_menu('footer-menu-1', __('Footer Menu 1', 'wpstorm-theme'));
    register_nav_menu('footer-menu-2', __('Footer Menu 2', 'wpstorm-theme'));
    register_nav_menu('footer-menu-3', __('Footer Menu 3', 'wpstorm-theme'));
    register_nav_menu('footer-menu-4', __('Footer Menu 4', 'wpstorm-theme'));

    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));
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