<?php 
    $id= get_the_id();
    $post = get_post($id); 
    $content = apply_filters('the_content', $post->post_content); 

?>


<?php get_header(); ?>
<?php require 'includes/page-buffer.php'; ?>
<?php require 'includes/banner.php'; ?>

<div class="section section-margin">
    <?= $content ?>
</div>

<?php get_footer(); ?>