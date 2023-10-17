<section class="banner-page">
    <div class="item-banner">
        <?php 
            $imagen = get_field('imagen_banner');
            $title = get_the_title('');
        ?>
        <?php if ($imagen): ?>
            <picture class="picture-banner">
                <source srcset="<?php echo $imagen ?>" media="(max-width: 768px)" />
                <img src="<?php echo $imagen ?>" alt="" />
            </picture>    
        <?php endif ?>      

        <div class="texto-banner">
            <div class="container">
                <div class="row">
                    <?php if ($title): ?>
                        <div class="texto-banner col text-center wow fadeInLeft" data-wow-duration="3s">
                            <h1><?php echo $title ?></h1>
                            <p class="breadcrumb-banner">Inicio / <?php echo $title ?></p>
                        </div>                        
                    <?php endif ?>
                </div>
            </div>
        </div>  
    </div>
</section>