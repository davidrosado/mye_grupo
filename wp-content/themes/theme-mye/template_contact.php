<?php
  /*Template Name: Página CONTACTO*/
  get_header(); 
?>

<?php 
  include 'template_parts/i_banner_page.php'
?>

<section id="contenido-pagina-contacto" class="seccion-page pb-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>		
				<?php endwhile; ?>		
				<?php endif; ?>  						
			</div>	
		</div>

        <?php if( have_rows('widgets_contacto') ):?>
            <div class="row items-nuestros-valores my-5">
                <?php while ( have_rows('widgets_contacto') ) : the_row(); 
                    $icono = get_sub_field('icono');
                    $titulo = get_sub_field('titulo');
                    $texto = get_sub_field('texto');
                ?>                
                    <div class="item-widget-contacto col-md-4 d-flex py-3">           
                        <?php if ($icono): ?>
                            <div class="imagen-item-widget-contacto">
                                <img class="img-responsive img-item" src="<?php echo $icono ?>"/>
                            </div>
                        <?php endif ?>     
                        
                        <div class="texto-item-widget-contacto">
                            <?php if ($titulo): ?>                                                    
                                <h4><?php echo $titulo ?></h4>
                            <?php endif ?>        
                            <?php if ($texto): ?>                                                    
                                <p><?php echo $texto ?></p>
                            <?php endif ?>     
                        </div>                                
                    </div>                  
                <?php endwhile; ?>
            </div>
        <?php endif; ?>   
	</div>	
    <div id="mapa_ubicacion" class="col-md-12">
        <?php the_field('mapa_ubicacion')?>
    </div>
    <div id="formulario-contacto" class="container seccion-page seccion-formulario pb-0">
        <div class="row content-formulario-contacto">
            <div class="col-md-6">
                <?php the_field('formulario_contacto');?>
            </div>
            <div class="col-md-6 figuras-contacto">
                <div class="content-figuras">
                    <?php if( have_rows('right_contacto') ):?>
                        <?php while ( have_rows('right_contacto') ) : the_row(); 
                            $personaje = get_sub_field('personaje');
                            $texto_1= get_sub_field('texto_1');
                            $texto_2 = get_sub_field('texto_2');
                        ?>                   
                            <img id="personaje" src="<?php echo $personaje?>" alt="<?php the_title()?>"> 
                            <img id="frase-1" src="<?php echo $texto_1?>" alt="" class="frase">
                            <img id="frase-2" src="<?php echo $texto_2?>" alt="" class="frase">
                        <?php endwhile; ?>
                    <?php endif; ?>     
                </div>
              
            </div>            
        </div>
    </div>
</section>

<?php get_footer(); ?>