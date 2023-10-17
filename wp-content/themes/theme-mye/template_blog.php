<?php
  /* Template Name: Página BLOG */
  get_header(); 
?>

<?php 
  include 'template_parts/i_banner_page.php'
?>

<section id="contenido-pagina" class="seccion-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>		
				<?php endwhile; ?>		
				<?php endif; ?>  						
			</div>	
		</div>
	</div>	
</section>

<section id="listado-blog" class="seccion-page seccion-contenido">
    <div class="container">
        <div class="row listado-items">
          <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $custom_args = array(          
                'post_type' => 'post',           
                'posts_per_page' => 12,
                'order' => 'DESC',
                'paged' => $paged,                
              );

            $custom_query = new WP_Query( $custom_args ); ?>

          <?php if ( $custom_query->have_posts() ) : ?>
            <!-- the loop -->
            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                <div class="col-md-6 item-blog item-listado">
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

            <div class="col-md-12 paginacion text-center">
              <!-- The pagination component -->
              <?php custom_pagination($custom_query->max_num_pages,"",$paged);
              //juristic_posts_navigation();
              ?>
            </div>   

          <?php wp_reset_postdata(); ?>

          <?php else:  ?>
              <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
          <?php endif; ?>         
        </div>
    </div>
    <img src="<?php echo get_stylesheet_directory_uri()?>/images/bg-blog.png" class="fig fig1" alt="">   
</section>

<?php get_footer(); ?>