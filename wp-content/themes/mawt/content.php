<article class="Content">    
    <?php 
        
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
            <div>
                <h3>Custom Fields and Metaboxes nativos</h3>
                <?php the_meta(); ?>
                <p><?php echo get_post_meta(get_the_ID(), 'Origen', TRUE) ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'Actividad', TRUE) ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'mb_origen_raza', TRUE) ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'mb_esperanza_vida', TRUE) ?></p>
                <h3>Custom Fields and Metaboxes por plugins</h3>
                <p><?php the_field('ideal_para'); ?></p>
                <p><?php echo the_field('ideal_para'); ?></p>
            </div>
        </article>    
        <hr>    
    <?php endwhile; else: ?>
    <p>Contenido solicitado no existe</p>
    <?php 
        endif; 
        wp_reset_postdata(); 
        wp_reset_query();
    ?>    
</article>
<section class="Pagination Other">
    <?php // previous_post_link() ?>
    <?php // next_post_link() ?>
    <?php echo paginate_links() ?>
</section>