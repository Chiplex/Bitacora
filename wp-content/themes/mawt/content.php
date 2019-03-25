<article class="Content">
    <h1>Creación de Temas</h1>    
    <?php if (have_posts()): while(have_posts()): the_post();?>
        <article>
            <h2><?php the_title(); ?></h2>
            <?php get_the_title(); ?>
            <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>            
            <!-- imagen destacada -->            
            <?php the_post_thumbnail() ?>
            <?php get_the_post_thumbnail_url(); ?>
            <img src="<?php get_the_post_thumbnail_url(); ?>" alt="<?php the_post_thumbnail() ?>">
            <!-- contenido -->
            <?php the_excerpt(); ?>
            <!-- categoria -->
            <p><?php the_category(', ') ?></p>
            <!-- etiquetas -->
            <p><?php the_tags() ?></p>  
            <!-- Tiempo -->
            <p><?php the_time() ?></p>
            <p><?php the_time('d-M-Y') ?></p>
            <p><?php the_time(get_option('date_format')) ?></p>
            <!-- autor -->
            <p><?php the_author() ?></p>
            <p><?php the_author_posts_link() ?></p>
            <div class="the-content">
                <?php //the_content() ?>
            </div>
        </article>        
    <?php endwhile; else: ?>
    <p>Contenido solicitado no existe</p>
    <?php endif; ?>    
</article>
<section class="Pagination">
    <?php // previous_post_link() ?>
    <?php // next_post_link() ?>
    <?php echo paginate_links() ?>
</section>