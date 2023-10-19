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
          <div class="col-md-8 top-bloque">
            <?php the_field('bloque_testimonios')?>
          </div>
      </div>
      <div class="row listado-items seccion-menor-page">
            <?php
            $args_news = array(          
                'post_type' => 'testimonio',           
                'posts_per_page' => -1,
                'order' => 'DESC'             
                );

            $query_news = new WP_Query( $args_news ); ?>

            <?php if ( $query_news->have_posts() ) : ?>
              <div class="slider-testimonios slider">
                <!-- the loop -->
                <?php while ( $query_news->have_posts() ) : $query_news->the_post(); ?>
                    <div class="item-testimonio item-listado">
                      <div class="card-form content-item-testimonio">
                          <div class="top-item">
                            <h4><?php the_title(); ?></h4>  
                            <?php the_content(); ?>
                          </div>
                          <div class="bottom-item">
                              <?php if(get_field('imagen_testimonio')) :?>
                                <img class="imagen-testimonio" src="<?php the_field('imagen_testimonio') ?>" alt="">
                              <?php endif ?>
                              
                              <div class="meta-item">
                                <?php if(get_field('nombre_testimonio')) :?>
                                  <p class="nombre-testimonio"><?php the_field('nombre_testimonio') ?></p>
                                <?php endif ?>       
                                <?php if(get_field('cargo_testimonio')) :?>
                                  <p class="cargo-testimonio"><?php the_field('cargo_testimonio') ?></p>
                                <?php endif ?>       
                              </div>
                          </div>
                      </div>

                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
              </div>
              <?php wp_reset_postdata(); ?>

            <?php else:  ?>
                <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
            <?php endif; ?>      
        </div>      
    </section>        
<?php endif; ?>   

<!--  BLOQUE BENEFICIOS-->
<?php if( have_rows('bloque_beneficios') ):?>
  <section id="bloque-beneficios-home" class="seccion-page bg-morado">
    <div class="content-beneficios row mx-0">
      <?php while ( have_rows('bloque_beneficios') ) : the_row();
          $textos_bloque = get_sub_field('textos_bloque');
        ?>                
          <div class="offset-md-1 col-md-4 textos-beneficios">
            <?php echo $textos_bloque?>
          </div>      

          <?php if( have_rows('items') ):?>
            <div class="col-md-7">
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
              <div class="btn-wrap">
                <button class="prev-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
                  </svg>                  
                </button>
                <button class="next-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                    <path d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"/>
                  </svg>
                </button>
              </div>              
            </div>
          <?php endif; ?>         
          
        <?php endwhile;?>
    </div>
  </section>        
<?php endif; ?>    

<!--  BLOQUE LO MEJOR PARA TI  --> 
<?php if( have_rows('bloque_lo_mejor_para_ti') ):?>
  <section id="bloque-lo-mejor-home" class="seccion-page pb-0">
      <div class="container">
      
        <?php while ( have_rows('bloque_lo_mejor_para_ti') ) : the_row();
          $textos_bloque = get_sub_field('textos_bloque');
        ?>             
          <?php if($textos_bloque) :?>   
            <div class="row">  
                <div class="col-md-12 top-bloque">
                  <?php echo $textos_bloque?>
                </div>     
            </div>                       
          <?php endif ?>
    
          <?php if( have_rows('items') ):?>
            <div id="listado-lo-mejor" class="row seccion-menor-page">
                <?php $c1 = 0; while ( have_rows('items') ) : the_row(); $c1 ++;
                    $imagen_item = get_sub_field('imagen_item');
                    $textos_item = get_sub_field('textos_item');
                    $shortcode_galeria = get_sub_field('shortcode_galeria');
                  ?>             
                    <?php if($c1 < 2) :?>   
                      <div class="col-md-4">
                        <div class="item-lo-mejor first-item">
                          <div class="content-item">
                              <img src="<?php echo $imagen_item?>" class="masonry-img">
                              <div class="rollover">
                                <div class="texto-rollover col-12">
                                  <?php echo $textos_item?>
                                  <button type="button" class="btn btn-primary openModal" data-carrusel="<?php echo $shortcode_galeria?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
                                  </button>
                                </div>
                              </div>                            
                          </div>
                        </div>   
                      </div>
                    <?php endif; ?>   
                  <?php endwhile;?>   

                  <div class="col-md-8 row px-0">
                    <?php $c2 = 0; while ( have_rows('items') ) : the_row(); $c2 ++;
                      $imagen_item = get_sub_field('imagen_item');
                      $textos_item = get_sub_field('textos_item');
                      $shortcode_galeria = get_sub_field('shortcode_galeria');
                    ?>             
                      <?php if($c2 < 6  && $c2 > 1) :?>  
                        <div class="item-lo-mejor col-md-6">
                          <div class="content-item">
                              <img src="<?php echo $imagen_item?>" class="masonry-img">
                              <div class="rollover">
                                <div class="texto-rollover col-12">
                                  <?php echo $textos_item?>
                                  <button type="button" class="btn btn-primary openModal" data-carrusel="<?php echo $shortcode_galeria?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
                                  </button>
                                </div>     
                              </div>                     
                          </div>
                        </div>   
                      <?php endif; ?>   
                    <?php endwhile;?>         
                  </div>            
            </div>
          <?php endif; ?>         
          
          <?php 
            // LLAMADO CARRUSEL DEL ITEM
            if( have_rows('items') ):?>
              <?php $cm = 0; while ( have_rows('items') ) : the_row(); $cm ++;
                  $galeria = get_sub_field('shortcode_galeria');
                ?>    
                <div id="<?php echo $galeria?>" style="display:none">
                    <?php if( have_rows('slider_galeria') ):?>
                        <?php $cm = 0; while ( have_rows('slider_galeria') ) : the_row(); $cm ++;
                            $item = get_sub_field('imagen');
                          ?>    
                            <div class="carousel-item <?php echo ($cm == 1) ? 'active' : ''; ?> item-carrusel-<?php echo $galeria?>">
                              <img src="<?php echo $item?>" class="d-block w-100">
                            </div>
                        <?php endwhile;?>
                    <?php endif; ?>    
                </div>
              <?php endwhile;?>
          <?php endif; ?>      

        <?php endwhile;?>
      </div>
    </section>        
<?php endif; ?>    

<?php 
  include 'template_parts/i_last_news.php'
?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
      </div>
      <div class="modal-body">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
          <div id="contenido-carrusel" class="carousel-inner">
            <div class="carousel-item active">
              <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>