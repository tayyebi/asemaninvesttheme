<?php

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if (!isset($content_width))
    $content_width = 800; /* pixels */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
if (!function_exists('asemaninvesttheme_setup')) :

    function asemaninvesttheme_setup()
    {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('myfirsttheme', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        // add_theme_support( 'automatic-feed-links' );

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        /**
         * To enable the use of a custom logo in your theme
         */

        add_theme_support('custom-logo');

        /**
         * 
         * Add required pages
         * 
         * TODO:
         * check if exist
         * 
         * TODO:
         * 
         * about
         * contact
         * archive
         * 
         */
        // $aboutpage = array(
        //     'post_type'    => 'page',
        //     'post_title'    => 'درباره ما',
        //     'post_content'  => '',
        //     'post_status'   => 'publish',
        //     'post_author'   => 1
        // );
        // // Insert the post into the database
        // $homepage_id =  wp_insert_post($aboutpage);
        // //set the page template 
        // //assuming you have defined template on your-template-filename.php
        // update_post_meta($homepage_id, '_wp_page_template', 'your-template-filename.php');
    }

endif;
// run setup
add_action('after_setup_theme', 'asemaninvesttheme_setup');


/**
 * Combines all enqueued scripts and styles into a single function, and then call them using the wp_enqueue_scripts action.
 */
function add_theme_scripts()
{
    if (is_home() || is_front_page()) :
    // todo
    endif;

    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), '1.1', 'all');
    wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css', array(), '1.1', 'all');
    wp_enqueue_style('animations', get_template_directory_uri() . '/assets/css/animations.css', array(), '1.1', 'all');

    wp_enqueue_script('animate', get_template_directory_uri() . '/assets/js/animate.js', array('jquery'), 1.1, false);
    wp_enqueue_script('slider', get_template_directory_uri() . '/assets/js/slider.js', array('jquery'), 1.1, false);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

/**
 * 
 * TODO: Check these functions
 * TODO: Check this out: _e()
 * 
 * The translations in WordPress are saved in .po and .mo files which need to be loaded.
 * They can be loaded by using the functionsload_theme_textdomain() or load_child_theme_textdomain(). This loads {locale}.mo from your theme’s base directory or
 * {text-domain}-{locale}.mo from the WordPress theme language folder in
 * /wp-content/languages/themes/.
 */

// function my_theme_load_theme_textdomain() {
//     load_theme_textdomain( 'asemaninvest', get_template_directory() . '/languages' );
// }
// add_action( 'after_setup_theme', 'my_theme_load_theme_textdomain' );


/**
 * 
 * Favicon
 * 
 */
function my_favicon()
{
    echo '<link rel="shortcut icon" href="' . get_site_icon_url() . '" >';
}
add_action('wp_head', 'my_favicon');


/**
 * 
 * Side bar
 * 
 */

function my_widgets_init()
{
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __('Primary Sidebar'),
            'description'   => __('A short description of the sidebar.'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'my_widgets_init');


/**
 * 
 * Custom options
 * 
 */
function theme_settings()
{
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }
    echo "Hello, world!";
}
function setup_theme_admin_menus()
{
    add_submenu_page('themes.php', 'Settings', 'Aseman Theme Settings', '1', 'aseman-settings', 'theme_settings');
}
add_action("admin_menu", "setup_theme_admin_menus");

/**
 * 
 * Menus
 * 
 */
function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'extra-menu' => __('Extra Menu')
        )
    );
}
add_action('init', 'register_my_menus');
