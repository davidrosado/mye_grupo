<?php get_header(); ?>

<section id="contenido-pagina" class="seccion-page">
	<div class="container">
		<div class="row my-3">
			<h2 class="titulo-pagina"><?php the_title(); ?></h2>
		</div>
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

<?php get_footer(); ?>