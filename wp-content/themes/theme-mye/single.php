<?php get_header(); ?>

<?php 
	$author = get_the_author();
	$terms = get_the_terms( $post->ID , 'category');
	if($terms) {
	  foreach( $terms as $term ) {
	    $cat_obj = get_term($term->term_id, 'category');
	    $cat_slug = $cat_obj->slug;
	    $cat_name = $cat_obj->name;
	  }
	}
	?>


<section class="contenido-pagina seccion-page pt-0">
	<div class="container">
		<div class="row justify-content-center item-blog">
			<div class="col-md-12 imagen-post">
				<div class="top-detalle text-center">			
					<picture>
						<source media="(max-width: 990px)" srcset="<?php the_post_thumbnail_url('medium'); ?>">
						<source media="(min-width: 991px)" srcset="<?php the_post_thumbnail_url('full'); ?>">
						<img src="<?php the_post_thumbnail_url('full'); ?>">
					</picture>
					<h1 class="titulo-seccion titulo-single"><?php the_title(); ?></h1>		
					<p class="date-item">Subido el <span><?php echo get_the_date(); ?></span> | Creado por <span><?php echo $author ?></span></p>   			
				</div>
			</div>

			<div class="col-md-10 detalle-post">
				<div class="contenido-detalle mt-5 text-justify">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>		
					<?php endwhile; ?>		
					<?php endif; ?>  						
				</div>				
			</div>	
		</div>
	</div>	
</section>	

<?php include 'template_parts/i_last_news.php' ?>

<?php get_footer(); ?>