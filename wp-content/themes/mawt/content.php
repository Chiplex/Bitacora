<article class="Content">    
    <?php 
        query_posts(null);
        if (have_posts()): while(have_posts()): the_post();
    ?>
        <article>      
            <!-- imagen destacada -->            
            <?php the_post_thumbnail() ?>
            <!-- Titulo -->
            <h2><a href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h2>
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
            <p><?php the_author_posts_link() ?></p>
        </article>    
        <hr>    
    <?php endwhile; else: ?>
    <p>Contenido solicitado no existe</p>
    <?php endif; wp_reset_postdata();?>    
</article>
<section class="Pagination Other">
    <?php // previous_post_link() ?>
    <?php // next_post_link() ?>
    <?php echo paginate_links() ?>
</section>