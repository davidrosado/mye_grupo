<?php
  /*Template Name: Página de Inicio*/
  get_header(); 
?>

<?php 
  include 'template_parts/i_banner_inicio.php'
?>

<!--  DATOS MYE -->
<?php if( have_rows('widgets_datos_mye') ):?>
  <section id="widgets-datos-mye" class="seccion-page">
    <div class="container">
      <div class="row align-items-center justify-content-center">  
        <?php while ( have_rows('widgets_datos_mye') ) : the_row();
          $icono = get_sub_field('icono');
          $titulo = get_sub_field('titulo');
          $texto = get_sub_field('texto');
        ?>                
          <div class="item-widgets-datos-mye col-md-3 text-center" data-wow-duration="3s">
            <img class="imagen-texto" src="<?php echo $icono?>" alt="">
            <p class="numero-item"><?php echo $titulo?></p>
            <p class="texto-item"><?php echo $texto ?></p>
          </div>      
        <?php endwhile;?>
        </div>
      </div>
    </section>        
<?php endif; ?>    

<!--  BLOQUE NOSOTROS -->
<?php if( have_rows('bloque_nosotros') ):?>
  <section id="bloque-nosotros-home" class="seccion-page">
    <div class="container">
      <div class="row">  
        <?php while ( have_rows('bloque_nosotros') ) : the_row();
          $titulo_seccion = get_sub_field('titulo_seccion');
          $texto_izquierda = get_sub_field('texto_izquierda');
          $imagen_izquierda = get_sub_field('imagen_izquierda');
          $imagen_derecha = get_sub_field('imagen_derecha');
          $texto_derecha = get_sub_field('texto_derecha');
        ?>                
          <div class="col-12">
              <p class="titulo-seccion-interna color-verde">
                  <?php echo $titulo_seccion ?>
              </p>   
          </div>   
          <div class="col-md-5 left-bloque-nosotros-home">
            <?php echo $texto_izquierda ?>
            <img src="<?php echo $imagen_izquierda ?>" alt="">
          </div>     
          <div class="col-md-7 right-bloque-nosotros-home">
            <img src="<?php echo $imagen_derecha ?>" alt="">
            <?php echo $texto_derecha ?>
          </div>                 
        <?php endwhile;?>
        </div>
      </div>
    </section>        
<?php endif; ?>    

<!--  BLOQUE ULTIMOS PROYECTOS -->
<?php 
  include 'template_parts/i_last_projects.php'
?>

<!--  BLOQUE TESTIMONIOS -->
<?php if( get_field('bloque_testimonios') ):?>
  <section id="bloque-testimonios-home" class="seccion-page">
    <div class="container">
      <div class="row">  
          <div class="col-md-8">
            <?php the_field('bloque_testimonios')?>
          </div>
      </div>
      <div class="row listado-items">
            <?php
            $args_news = array(          
                'post_type' => 'testimonio',           
                'posts_per_page' => -1,
                'order' => 'DESC'             
                );

            $query_news = new WP_Query( $args_news ); ?>

            <?php if ( $query_news->have_posts() ) : ?>
            <!-- the loop -->
            <?php while ( $query_news->have_posts() ) : $query_news->the_post(); ?>
                <div class="item-testimonio item-listado">
                    <h3><?php the_title(); ?></h3>  
                    <?php the_content(); ?>
                    <div class="bottom-item">
                        <img src="<?php the_field('imagen_testimonio') ?>" alt="">
                        <p class="nombre-testimonio"><?php the_field('nombre_testimonio') ?></p>
                        <p class="cargo-testimonio"><?php the_field('cargo_testimonio') ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else:  ?>
                <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
            <?php endif; ?>      
        </div>      
    </section>        
<?php endif; ?>   

<!--  BLOQUE BENEFICIOS-->
<?php if( have_rows('bloque_beneficios') ):?>
  <section id="bloque-beneficios-home" class="seccion-page">
    <div class="container">
      <div class="row">  
        <?php while ( have_rows('bloque_beneficios') ) : the_row();
          $textos_bloque = get_sub_field('textos_bloque');
        ?>                
          <div class="col-md-4">
            <?php echo $textos_bloque?>
          </div>      

          <?php if( have_rows('items') ):?>
            <div class="col-md-8">
              <div class="slider-beneficios">
                <?php while ( have_rows('items') ) : the_row();
                  $imagen_item = get_sub_field('imagen_item');
                  $textos_item = get_sub_field('textos_item');
                ?>                
                  <div class="item-slider-beneficios">
                    <img src="<?php echo $imagen_item?>" alt="<?php echo $textos_item?>">
                    <p><?php echo $textos_item?></p>
                  </div>     
                <?php endwhile;?>   
              </div>
            </div>
          <?php endif; ?>         
          
        <?php endwhile;?>
        </div>
      </div>
    </section>        
<?php endif; ?>    

<!--  BLOQUE LO MEJOR PARA TI  --> 
<?php if( have_rows('bloque_lo_mejor_para_ti') ):?>
  <section id="bloque-lo-mejor-home" class="seccion-page">
    <div class="container">
      
        <?php while ( have_rows('bloque_lo_mejor_para_ti') ) : the_row();
          $textos_bloque = get_sub_field('textos_bloque');
        ?>             
          <?php if($textos_bloque) :?>   
            <div class="row">  
              <div class="col-md-12">
                <?php echo $textos_bloque?>
              </div>     
            </div>                       
          <?php endif ?>
    
          <?php if( have_rows('items') ):?>
            <div id="listado-lo-mejor" class="row">
                <?php while ( have_rows('items') ) : the_row();
                  $imagen_item = get_sub_field('imagen_item');
                  $textos_item = get_sub_field('textos_item');
                  $shortcode_galeria = get_sub_field('shortcode_galeria');
                ?>                
                  <div class="item-lo-mejor">
                    <img src="<?php echo $imagen_item?>" alt="<?php echo $textos_item?>">
                    <p><?php echo $textos_item?></p>
                    <p><?php echo $shortcode_galeria ?></p>
                  </div>     
                <?php endwhile;?>   
            </div>
          <?php endif; ?>         
          
        <?php endwhile;?>
        </div>

    </section>        
<?php endif; ?>    

<?php 
  include 'template_parts/i_last_news.php'
?>

<?php get_footer(); ?>