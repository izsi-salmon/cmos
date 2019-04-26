<?php

/*
  Template Name: People template
  Template Post Type: page
*/

?>

<?php

    $peopleArgs = array(
        'post_type' => 'people',
        'order' => 'ASC',
        'orderby' => 'menu_order'
        );
    $people = new WP_Query($peopleArgs);

?>


<?php get_header(); ?>
    
    <div class="banner-image" style="background-image: url(images/CMOSPrint-41.jpg)">
        <div class="banner-text">
            <h1 class="banner-title">
                People
                <div class="underline-green underline-50 underline-centered"></div>
            </h1>
        </div>
    </div>
    
    <?php if($people->have_posts()): ?>
        <div class="section section-people">
            <div class="people-container">
                <?php while($people->have_posts()): $people->the_post(); ?>
                   
                   <?php
                          $postID = get_the_id();
                          $role = get_post_meta($postID, 'staff_role_field', true);
                          $email = get_post_meta($postID, 'staff_email_field', true);
                    ?>
                   
                    <div class="person-card">
                        <?php if(has_post_thumbnail()): ?>
                            <div class="person-image"><?php the_post_thumbnail('avatar'); ?></div>
                        <?php endif; ?>
                        <div class="person-name"><?php the_title(); ?></div>
                        <?php if($role): ?>
                            <div class="person-role"><?= $role; ?></div>
                        <?php endif; ?>
                        <?php if($email): ?>
                            <div class="person-email"><?= $email; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
        
    
<?php get_footer(); ?>