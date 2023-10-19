	<footer id="pie-pagina" class="seccion-footer">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-auto widget-footer">
					<a href="<?php bloginfo('url');?>"><img class="logo-footer" src="<?php the_field('logo_mye_footer','option'); ?>" alt="MyE Grupo Inmobiliario" title="MyE Grupo Inmobiliario"></a>
					<p><?php the_field('texto_copyright_footer','option'); ?></p>
					<?php
						if( have_rows('redes', 'option') ):?>
						<div class="redes">
							<?php while ( have_rows('redes', 'option') ) : the_row(); 
								$url = get_sub_field('url_red');
								$icono = get_sub_field('img_footer');
							?>                
								<a href="<?php echo $url ?>" target="_blank"><img src="<?php echo $icono ?>" alt=""></a>       
							<?php endwhile;?>
						</div>
					<?php endif; ?>   					
				</div>
				<div class="col-md-auto widget-footer">
					<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
						<?php dynamic_sidebar('sidebar-1'); ?>
					<?php } ?>
				</div>
				<div class="col-md-auto widget-footer">
					<?php
						if( have_rows('contacto_footer', 'option') ):
							while ( have_rows('contacto_footer', 'option') ) : the_row(); 
								$titulo_bloque = get_sub_field('titulo_bloque');
							?>                						
							<h4 class="widgettitle"><?php echo $titulo_bloque?></h4>
							<ul>
								<?php while ( have_rows('items_bloque', 'option') ) : the_row(); 
									$icono = get_sub_field('icono');
									$html = get_sub_field('html');
								?>                
									<li><img src="<?php echo $icono ?>" alt=""><?php echo $html ?></li>
								<?php endwhile;?>
							</ul>
						<?php endwhile;?>
					<?php endif; ?>   
				</div>												
			</div>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
	integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
	crossorigin="anonymous" 
	referrerpolicy="no-referrer" />

	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>


	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>    
	<script src="<?php echo get_stylesheet_directory_uri()?>/js/custom.js"></script>

	<script>
	// get the element
	$(".openModal").click(function() {
		var res = $(this).data('carrusel'); 
		var content = $('#' + res).html();
		console.log(content);
		$('#contenido-carrusel').html(content);
	});   
	</script>	
<?php wp_footer(); ?>
</body>
</html>