<?php
//https://codex.wordpress.org/Dashboard_Widgets_API
//https://codex.wordpress.org/Plugin_API/Admin_Screen_Reference
//https://codex.wordpress.org/Administration_Screens
//https://codex.wordpress.org/Adding_Administration_Menus

// Inyeccion de Estilos y Scripts en la Pagina de administración
if (!function_exists('mawt_admin_scripts')) :
    function mawt_admin_scripts()
    {
        // Estilos
        wp_register_style('custom-properties', get_stylesheet_directory_uri().'/css/custom_properties.css', array(), '1.0.0', 'all');
        wp_register_style('admin-page-style', get_template_directory_uri().'/css/admin_page.css', array(), '1.0.0', 'all');
        wp_enqueue_style('custom-properties');
        wp_enqueue_style('admin-page-style');

        // Scripts
        wp_register_script('admin-page-script', get_template_directory_uri().'/js/admin_page.js', array('jquery'), '1.0.0', TRUE);
        wp_enqueue_script('jquery');
        wp_enqueue_script('admin-page-script');
    }
endif;
add_action('admin_enqueue_scripts', 'mawt_admin_scripts');

// Inyeccion de Estilos en la Pagina de edicion de entrada de Post
if (!function_exists('mawt_add_editor_styles')) :
    function mawt_add_editor_styles()
    {        
        add_editor_style( 'https://fonts.googleapis.com/css?family=Raleway:400,700' );
        add_editor_style( 'css/custom_properties.css' );
        add_editor_style( 'css/custom_editor_style.css' );
    }
endif;
add_action('admin_init', 'mawt_add_editor_styles');

// Inyeccion de la eliminacion de las opciones del menu del administrador
if (!function_exists('mawt_admin_menu')) :
    function mawt_admin_menu()
    {        
        remove_menu_page('edit.php'); // Entradas
        remove_menu_page('upload.php'); // Multimedia
        remove_menu_page('link-manager.php'); // Enlaces
        remove_menu_page('edit.php?post_type=page.php'); //Páginas
        remove_menu_page('edit-comments.php'); // Comentarios
        remove_menu_page('themes.php'); // Apariencia
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Usuarios
        remove_menu_page('tools.php'); // Herramientas
        remove_menu_page('options-general.php'); // Ajustes
    }
endif;
// add_action('admin_menu', 'mawt_admin_menu');

// Inyeccion de la eliminacion de las opciones de la barra superior en administración
if (!function_exists('mawt_before_admin_bar')) :
    function mawt_before_admin_bar()
    {
        global $wp_admin_bar;
        /* La opciones siguientes Eliminan:
         * search: Caja de busquedas,
         * comments: Aviso de comentarios,
         * updates: Aviso de actualizaciones,
         * edit: editar entrada y paginas,          
         * my-sites: Menu my sitios si se usa la funcion multisitios de WP, 
         * site-name: El nombre de la pagina,
         * wp-logo: El logo y el submenú,
         * my-account: Enlaces a su cuenta, el id depende de si usted tiene habilitado el avatar,
         * view-site: Submenu que aparece al pasar el cursor sobre el nombre de la web,
         * about: El enlace "Sobre WordPress",
         * wporg: El enlace wordpress.org,
         * documentation: El enlace a la documentacion oficial (codex),
         * support-forums: El enlace a los foros de ayuda,
         * feedback: El enlace Sugerencias
         * 
         * A excepcion de la opcion que:
         * get-shortlink: Proporciona un enlace corto a esa pagina/post,
         */
        
        $wp_admin_bar->remove_menu('wp-logo');
        $wp_admin_bar->remove_menu('new-content');
        $wp_admin_bar->remove_menu('comments');
    }
endif;
// add_action('wp_before_admin_bar_render', 'mawt_before_admin_bar');

// Inyeccion del agregacion de las opciones de la barra superior en administración
if (!function_exists('mawt_admin_bar_menu')) :
    function mawt_admin_bar_menu()
    {
        global $wp_admin_bar;

        $wp_admin_bar->add_menu(array(
            'id' => 'mi_menu',
            'title' => __('Mi menu', 'mawt'),
            'href' => false
        ));

        $wp_admin_bar->add_menu(array(
            'parent' => 'mi_menu',
            'id' => 'link-chiplex',
            'title' => __('Chiplex', 'mawt'),
            'href' => __('https://chiplex.github.io/')
        ));

        $wp_admin_bar->add_menu(array(
            'parent' => 'mi_menu',
            'id' => 'link_facebook',
            'title' => __('Facebook', 'mawt'),
            'href' => __('https://fb.me')
        ));

        $wp_admin_bar->add_menu(array(
            'parent' => 'mi_menu',
            'id' => 'link_twitter',
            'title' => __('Twitter', 'mawt'),
            'href' => __('https://t.me')
        ));
        
    }
endif;
// add_action('admin_bar_menu', 'mawt_admin_bar_menu');

// Inyection de filtro para agregar opciones de perfil de usuarios
if (!function_exists('mawt_user_contactmethods')) :
    function mawt_user_contactmethods($data_user)
    {
        $data_user['facebook']=__('Facebook');
        $data_user['twitter']=__('Twitter');

        return $data_user;
    }
endif;
// add_filter('user_contactmethods', 'mawt_user_contactmethods');

// Inyection de filtro para cambiar el footer del admin
if (!function_exists('mawt_admin_footer_text')) :
    function mawt_admin_footer_text()
    {
        return '<i> Sitio creado por <a href="https://chiplex.github.io/">Chiplex</a> con Wordpress</i>';
    }
endif;
// add_filter('admin_footer_text', 'mawt_admin_footer_text');

// Inyeccion de eliminacion de Meta-Box en el Dashborad
if (!function_exists('mawt_wp_dashboard_setup')) :
    function mawt_wp_dashboard_setup()
    {
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   // Right Now
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // Incoming Links
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );   // Plugins
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // Quick Press
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );  // Recent Drafts
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );   // WordPress blog
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );   // Other WordPress News
    }
endif;
// add_action('wp_dashboard_setup', 'mawt_wp_dashboard_setup');