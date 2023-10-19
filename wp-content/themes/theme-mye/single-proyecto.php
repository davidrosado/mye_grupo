<?php get_header(); ?>

<?php
	$terms = get_the_terms( $post->ID , 'category');
	if($terms) {
	  foreach( $terms as $term ) {
	    $cat_obj = get_term($term->term_id, 'category');
	    $cat_slug = $cat_obj->slug;
	    $cat_name = $cat_obj->name;
	  }
	}
	?>


<section class="contenido-pagina seccion-page">
	<div class="container">
		<div class="top-proyecto">
			<div class="row">
				<div class="col-12 breadcrumb-proyecto">
					<p>Inicio / Proyectos / <?php the_field('titulo_listado')?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h2 class="titulo-proyecto"><?php the_title(); ?></h2>
					<?php if(get_field('direccion_proyecto')) :?>
						<p><?php the_field('direccion_proyecto')?></p>
					<?php endif; ?> 				
				</div>
				<?php if(get_field('precio_proyecto')) :?>
					<div class="col-md-6 text-right">
						<p class="precio-proyecto">Desde: 
							<span><?php the_field('precio_proyecto')?></span></p>
					</div>
				<?php endif; ?> 		
			</div>			

			<?php if( have_rows('galeria_proyecto') ):?>
				<div id="galeria-proyecto" class="row">	
					<?php $ci=0; while ( have_rows('galeria_proyecto') ) : the_row(); $ci++;
						$item = get_sub_field('item');
					?>      
						<?php if($ci < 2) : ?>        
							<div class="col-md-9">
								<div id="item-galeria-<?php echo $ci ?>" class="item-galeria">
									<img src="<?php echo $item?>" alt="<?php the_title();?>">
								</div>     
							</div>
						<?php endif; ?> 
					<?php endwhile;?>   
					<div class="col-md-3">
						<?php $ci2=0; while ( have_rows('galeria_proyecto') ) : the_row(); $ci2++;
							$item2 = get_sub_field('item');
						?>      
							<?php if($ci2 >1 && $ci2 < 4) : ?>     
								<div id="item-galeria-<?php echo $ci2 ?>" class="item-galeria item-galeria-sidebar">
									<img src="<?php echo $item2?>" alt="<?php the_title();?>">
								</div>  
							<?php endif; ?> 
						<?php endwhile;?>  		
					</div>	

					<button id="open-gallery" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						<i class="fas fa-search"></i> Ver más fotos
					</button>		
				</div>						
			<?php endif; ?>  

		<div id="contenido-proyecto" class="row contenido-proyecto seccion-page">
			<div class="col-md-8">
				<!--  BLOQUE DESCRIPCION --> 
				<div class="descripcion-proyecto">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>		
					<?php endwhile; ?>		
					<?php endif; ?>  						
				</div>

				<!--  BLOQUE BENEFICIOS --> 
				<?php if( have_rows('bloque_beneficios_proyecto') ):?>
					<div class="beneficios-proyecto">
					
						<?php while ( have_rows('bloque_beneficios_proyecto') ) : the_row();
							$titulo_bloque = get_sub_field('titulo_bloque');
						?>             
						<?php if($titulo_bloque) :?>   
							<h3><?php echo $titulo_bloque?> </h3>                  
						<?php endif ?>
					
						<?php if( have_rows('item') ):?>
							<div id="listado-beneficios" class="row">
								<?php while ( have_rows('item') ) : the_row(); 
								$icono_item = get_sub_field('icono_item');
								$titulo_item = get_sub_field('titulo_item');
								?>          
									<div class="item-beneficios">
										<img src="<?php echo $icono_item?>" alt="<?php echo $titulo_item?>">
										<p><?php echo $titulo_item?></p>
									</div>     
								<?php endwhile;?>   
							</div>
						<?php endif; ?>         
						
						<?php endwhile;?>
					</div>

				<?php endif; ?>   			

				<!--  BLOQUE TIPOS --> 
				<?php if( have_rows('bloque_tipos_proyecto') ):?>
					<div class="accordion" id="tiposProyecto">
					
						<?php 
							$c=0;
							while ( have_rows('bloque_tipos_proyecto') ) : the_row();
							$titulo_item_acordeon = get_sub_field('titulo_item_acordeon');
							$subtitulo_item_acordeon = get_sub_field('subtitulo_item_acordeon');
							$imagen_item_acordeon = get_sub_field('imagen_item_acordeon');
							$c++;
						?>       

							<div class="accordion-item" id="item-<?php echo $c ?>">
								<h2 class="accordion-header" id="heading<?php echo $c ?>">
									<button class="accordion-button <?php echo ($c > 1) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" 
									data-bs-target="#collapse<?php echo $c ?>" aria-expanded="false" aria-controls="collapse<?php echo $c ?>">
										<?php echo $titulo_item_acordeon ?>
									</button>
								</h2>
								<div id="collapse<?php echo $c ?>" class="accordion-collapse collapse <?php echo ($c == 1) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $c ?>" data-bs-parent="#tiposProyecto">
									<div class="accordion-body">
										<?php if($subtitulo_item_acordeon) :?>   
												<p class="subtitulo-acordeon"><?php echo $subtitulo_item_acordeon ?></p>                  
											<?php endif ?>    

											<?php if( have_rows('items_de_descripcion') ):?>
												<div id="listado-descripcion-tipos" class="row">
													<?php while ( have_rows('items_de_descripcion') ) : the_row();
													$icono = get_sub_field('icono');
													$texto = get_sub_field('texto');
													?>                
													<div class="item-listado-descripcion-tipos col">
														<img src="<?php echo $icono?>" alt="<?php echo $texto ?>">
														<p><?php echo $texto ?></p>
													</div>     
													<?php endwhile;?>   
												</div>
											<?php endif; ?>  

											<?php if($imagen_item_acordeon) :?>   
												<img src="<?php echo $imagen_item_acordeon ?>" alt="<?php echo $titulo_item_acordeon ?>"> 
											<?php endif ?>  	
										</div>
								</div>
							</div>
						<?php endwhile;?>
					</div>

				<?php endif; ?>   	
			</div>

			<!--  SIDEBAR  --> 
			<div class="col-md-4 sidebar-proyecto">
				<div class="bloque-ubicacion">
					<?php if(get_field('bloque_ubicacion_proyecto')) :?>
						<?php the_field('bloque_ubicacion_proyecto')?>
					<?php endif; ?> 
				</div>

				<div class="cotizar">
					<?php if(get_field('sidebar_proyecto','option')) :?>
						<?php the_field('sidebar_proyecto','option')?>
					<?php endif; ?> 						
				</div>
			</div>
		</div>

		<!--  BLOQUE DOCUMENTOS LEGALES DEL PROYECTO  --> 
		<?php if( have_rows('bloque_documentos_proyecto') ):?>
			<div class="documentos-proyecto row seccion-page">
			
				<?php while ( have_rows('bloque_documentos_proyecto') ) : the_row();
					$titulo_bloque = get_sub_field('titulo_bloque');
				?>             
				<?php if($titulo_bloque) :?>   
					<div class="col-md-4">
						<h3><?php echo $titulo_bloque?></h3>         
					</div>         
				<?php endif ?>
			
				<?php if( have_rows('item') ):?>
					<div id="listado-documentos" class="col-md-8">
						<?php while ( have_rows('item') ) : the_row();
							$pdf_item = get_sub_field('pdf_item');
							$titulo_item = get_sub_field('titulo_item');
						?>                
						<div class="item-documentos col">
							<a href="<?php echo $pdf_item?>" target="_blank"><i class="far fa-file-pdf"></i> <?php echo $titulo_item?></a>
						</div>     
						<?php endwhile;?>   
					</div>
				<?php endif; ?>         
				
				<?php endwhile;?>
			</div>

		<?php endif; ?>   			
	</div>	
</section>	

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
      </div>
      <div class="modal-body">
		<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
			<div class="carousel-inner">
				<?php if( have_rows('galeria_proyecto') ):?>
					<?php $cg=0; while ( have_rows('galeria_proyecto') ) : the_row(); $cg++;
						$item = get_sub_field('item');
					?>            
						<div class="carousel-item <?php echo ($cg == 1) ? 'active' : ''; ?>">
							<img src="<?php echo $item?>." class="d-block w-100" alt="...">
						</div>
					<?php endwhile;?>  		
				<?php endif; ?>  				
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