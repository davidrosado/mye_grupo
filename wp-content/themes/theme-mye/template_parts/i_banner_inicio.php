<section id="banner-home" class="banner-page">
  <?php
      if( have_rows('banner_principal') ):
          while ( have_rows('banner_principal') ) : the_row(); 
            $texto = get_sub_field('texto_banner'); 
            $imagen = get_sub_field('imagen_banner');    
            $url_youtube = get_sub_field('url_youtube');
            $pagina_enlace = get_sub_field('pagina_enlace'); 
            $texto_enlace = get_sub_field('texto_enlace'); 
          ?>                
            <div class="item-banner">
              <?php if ($imagen): ?>
                <picture class="picture-banner">
                    <source srcset="<?php echo $imagen ?>" media="(max-width: 768px)" />
                    <img src="<?php echo $imagen ?>" alt="" />
                </picture>    
              <?php endif ?>     

              <div class="texto-banner">
                <div class="container">
                    <div class="row">
                        <?php if ($texto): ?>
                            <div class="col-md-6 wow fadeInLeft" data-wow-duration="3s">
                                <?php echo $texto ?>
                                <div class="ctas-banner">
                                    <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal" 
                                    data-src="<?php echo $url_youtube?>" data-bs-target="#modalVideo">
                                      <img src="<?php echo get_stylesheet_directory_uri()?>/images/play-banner.png" alt="">
                                    </button>                                  
                                    <a href="<?php echo $pagina_enlace?>"><?php echo $texto_enlace?></a>
                                </div>
                            </div>                        
                        <?php endif ?>
                    </div>
                </div>
            </div>                          
          <?php endwhile; 
  endif; ?>   
</section>

<!-- Modal -->
<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>        
                <!-- 16:9 aspect ratio -->
        <div class="ratio ratio-16x9">
          <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
        </div>
      </div>

    </div>
  </div>
</div> 