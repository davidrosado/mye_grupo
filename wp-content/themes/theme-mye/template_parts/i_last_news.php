<section id="listado-blog" class="seccion-page seccion-ultimas-noticias">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="titulo-seccion-noticias color-azul-oscuro">Últimas Noticias</h2>
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
                    <div class="content-item-listado">
                        <a href="<?php the_permalink(); ?>">
                            <div class="top-item wow fadeInLeft" data-wow-duration="3s">
                                <?php if (has_post_thumbnail()) :?> 
                                    <img src="<?php the_post_thumbnail_url('large') ?>">
                                <?php endif ?>
                            </div>
                            <div class="bottom-item wow fadeInRight" data-wow-duration="3s">
                                <h3 class="titulo-item"><?php the_title() ?></h3>
                                <p class="resumen-item"><?php the_excerpt();?></p>
                                <p class="date-item">Subido el <span><?php echo get_the_date(); ?></span></p>             
                            </div>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else:  ?>
                <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
            <?php endif; ?>      
        </div>

        <?php if(is_page('inicio')) :?>
            <div class="row mt-5">
                <div class="col text-center">
                    <a class="cta" href="<?php bloginfo('url')?>/blog" class="cta">Ver más noticias</a>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>
