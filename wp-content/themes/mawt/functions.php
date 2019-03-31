<?php
/**
 * My Awesome WordPress Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage mawt
 * @since 1.0.0
 * @version 1.2.0
 */

// Inyeccion de Estilos y Scripts en la WordPress Navegacion
if (!function_exists('mawt_scripts') ):
    function mawt_scripts()
    {
        // Estilos
        wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,700', array(), '1.0.0', 'all' );
        wp_register_style('style', get_stylesheet_uri(), array('google-fonts'), '1.0.0', 'all');        
        wp_enqueue_style('google-fonts');
        wp_enqueue_style('style');

        // Scripts
        wp_register_script('script', get_template_directory_uri().'/script.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('script');
    }
endif;
add_action('wp_enqueue_scripts', 'mawt_scripts');

// Inyeccion en soporte de temas en la WordPress Navegacion
if (!function_exists('mawt_setup')):
    function mawt_setup()
    {
        // Soporte para traducciones
        // https://developer.wordpress.org/themes/functionality/internationalization/
        // https://make.wordpress.org/polyglots/handbook/
        // Herramientas
        // https://www.icanlocalize.com/tools/php_scanner
        // https://poedit.net/
        load_theme_textdomain('mawt', get_template_directory_uri(),'/languages');

        //https://developer.wordpress.org/reference/functions/add_theme_support/
        add_theme_support('post-thumbnails');
        //add_image_size( name, width, height, crop );

        add_theme_support('html5', array(
            'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'
        ));

        // Configuración de logo personalizados
        add_theme_support('custom-logo',array(
            'height' => 100,
            'width' => 100,
            'flex-height' => true,
            'flex-width' => true,
        ));
        add_theme_support('custom-background', array(
            'default-color' => 'DDD',
            'default-image' => get_template_directory_uri().'/img/background-img.png',
            'default-repeat' =>'repeat',
            'default-position-x' => '',
            'default-position-y' => '',
            'default-size' => '',
            'default-attachment' => 'fixed'
            
        ));

        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'mawt_setup');

// Inyeccion de menú navegacion en la WordPress Navegacion
if (!function_exists('mawt_menus')):
    function mawt_menus()
    {
        register_nav_menus(array(
            'main_menu' => __('Menú Principal', 'mawt'),
            'social_menu' => __('Menú Redes Sociales', 'mawt')
        ));
    }
endif;
add_action('init', 'mawt_menus');

// Wigets
if (!function_exists('mawt_register_sidebars')):
    function mawt_register_sidebars()
    {
        register_sidebar(array(
            'name' => __('Sidebar Principal', 'mawt'),
            'id' => 'main_sidebar',
            'description' => __('Este es el sidebar principal', 'mawt'),
            'before_widget' => '<article id="%1$s" class="Widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
        register_sidebar(array(
            'name' => __('Sidebar de pie de pagina', 'mawt'),
            'id' => 'footer_sidebar',
            'description' => __('Este es el sidebar del pie', 'mawt'),
            'before_widget' => '<article id="%1$s" class="Widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
    }
endif;

add_action('widgets_init', 'mawt_register_sidebars');

require_once get_template_directory().'/inc/custom-header.php';
require_once get_template_directory().'/inc/customizer.php';
require_once get_template_directory().'/inc/custom-login.php';
require_once get_template_directory().'/inc/custom-admin.php';

?>