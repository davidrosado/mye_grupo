<section id="listado-blog" class="seccion-page seccion-ultimas-noticias">
    <div class="container">
        <div class="row">
            <div class="col titulo-seccion-noticias">
                <h2>Últimas Noticias</h2>
            </div>
        </div>
        <div class="row listado-items">
            <?php
            $args_news = array(          
                'post_type' => 'post',           
                'posts_per_page' => 3,
                'order' => 'DESC'             
                );

            $query_news = new WP_Query( $args_news ); ?>

            <?php if ( $query_news->have_posts() ) : ?>
            <!-- the loop -->
            <?php while ( $query_news->have_posts() ) : $query_news->the_post(); ?>
                <div class="col-md-4 item-blog item-listado">
                    <div class="left-item wow fadeInLeft" data-wow-duration="3s">
                        <?php if (has_post_thumbnail()) :?> 
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium') ?>"></a>
                        <?php endif ?>
                        
                    </div>
                    <div class="right-item wow fadeInRight" data-wow-duration="3s">
                        <h3 class="titulo-item"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        <p class="resumen-item"><?php the_excerpt();?></p>
                        <p class="date-item">Subido el <?php echo get_the_date(); ?></p>                      
                    </div>
                </div>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else:  ?>
                <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
            <?php endif; ?>      
        </div>
    </div>
</section>
