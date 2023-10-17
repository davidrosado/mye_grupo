<?php 
    /* Template Name: About Us */ 
  get_header(); 
?>

<?php 
  include 'template_parts/i_banner_page.php'
?>

<?php if( have_rows('bloque_conocenos') ):?>
    <section id="conocenos" class="seccion-interna">
        <?php while ( have_rows('bloque_conocenos') ) : the_row(); 
                $titulo_seccion = get_sub_field('titulo_seccion');
                $seccion_textos = get_sub_field('seccion_textos');
                $imagen_compromiso = get_sub_field('imagen_compromiso');
                $texto_compromiso = get_sub_field('texto_compromiso');
                $imagen_1 = get_sub_field('imagen_1');
                $imagen_2 = get_sub_field('imagen_2');
                $imagen_3 = get_sub_field('imagen_3');
            ?>                
                <div class="container">
                    <div class="row">
                        <?php if ($titulo_seccion): ?>
                            <div class="col-12">
                                <p class="titulo-seccion-interna">
                                    <?php echo $titulo_seccion ?>
                                </p>   
                            </div>
                        <?php endif ?>
                        
                        <div class="col-md-6 left-seccion-conocenos">
                            <?php if ($seccion_textos): ?>
                                <div class="col textos-seccion-conocenos">
                                    <?php echo $seccion_textos ?>
                                </div>      
                            <?php endif ?>   
                            <?php if ($texto_compromiso): ?>
                                <div class="seccion-compromiso d-flex">
                                    <?php if ($imagen_compromiso): ?>
                                        <div class="col icono-compromiso">
                                            <img src="<?php echo $imagen_compromiso ?>" alt="">
                                        </div>
                                    <?php endif ?> 
                                    <div class="col texto-compromiso">
                                        <?php echo $texto_compromiso ?>
                                    </div>                                      
                                </div>
    
                            <?php endif ?>                               
                        </div>

                        <div class="col-md-6 right-seccion-conocenos">
                            <div class="d-flex flex-wrap">
                                <?php if ($imagen_1): ?>
                                    <img class="img-responsive img-right-seccion-conocenos" src="<?php echo $imagen_1 ?>"/>
                                <?php endif ?>   
                                <?php if ($imagen_2): ?>
                                    <img class="img-responsive img-right-seccion-conocenos" src="<?php echo $imagen_2 ?>"/>
                                <?php endif ?>   
                                <?php if ($imagen_3): ?>
                                    <img class="img-responsive img-right-seccion-conocenos" src="<?php echo $imagen_3 ?>"/>
                                <?php endif ?>    
                            </div>              
                        </div>
                    </div>   
                </div>             
        <?php endwhile; ?>
    </section>
<?php endif; ?>   

<?php if( have_rows('bloque_nuestros_valores') ):?>
    <section id="nuestros_valores" class="seccion-interna">
        <?php while ( have_rows('bloque_nuestros_valores') ) : the_row(); 
                $titulo_seccion = get_sub_field('titulo_seccion');
                $seccion_textos = get_sub_field('seccion_textos');
            ?>                
                <div class="container">
                    <div class="row">
                        <?php if ($titulo_seccion): ?>
                            <div class="col-12">
                                <p class="titulo-seccion-interna">
                                    <?php echo $titulo_seccion ?>
                                </p>   
                            </div>
                        <?php endif ?>
                        <?php if ($seccion_textos): ?>
                            <div class="col-12 textos-seccion-nuestros-valores">
                                <?php echo $seccion_textos ?>
                            </div>      
                        <?php endif ?>     
                    </div>   

                    <?php if( have_rows('seccion_widget') ):?>
                        <div class="row items-nuestros-valores">
                            <?php while ( have_rows('seccion_widget') ) : the_row(); 
                                $icono = get_sub_field('icono');
                                $titulo = get_sub_field('titulo');
                                $texto = get_sub_field('texto');
                            ?>                
                                <div class="item-nuestros-valores col-md-4">           
                                    <?php if ($icono): ?>
                                        <img class="img-responsive img-item" src="<?php echo $icono ?>"/>
                                    <?php endif ?>      
                                    <?php if ($titulo): ?>                                                    
                                        <h3><?php echo $titulo ?></h3>
                                    <?php endif ?>        
                                    <?php if ($texto): ?>                                                    
                                        <p><?php echo $texto ?></p>
                                    <?php endif ?>                                                                            
                                </div>                  
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>                       
                </div>             
        <?php endwhile; ?>
    </section>
<?php endif; ?>   
<?php get_footer(); ?>