<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <div class="header" id="navbar">
        <div class="column-left">
           
            <?php
                $custom_logo = get_theme_mod('custom_logo');
                $logo_url = wp_get_attachment_image_url($custom_logo, 'small');
            ?>

            <?php if ($custom_logo): ?>
                <a href="<?= get_site_url(); ?>"><img src="<?= $logo_url ?>" alt="Logo"></a>
            <?php endif; ?>
            
        </div>
        
        <div class="column-right">
            <i class="fas fa-bars visible-mobile hamburger-icon" id="hamburgerIcon"></i>
            
            <div class="nav" id="mobileMenu">
               <?php if ( has_nav_menu( 'header_nav' ) ) {
                     wp_nav_menu( array(
                        'theme_location' => 'header_nav'
                     ) );
                } ?>
            </div>
                
                <?php if ( has_nav_menu( 'header_cta' ) ) {
                     wp_nav_menu( array(
                        'theme_location' => 'header_cta',
                        'container_class' => 'cta-header visible-desktop',
                        'container_id' => 'headerCta'
                     ) );
                } ?>
            
        </div>
    </div>
    
    <div class="drop-shadow" id="dropshadow"></div>
 








