<?php get_header(); ?>
<?php require 'includes/page-buffer.php'; ?>
  
<?php

    $slideArgs = array(
        'post_type' => 'slides',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    $slides = new WP_Query($slideArgs);

    $testimonialArgs = array(
        'post_type' => 'testimonials',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    $testimonials = new WP_Query($testimonialArgs);

?>

<?php if($slides->have_posts()): ?>
    <div class="swiper-container swiper-container-header swiper1">
        <div class="swiper-wrapper">
        <?php while($slides->have_posts()): $slides->the_post(); ?>
            <?php if(has_post_thumbnail() ): ?>
                <div class="swiper-slide">
                <?php the_post_thumbnail('full', ['class'=>'slideshow-img', 'alt'=>'thumbnail image']); ?>
                <div class="slide-content">
                    <div class="slide-text">
                        <div class="emph-slide-text"><?php the_title(); ?></div>
                        <div class="parag-slide-text"><?php the_content()?></div>
                    </div>
                </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
<?php endif; ?>
   
<div class="section section-service-menu">

  <h1 class="page-title">
       <?= get_bloginfo('description'); ?>
       <div class="underline-grey underline-50 underline-centered"></div>
   </h1>
   
   <?php if( get_theme_mod( 'site_blurb_title_setting') != "" ): ?>
       <h3 class="page-heading"><?php echo get_theme_mod( 'site_blurb_title_setting'); ?></h3>
   <?php endif; ?>
   
   <?php if( get_theme_mod( 'site_blurb_setting') != "" ): ?>
       <p class="page-blurb"><?php echo get_theme_mod( 'site_blurb_setting'); ?></p>
   <?php endif; ?>
   
   <?php if( get_theme_mod( 'service_1_link_setting') != "" ): ?>
       <div class="service-menu">
         
          <?php if( get_theme_mod( 'service_1_link_setting') != "" ): ?>
              <a href="<?= get_site_url(); ?>/<?php echo get_theme_mod( 'service_1_link_setting'); ?>" class="service-menu-item">
                <?php if( get_theme_mod( 'service_1_icon_setting') != "" ): ?>
                    <div class="service-icon"><?php echo get_theme_mod( 'service_1_icon_setting'); ?></div>
                <?php endif; ?>
                <?php if( get_theme_mod( 'service_1_title_setting') != "" ): ?>
                    <div class="service-name"><?php echo get_theme_mod( 'service_1_title_setting'); ?></div>
                <?php endif; ?>
               </a>
          <?php endif; ?>
          
          <?php if( get_theme_mod( 'service_2_link_setting') != "" ): ?>
              <a href="<?php echo get_site_url(); ?>/<?php echo get_theme_mod( 'service_2_link_setting'); ?>" class="service-menu-item">
                <?php if( get_theme_mod( 'service_2_icon_setting') != "" ): ?>
                    <div class="service-icon"><?php echo get_theme_mod( 'service_2_icon_setting'); ?></div>
                <?php endif; ?>
                <?php if( get_theme_mod( 'service_2_title_setting') != "" ): ?>
                    <div class="service-name"><?php echo get_theme_mod( 'service_2_title_setting'); ?></div>
                <?php endif; ?>
           </a>
          <?php endif; ?>
           
        </div>
   <?php endif; ?>

</div>

<?php if($testimonials->have_posts()): ?>
    <div class="section testimonial-section">
          <?php if( get_theme_mod( 'testimonial_heading_setting') != "" ): ?>
            <div class="testimonial-heading-wrapper">
               <h2 class="testimonial-heading">
                   What our clients say
                   <div class="underline-grey underline-60 underline-wrap"></div>
               </h2>
           </div>
          <?php endif; ?>
              
                <?php if(sizeof($testimonials->posts) < 3): ?>
                  
                    <div class="swiper-container swiper2">
                        <div class="swiper-wrapper">
                        
                        <?php while($testimonials->have_posts()): $testimonials->the_post(); ?>
                        
                            <?php
                              $postID = get_the_id();
                              $association = get_post_meta($postID, 'client_association', true);
                              $heading = get_post_meta($postID, 'testimonial_heading', true);
                            ?>
                        
                            <div class="swiper-slide swiper2-slide">
                                <div class="testimonial-content-full">
                                    <?php if($heading): ?>
                                        <div class="testimonial-title">
                                            <?= $heading ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="testimonial-parag">
                                        <p><?php the_content() ?></p>
                                    </div>
                                    <div class="testimonial-sign">
                                        <h5><?php the_title() ?></h5>
                                        <?php if($association): ?>
                                            <p><?= $association ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(has_post_thumbnail() ): ?>
                                        <?php the_post_thumbnail('medium', ['class'=>'business-logo', 'alt'=>'Testimonial Business Logo']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        
                        <?php endwhile; ?>
                        
                        </div>
                        <div class="swiper-pagination swiper-pagination-large"></div>
                    </div>
                
                <?php else: ?>
                
                    <div class="swiper-container swiper3">
                        <div class="swiper-wrapper">
                        
                        <?php while($testimonials->have_posts()): $testimonials->the_post(); ?>
                        
                            <?php
                              $postID = get_the_id();
                              $association = get_post_meta($postID, 'client_association', true);
                              $heading = get_post_meta($postID, 'testimonial_heading', true);
                            ?>
                        
                            <div class="swiper-slide swiper3-slide">
                                <div class="testimonial-content">
                                    <?php if($heading): ?>
                                        <div class="testimonial-title">
                                            <?= $heading ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="testimonial-parag">
                                        <p><?php the_content() ?></p>
                                    </div>
                                    <div class="testimonial-sign">
                                        <h5><?php the_title() ?></h5>
                                        <?php if($association): ?>
                                            <p><?= $association ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(has_post_thumbnail() ): ?>
                                        <?php the_post_thumbnail('medium', ['class'=>'business-logo', 'alt'=>'Testimonial Business Logo']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        <?php endwhile; ?>
                        
                        </div>
                        <?php if(sizeof($testimonials->posts) == 3): ?>
                            <div class="swiper-pagination swiper-pagination-large hidden-pagination"></div>
                        <?php else: ?>
                            <div class="swiper-pagination swiper-pagination-large"></div>
                        <?php endif; ?>
                    </div>
                
                <?php endif; ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>