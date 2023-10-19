<?php
$dev = TRUE;
$v_ = ($dev) ? '?v=' . rand(100, 999) : '';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php the_title();?> | <?php bloginfo('title')?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri()?>/favicon.png">

	<?php // HOJA DE ESTILOS?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/style.css<?=$v?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/css/animate.css" />	
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/wow.min.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<?php wp_head(); ?>	
</head>

<body <?php body_class(); ?>>


	<div id="top-header">
		<div class="container">
			<div class="row justify-content-between align-items-center col-md-12">
				<div class="col redes-header redes">
					<?php
						if( have_rows('redes', 'option') ):
							while ( have_rows('redes', 'option') ) : the_row(); 
								$url = get_sub_field('url_red');
								$icono = get_sub_field('img_header');
							?>                
								<a href="<?php echo $url ?>" target="_blank"><img src="<?php echo $icono; ?>" alt=""></a>        
							<?php endwhile; 
					endif; ?>   
				</div>
				<div class="col contacto-header">
					<?php
						$ch = 0;
						if( have_rows('contacto_header', 'option') ):
							while ( have_rows('contacto_header', 'option') ) : the_row(); ?>                					
							<ul>
								<?php while ( have_rows('items_bloque', 'option') ) : the_row(); $ch++;
									$icono = get_sub_field('icono');
									$html = get_sub_field('html');
								?>          
									<?php if($ch < 3) :?>      
										<li id="item-<?php echo $ch?>"><img src="<?php echo $icono ?>" alt=""><?php echo $html ?></li>
									<?php endif ?>
								<?php endwhile;?>
							</ul>
						<?php endwhile;?>
					<?php endif; ?>   					
				</div>
			</div>	
		</div>	
	</div>
	<header id="cabecera-site">
		<div class="container">
			<div class="row justify-content-between align-items-center col-md-12">
				<div id="identidad" class="col-md-auto col-sm-auto wow fadeInDown" data-wow-duration="3s">
					<a href="<?php bloginfo('url');?>"><img src="<?php the_field('logo_mye','option'); ?>" alt="MyE Grupo Inmobiliario" title="MyE Grupo Inmobiliario"></a>
				</div>				
				<button id="open-menu"><i class="fas fa-bars"></i></button>
				<div id="menu-site" class="col-md-auto col-sm-auto wow fadeInDown" data-wow-duration="3s">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
				<div id="cta-header" class="col-md-auto col-sm-auto wow fadeInDown" data-wow-duration="3s">
					<?php
						$ch2 = 0;
						if( have_rows('contacto_header', 'option') ):
							while ( have_rows('contacto_header', 'option') ) : the_row(); 
							$button_html = get_sub_field('button_html');
							?>                					
							<ul>
								<?php while ( have_rows('items_bloque', 'option') ) : the_row(); $ch2++;
									$icono = get_sub_field('icono');
									$html = get_sub_field('html');
								?>          
									<?php if($ch2 >2) :?>      
										<li id="item-<?php echo $ch2?>"><img src="<?php echo $icono ?>" alt=""><?php echo $html ?></li>
									<?php endif ?>
								<?php endwhile;?>
							</ul>
							<?php echo $button_html ?>
						<?php endwhile;?>
					<?php endif; ?>   
				</div>				
			</div>
		</div>
	</header>