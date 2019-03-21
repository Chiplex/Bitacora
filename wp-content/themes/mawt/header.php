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
    <header class=Header>
        <div class="Logo">
            <a href="#">Logo</a>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="#">Seccion 1</a></li>
                <li><a href="#">Seccion 2</a></li>
                <li><a href="#">Seccion 3</a></li>
                <li><a href="#">Seccion 4</a></li>
                <li><a href="#">Seccion 5</a></li>
            </ul>
        </nav>
    </header>
    <main class="Main">
