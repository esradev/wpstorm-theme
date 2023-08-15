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

class Wpstorm_Theme_Core
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
        add_action('admin_menu', [$this, 'add_theme_menu']);

        // Redirect subscriber accounts out of admin and onto homepage
        add_action('admin_init', [$this, 'redirect_subs_to_frontend']);
        add_action('wp_loaded', [$this, 'no_subs_admin_bar']);

//        add_action('login_init', [$this, 'redirect_to_custom_login']);
//        add_filter( 'login_url', [$this, 'custom_login_url'] );
//        add_filter( 'registration_url', [$this, 'custom_registration_url'] );
//        add_filter( 'template_include', [$this, 'login_page_template'] );
//
//        self::create_login_signup_page();
    }

    public function add_theme_menu() {
        add_menu_page('Wpstorm Theme Settings', 'Wpstorm Theme Settings', 'manage_options', 'wpstorm-theme-settings', [$this, 'settings_page']);
    }

    public function settings_page() {
        ?>
        <div class="wrap">
            <div id="wpstorm-theme-settings-dashboard" class="wpstorm-theme-tw-class"></div>
        </div>
        <?php
    }


    public function redirect_subs_to_frontend()
    {
        $ourCurrentUser = wp_get_current_user();

        if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
            wp_redirect(site_url('/'));
            exit;
        }
    }

    public function no_subs_admin_bar()
    {
        $ourCurrentUser = wp_get_current_user();

        if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
            show_admin_bar(false);
        }
    }

    public function redirect_to_custom_login()
    {
        if (!is_user_logged_in()) {
            wp_redirect(home_url('/login-signup/'));
            exit();
        }
    }

    public function custom_login_url( $login_url ) {
        return home_url( 'login-signup' ); // Replace with your page slug
    }

    public function custom_registration_url( $registration_url ) {
        return home_url( 'login-signup' ); // Replace with your page slug
    }

    function login_page_template( $template ) {
        if ( is_page( 'login-signup' ) ) { // Replace with the actual slug of your page
            return get_template_directory() . '/templates/login-template.php';
        }
        return $template;
    }

    public static function create_login_signup_page() {
        $page_content = ''; // You can set the initial content for the page if needed
        $page_slug = 'login-signup';

        // Check if the page doesn't exist already
        $page = get_page_by_path($page_slug);

        if (!$page) {
            // Set up the page arguments
            $page_args = array(
                'post_title' => 'Login & Signup',
                'post_content' => $page_content,
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => $page_slug
            );

            // Insert the page
            wp_insert_post($page_args);
        }
    }

    public static function get_header_template() {
        //TODO Get the template_name from what admin want by get_option('header_template')
        $template_name = 'header-one';
        return 'templates/headers/' . $template_name;
    }

    public static function get_footer_template() {
        //TODO Get the template_name from what admin want by get_option('footer_template')
        $template_name = 'footer-one';
        return 'templates/footers/' . $template_name;
    }

    public static function get_404_template(){
        //TODO Get the template_name from what admin want by get_option('404_template')
        $template_name = '404-split-img';
        return 'templates/404/' . $template_name;
    }

    public static function get_post_list_template(){
        //TODO Get the template_name from what admin want by get_option('post_list_template')
        $template_name = 'list-2';
        return 'templates/posts/lists/' . $template_name;
    }

}

Wpstorm_Theme_Core::get_instance();



