<?php

/*
  Template Name: Careers template
  Template Post Type: page
*/

?>
 
<?php 
    $id= get_the_id();
    $post = get_post($id); 
    $content = apply_filters('the_content', $post->post_content); 
    $h2 = substr($content, 0, strpos($content, '</h2>') );
    $allParags = explode("</h2>", $content);
    unset($allParags[0]);
    $parag = implode($allParags);
    $heading = strip_tags($h2);

    $careervaluesArgs = array(
        'post_type' => 'careervalues',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
        );
    $careervalues = new WP_Query($careervaluesArgs);

?>
  
<?php get_header(); ?>
<?php require 'includes/page-buffer.php'; ?>
<?php require 'includes/banner.php'; ?>
    
    <div class="section section-careers-blurb">
        <div class="careers-title"><?= $heading ?></div>
        <div class="careers-parag">
            <?= $parag ?>
        </div>
        
        <?php if( get_theme_mod( 'career_cta_link_setting') != ""): ?>
            <a href="<?= get_theme_mod( 'career_cta_link_setting') ?>" class="page-cta cta-centered" target="_blank">
                <?php if( get_theme_mod( 'career_cta_text_setting')): ?>
                   <?= get_theme_mod( 'career_cta_text_setting'); ?>
               <?php else: ?>
                   <?= get_theme_mod( 'career_cta_link_setting') ?>
               <?php endif; ?>
            </a>
       <?php endif; ?>
        
    </div>
    
    <?php if($careervalues->have_posts()): ?>
        <div class="section section-employee-values">
            <div class="employee-values-container">
                <?php while($careervalues->have_posts()): $careervalues->the_post(); ?>
           
                    <div class="employee-value-card">
                        <div class="employee-value-title"><?php the_title() ?></div>
                        <p><?php the_content() ?></p>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    
<?php get_footer(); ?>