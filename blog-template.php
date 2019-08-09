<?php

/*
  Template Name: Blog template
  Template Post Type: page
*/

?>


<?php get_header(); ?>
<?php require 'includes/page-buffer.php'; ?>
<?php require 'includes/banner.php'; ?>

<?php
    $blogpostsArgs = array(
        'post_type' => 'blogposts',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'date'
        );
    $blogposts = new WP_Query($blogpostsArgs);
?>


<div class="section blog-section">
    <?php if($blogposts->have_posts()): ?>
      
       <?php if(sizeof($blogposts->posts) < 3): ?>

          <div class="blog-row blog-row-centered">
                <?php while($blogposts->have_posts()): $blogposts->the_post(); ?>
                    <div class="blog-card">
                        <a href="<?= esc_url(get_permalink()) ?>" class="blog-card-image-container">
                           <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" class="blog-card-image">
                        </a>
                        <div class="blog-card-content">
                            <h4 class="blog-card-title"><a href="<?= esc_url(get_permalink()) ?>"><?= the_title(); ?></a></h4>
                            <p class="blog-card-date"><?php echo get_the_date( 'd/m/y' ); ?></p>
                            <div class="blog-card-description"><?= the_excerpt() ?></div>
                            <a href="<?= esc_url(get_permalink()) ?>" class="blog-card-read-more">Read more</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
      
       <?php else: ?>
       
           <div class="blog-row">
                <?php while($blogposts->have_posts()): $blogposts->the_post(); ?>
                    <div class="blog-card">
                        <a href="<?= esc_url(get_permalink()) ?>" class="blog-card-image-container">
                           <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" class="blog-card-image">
                        </a>
                        <div class="blog-card-content">
                            <h4 class="blog-card-title"><a href="<?= esc_url(get_permalink()) ?>"><?= the_title(); ?></a></h4>
                            <p class="blog-card-date"><?php echo get_the_date( 'd/m/y' ); ?></p>
                            <div class="blog-card-description"><?= the_excerpt() ?></div>
                            <a href="<?= esc_url(get_permalink()) ?>" class="blog-card-read-more">Read more</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
      
       <?php endif; ?>
           
    <?php endif; ?>

</div>


<?php get_footer(); ?>