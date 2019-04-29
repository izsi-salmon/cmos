<?php

/*
  Template Name: About template
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

    $aboutvaluesArgs = array(
        'post_type' => 'aboutvalues'
        );
    $aboutvalues = new WP_Query($aboutvaluesArgs);

?>

<?php get_header(); ?>
<?php require 'includes/page-buffer.php'; ?>
<?php require 'includes/banner.php'; ?>
    
    <div class="section section-about-blurb">
        <div class="about-blurb-container">
           
            <div class="about-text">
                <div class="page-blurb-title">
                    <?= $heading; ?>
                    <div class="underline-green-strong underline-130"></div>
                </div>
                <div class="page-blurb-parag">
                    <?= $parag; ?>
                </div>
                <?php if( get_theme_mod( 'about_cta_link_setting') != ""): ?>
                    <a href="<?= get_theme_mod( 'about_cta_link_setting') ?>" class="page-cta">
                        <?php if( get_theme_mod( 'about_cta_text_setting')): ?>
                           <?= get_theme_mod( 'about_cta_text_setting'); ?>
                       <?php else: ?>
                           <?= get_theme_mod( 'about_cta_link_setting') ?>
                       <?php endif; ?>
                    </a>
                       <?php if( get_theme_mod( 'about_cta_tagline_setting')): ?>
                           <p class="italic text-secondary"><?= get_theme_mod( 'about_cta_tagline_setting') ?></p>
                       <?php endif; ?>
               <?php endif; ?>
            </div>
            
            <?php

                $postID = get_the_id();
                $customImageID = get_post_meta($postID, 'custom_image', true);
                $customImageURL = wp_get_attachment_image_url($customImageID, 'full', false);

            ?>
            
            <?php if($customImageURL): ?>
                <div class="about-image">
                    <img src="<?= $customImageURL ?>">
                </div>
            <?php endif ?>
            
        </div>
    </div>

      <?php if($aboutvalues->have_posts()): ?>
        
            <?php while($aboutvalues->have_posts()): $aboutvalues->the_post(); ?>
               
            <?php
                $postID = get_the_id();
                $valueTitle = get_the_title();
                $ctaLink = get_post_meta($postID, 'aboutValue_cta_link', true);
                $ctaText = get_post_meta($postID, 'aboutValue_cta_text', true);

                $subvaluesArgs = array(
                    'post_type' => 'subvalues',
                    'meta_query' => array(
                        array(
                            'key' => 'value_section',
                            'value' => $valueTitle
                            )
                        )
                    );
                $subvalues = new WP_Query($subvaluesArgs);
            ?>
            
               <div class="underline-grey separator"></div>
               
                <div class="section-value">

                    <div class="page-blurb-title">
                        <?= $valueTitle ?>
                        <div class="underline-green-strong underline-130"></div>
                    </div>
                        <?php the_content() ?>
                        
                        <?php if($subvalues->have_posts()): ?>
                           <div class="value-cards-container">
                            <?php while($subvalues->have_posts()): $subvalues->the_post(); ?>
                                
                                <?php
                                      $postID = get_the_id();
                                      $getIcon = get_post_meta($postID, 'sub_value_icon', true);
                                      $valueIcon = str_replace("'", '"', $getIcon);
                                      $valueSection = get_post_meta($postID, 'value_section', true);
                                      
                                ?>

                                <div class="value-card">
                                    <div class="value-icon"><?= $valueIcon ?> </div>
                                    <div class="value-text">
                                        <?php if( ! empty( $post->post_title ) ) : ?>
                                            <div class="value-title"><?php the_title(); ?></div>
                                        <?php endif; ?>
                                        <p class="value-parag"><?php the_content(); ?></p>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>    
                    
                    <?php if ($ctaLink): ?>
                    
                        <div class="centred-content">
                            <a href="<?= $ctaLink ?>" class="page-cta value-cta">
                                <?php if ($ctaText): ?>
                                    <?= $ctaText ?>
                                <?php else: ?>
                                    <?= $ctaLink ?>
                                <?php endif; ?>
                            </a>
                        </div>
                    
                    <?php endif; ?>                    

                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    
    
<?php get_footer(); ?>