<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title("|", true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header('wordpress'); ?>
    <header class=Header>
        <div class="Logo">
            <?php if (has_custom_logo()):
                the_custom_logo();
            else:?>
                 <a href="<?php echo esc_url(home_url('/')) ?>"><?php echo get_bloginfo(); ?></a>
            <?php endif; ?>
        </div>        
        <?php if(has_nav_menu('main_menu')):
                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'container' => 'nav',
                    'container_class' => 'Menu',
                )); else: ?>
            <nav class="Menu">
                <ul>
                    <?php wp_list_pages('title_li') ;?>
                </ul>
            </nav>
        <?php endif; ?>                    
    </header>
    <main class="Main">
