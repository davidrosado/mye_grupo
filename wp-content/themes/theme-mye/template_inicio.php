<?php
  /*Template Name: Página de Inicio*/
  get_header(); 
?>

<?php 
  include 'template_parts/i_banner_inicio.php'
?>

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

<?php if( have_rows('bloque_nosotros') ):?>
  <section id="bloque-nosotros-home" class="seccion-page">
    <div class="container">
      <div class="row align-items-center justify-content-center">  
        <?php while ( have_rows('bloque_nosotros') ) : the_row();
          $titulo_seccion = get_sub_field('titulo_seccion');
          $texto_izquierda = get_sub_field('texto_izquierda');
          $imagen_izquierda = get_sub_field('imagen_izquierda');
          $imagen_derecha = get_sub_field('imagen_derecha');
          $texto_derecha = get_sub_field('texto_derecha');
        ?>                
          <div class="col-12">
              <p class="titulo-seccion-interna">
                  <?php echo $titulo_seccion ?>
              </p>   
          </div>   
          <div class="col-md-6 left-bloque-nosotros-home">
            <?php echo $texto_izquierda ?>
            <img src="<?php echo $imagen_izquierda ?>" alt="">
          </div>     
          <div class="col-md-6 right-bloque-nosotros-home">
            <img src="<?php echo $imagen_derecha ?>" alt="">
            <?php echo $texto_derecha ?>
          </div>                 
        <?php endwhile;?>
        </div>
      </div>
    </section>        
<?php endif; ?>    

<?php 
  include 'template_parts/i_last_projects.php'
?>

<?php 
  include 'template_parts/i_last_news.php'
?>

<?php get_footer(); ?>