<?php

    $locationsArgs = array(
        'post_type' => 'locations',
        'order' => 'ASC',
        'orderby' => 'menu_order'
        );
    $locations = new WP_Query($locationsArgs);

?>
       
       <div class="footer">
        <div class="footer-content">
           
            <div class="contact-buttons">
               
               <?php if( get_theme_mod( 'phone_button_text_setting') != ""): ?>
                   <div class="phone-button">
                       <?php if( get_theme_mod( 'phone_button_icon_setting')): ?>
                           <?php echo get_theme_mod( 'phone_button_icon_setting'); ?>
                       <?php endif; ?>
                        <span><?php echo get_theme_mod( 'phone_button_text_setting'); ?></span>
                    </div>
               <?php endif; ?>
                
                
                <?php if ( has_nav_menu( 'footer_cta' ) ) {
                     wp_nav_menu( array(
                        'theme_location' => 'footer_cta',
                        'container_class' => 'cta-footer'
                     ) );
                } ?>
                
            </div>
            
            <div class="footer-inner">
            
                <?php if ( has_nav_menu( 'adtnl_footer_links' ) ) {
                     wp_nav_menu( array(
                        'theme_location' => 'adtnl_footer_links',
                        'container_class' => 'adtnl-footer-links'
                     ) );
                } ?>
            
                <?php if($locations->have_posts()): ?>
                       <div class="locations-container">
                            <?php while($locations->have_posts()): $locations->the_post(); ?>
                                <div class="location">
                                    <h6 class="location-title"><?php the_title() ?></h6>
                                    <p class="location-address"><?php the_content()?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                <?php endif; ?>
            
            </div>
            
        </div>
    </div>
    <?php if ( has_nav_menu( 'social_media_links' ) ): ?>
        <div class="footer-bar">
         <?php wp_nav_menu( array(
            'theme_location' => 'social_media_links',
            'container_class' => 'adtnl-footer-links'
         ) );
         ?>
         </div>
    <?php endif; ?>
    
    <?php $docMessage = get_theme_mod( 'doc_message_setting'); ?>
    <?php $docTitle = get_bloginfo('name'); ?>

    <?php wp_footer(); ?>
    <script>
        // Function controlling document title change

        window.onblur = function() { 
            var docMessage = '<?= $docMessage; ?>';
            if(docMessage != ""){
                document.title = docMessage; 
            }
        }

        window.onfocus = function() {
            var docTitle = '<?= $docTitle; ?>';
            document.title = docTitle;
        }
        
    </script>
</body>
</html>