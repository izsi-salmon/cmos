<?php 
    $id= get_the_id();
    $post = get_post($id); 
    $content = apply_filters('the_content', $post->post_content); 

?>

<?php get_header(); ?>
<?php require 'includes/page-buffer.php'; ?>

<?php  if(has_post_thumbnail()): ?>
   <div class="banner-image" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()) ?>)"></div>
<?php endif; ?>


<?php while(have_posts()) : the_post(); ?>
    <div class="section section-margin">
        <h2 class="blog-title"><?= the_title(); ?></h2>
        <div class="blog-details">
            <span>By <?php the_author(); ?>, <?php echo get_the_date( 'F j, Y' ); ?></span>
        </div>
        <?php the_content(); ?>
    </div>
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>