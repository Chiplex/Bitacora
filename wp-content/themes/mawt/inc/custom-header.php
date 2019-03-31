<?php
if(!function_exists('mawt_wp_header_style')):
    function mawt_wp_header_style()
    {
        $header_text_color = get_header_textcolor();
        echo '<style> .WP-Header-branding{ color: #'.esc_attr($header_text_color).' }</style>';

    } 
endif;

if(!function_exists('mawt_custom_header')):
    function mawt_custom_header()
    {
        add_theme_support('custom-header', apply_filters('mawt_custom_header_args', array(
            'default-image' => get_template_directory_uri().'/img/header-image.jpg',
            'default-text-color' => 'F60',
            'width' => 1200,
            'height' => 720,
            'flex-width' => true,
            'flex-height' => true,
            'video' => true,
            'wp-head-callback' => 'mawt_wp_header_style'
            // 'default-repeat' =>'repeat',
            // 'default-position-x' => '',
            // 'default-position-y' => '',
            // 'default-size' => '',
            // 'default-attachment' => 'fixed'
            )));
    }
endif;

add_action('after_setup_theme', 'mawt_custom_header');

?>

