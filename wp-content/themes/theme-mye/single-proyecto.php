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
		<div id="top-proyecto" class="row">
			<div class="col-md-6">
				<h2><?php the_title(); ?></h2>
				<?php if(get_field('direccion_proyecto')) :?>
					<p><?php the_field('direccion_proyecto')?></p>
				<?php endif; ?> 				
			</div>
			<?php if(get_field('precio_proyecto')) :?>
				<div class="col-md-6">
					<p>Desde: <strong><?php the_field('precio_proyecto')?></strong></p>
				</div>
			<?php endif; ?> 		
		</div>			

		<?php if( have_rows('galeria_proyecto') ):?>
			<div id="galeria-proyecto" class="row">
				<div class="galeria">					
					<?php while ( have_rows('galeria_proyecto') ) : the_row();
						$item = get_sub_field('item');
					?>                
					<div class="item-galeria">
						<img src="<?php echo $item?>" alt="<?php the_title();?>">
					</div>     
					<?php endwhile;?>   
				</div>
			</div>								
		<?php endif; ?>   				
	

		<div id="contenido-proyecto" class="row contenido">
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
								<div class="item-beneficios col">
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
													<div class="listado-descripcion-tipos col">
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
				<?php if(get_field('bloque_ubicacion_proyecto')) :?>
					<?php the_field('bloque_ubicacion_proyecto')?>
				<?php endif; ?> 

				<?php if(get_field('bloque_cotizar')) :?>
					<?php the_field('bloque_cotizar')?>
				<?php endif; ?> 				
			</div>
		</div>

		<!--  BLOQUE DOCUMENTOS LEGALES DEL PROYECTO  --> 
		<?php if( have_rows('bloque_documentos_proyecto') ):?>
			<div class="beneficios-proyecto row seccion-page">
			
				<?php while ( have_rows('bloque_documentos_proyecto') ) : the_row();
					$titulo_bloque = get_sub_field('titulo_bloque');
				?>             
				<?php if($titulo_bloque) :?>   
					<div class="col-md-4">
						<h3><?php echo $titulo_bloque?></h3>         
					</div>         
				<?php endif ?>
			
				<?php if( have_rows('item') ):?>
					<div id="listado-beneficios" class="col-md-8">
						<?php while ( have_rows('item') ) : the_row();
							$pdf_item = get_sub_field('pdf_item');
							$titulo_item = get_sub_field('titulo_item');
						?>                
						<div class="item-beneficios col">
							<a href="<?php echo $pdf_item?>" target="_blank"><?php echo $titulo_item?></a>
						</div>     
						<?php endwhile;?>   
					</div>
				<?php endif; ?>         
				
				<?php endwhile;?>
			</div>

		<?php endif; ?>   			
	</div>	
</section>	

<?php get_footer(); ?>