<?php

/*
  Template Name: Contact template
  Template Post Type: page
*/

?>
 
 <?php

    $locationsArgs = array(
        'post_type' => 'locations',
        'order' => 'ASC',
        'orderby' => 'menu_order'
        );
    $locations = new WP_Query($locationsArgs);

?>
  
<?php get_header('contact'); ?>
<?php require 'includes/page-buffer.php'; ?>
<?php require 'includes/banner.php'; ?>
    
    <div class="contact-section">
        <div class="contact-container">
            
            <div class="contact-collumn">
               <?php if( get_theme_mod( 'phone_button_text_setting') != ""): ?>
                   <div class="phone-flex">
                       <?php if( get_theme_mod( 'phone_button_icon_setting')): ?>
                           <?php echo get_theme_mod( 'phone_button_icon_setting'); ?>
                       <?php endif; ?>
                        <span><?php echo get_theme_mod( 'phone_button_text_setting'); ?></span>
                    </div>
               <?php endif; ?>
                
                <?php if($locations->have_posts()): ?>
                    <div class="contact-locations">
                        <?php while($locations->have_posts()): $locations->the_post(); ?>
                            <div class="contact-location">
                                <h3><?php the_title() ?></h3>
                                <?php 
                                    $thecontent = get_the_content();
                                    $addressLines = explode(",", $thecontent);
                                ?>
                                <?php foreach($addressLines as $addressLine): ?>
                                    <p><?= $addressLine ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'contact_cta_link_setting') != ""): ?>
                    <a href="<?= get_theme_mod( 'contact_cta_link_setting') ?>" class="page-cta" target="_blank">
                        <?php if( get_theme_mod( 'contact_cta_text_setting')): ?>
                           <?= get_theme_mod( 'contact_cta_text_setting'); ?>
                       <?php else: ?>
                           <?= get_theme_mod( 'contact_cta_link_setting') ?>
                       <?php endif; ?>
                    </a>
               <?php endif; ?>

             </div>
            
            <div class="contact-collumn">
                <h2 class="form-title">Get a Free Quote:</h2>
                <form action="" class="contact-form">
                    <label for="firstname">Name: *</label>
                    <input type="text" name="name">
                    <label for="email">Email: *</label>
                    <input type="email" name="email">
                    <label for="enquiry">Enquiry: *</label>
                    <textarea name="enquiry"></textarea>
                    <input type="submit" value="submit" class="form-submit">
                </form>
                <p class="submit-warning">Warning: Pressing button will remove all issues regarding cleaning from your life which may lead to celebrations that are hazardous for your health if you do them properly.</p>
            </div>
            
        </div>
    </div>

<?php get_footer(); ?>