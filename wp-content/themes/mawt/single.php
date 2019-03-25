<?php get_header();?>
<?php while(have_posts()): the_post(); ?>
    <main>
    <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </main>
    <?php comments_template(); ?>
<?php endwhile; ?>
<?php get_footer();?>