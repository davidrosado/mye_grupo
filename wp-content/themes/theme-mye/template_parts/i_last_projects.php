<section id="proyectos" class="seccion-page seccion-ultimos-proyectos">
    <div class="container">
        <div class="row">
            <div class="col titulo-seccion">
            <h2 class="titulo-seccion-interna color-azul">Proyectos</h2>
            </div>
        </div>
        <div id="listado-proyectos" class="row listado-items">
            <?php
            $args_news = array(          
                'post_type' => 'proyecto',           
                'posts_per_page' => 2,
                'order' => 'ASC'             
                );

            $query_news = new WP_Query( $args_news ); ?>

            <?php if ( $query_news->have_posts() ) : ?>
            <!-- the loop -->
            <?php while ( $query_news->have_posts() ) : $query_news->the_post(); ?>
                <div class="item-listado mt-5">
                    <div class="left-item col-md-6 wow fadeInLeft" data-wow-duration="3s">
                        <?php if (has_post_thumbnail()) :?> 
                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large') ?>"></a>
                        <?php endif ?>
                        
                    </div>
                    <div class="right-item offset-md-1 col-md-5 wow fadeInRight" data-wow-duration="3s">
                        <p class="tag-project"><?php the_field('tag_proyecto')?></p>
                        <h3 class="titulo-item"><?php the_field('titulo_listado') ?></h3>
                        <p class="resumen-item"><?php the_excerpt();?></p>        
                                                
                        <a class="cta" href="<?php the_permalink() ?>">Ver más</a>
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
