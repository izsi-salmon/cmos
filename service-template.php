<?php

/*
  Template Name: Service template
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

    $pageTitle = get_the_title();

    $subservicesArgs = array(
        'post_type' => 'subservices',
        'meta_query' => array(
            array(
                'key' => 'service_page',
                'value' => $pageTitle
                )
            )
        );
    $subservices = new WP_Query($subservicesArgs);

?>

<?php get_header(); ?>
<?php require 'includes/page-buffer.php'; ?>
<?php require 'includes/banner.php'; ?>
    
    <div class="section section-service-blurb">
        <div class="page-blurb-title">
            <?= $heading ?>
            <div class="underline-green-strong underline-130"></div>
        </div>
        <div class="page-blurb-parag blurb-70">
            <?= $parag ?>
        </div>
    </div>
      
     <?php if($subservices->have_posts()): ?>
        <div class="sub-services-container">
            <?php while($subservices->have_posts()): $subservices->the_post(); ?> 
               
               <?php
                  $postID = get_the_id();
                  $servicepage = get_post_meta($postID, 'service_page', true);
               ?>
            
                   <div class="sub-service">
                        <?php if(has_post_thumbnail()): ?>
                            <div class="sub-service-icon" title="Icons by Freepik from flaticon.com"><?php the_post_thumbnail(); ?></div>
                        <?php endif; ?>
                        <p class="service-description"><?php the_title() ?></p>
                    </div>                                
            
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

<?php get_footer(); ?>