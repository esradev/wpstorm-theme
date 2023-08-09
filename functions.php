<?php

function has_submenu_items($menu_items, $parent_id) {
    foreach ($menu_items as $menu_item) {
        if ($menu_item->menu_item_parent == $parent_id) {
            return true;
        }
    }
    return false;
}



function get_submenu_items($menu_items, $parent_id) {
    $submenu_items = array();

    foreach ($menu_items as $menu_item) {
        if ($menu_item->menu_item_parent == $parent_id) {
            $submenu_items[] = $menu_item;
        }
    }

    return $submenu_items;
}

function pageBanner($args = NULL) {

    if (!$args['title']) {
        $args['title'] = get_the_title();
    }

    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle']; ?></p>
            </div>
        </div>
    </div>
<?php }

function wpstorm_theme_load_assets() {
    wp_enqueue_script('wpstormthemejs', get_theme_file_uri('/build/index.js'), array('wp-element'), '1.0.0', true);
    wp_enqueue_style('wpstormthemecss', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'wpstorm_theme_load_assets');


function wpstorm_theme_supports() {
    register_nav_menu('primary-menu', __('Primary Menu', 'wpstorm-theme'));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'wpstorm_theme_supports');


// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar() {
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}