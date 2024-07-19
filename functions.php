<?php
// Include required WordPress function files
include_once( ABSPATH . WPINC . '/post.php' ); // wp_delete_post
include_once( ABSPATH . 'wp-admin/includes/bookmark.php' ); // wp_delete_link
include_once( ABSPATH . 'wp-admin/includes/comment.php' ); // wp_delete_comment
include_once( ABSPATH . 'wp-admin/includes/user.php' ); // wp_delete_user, get_blogs_of_user

require_once get_theme_file_path('/inc/wpstorm-constants.php');
require_once get_theme_file_path('/inc/wpstorm-helpers.php');
require_once get_theme_file_path('/inc/wpstorm-rest.php');
require_once get_theme_file_path('/inc/wpstorm-activation.php');
require_once get_theme_file_path('/inc/wpstorm-ajax.php');

require_once get_theme_file_path('/inc/wpstorm-core.php');
require_once get_theme_file_path('/inc/wpstorm-assets.php');
require_once get_theme_file_path('/inc/wpstorm-options.php');

require_once get_theme_file_path('/inc/wpstorm-menus.php');
require_once get_theme_file_path('/inc/wpstorm-support.php');
require_once get_theme_file_path('/inc/wpstorm-customizer.php');
require_once get_theme_file_path('/inc/wpstorm-templates.php');

// require_once get_theme_file_path('/inc/wpstorm-woocommerce.php');