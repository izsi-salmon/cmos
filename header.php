<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/cmos-icon.png">
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
<!--
            <div class="nav visible-desktop">
                <div class="nav-item"><a id="dropdownButton">Services<i class="fas fa-chevron-down drop-down-arrow"></i></a>
                <div class="drop-down-menu visible-desktop" id="dropdownMenu">
                    <a href="commercial-cleaning.html" class="drop-down-menu-item">Commercial Cleaning</a>
                    <a href="common-area-cleaning.html" class="drop-down-menu-item">Common Area Cleaning</a>
                </div></div>
                <div class="nav-item"><a href="about.html">About</a></div>
                <div class="nav-item"><a href="people.html">People</a></div>
                <div class="nav-item"><a href="careers.html">Careers</a></div>
                <div class="nav-item"><a href="contact.html">Contact</a></div>
            </div>
-->
            <?php wp_nav_menu( array(
                'theme_location' => 'header_nav',
                'container_class' => 'nav visible-desktop'
            ) ); ?>

            <?php wp_nav_menu( array(
                'theme_location' => 'header_cta',
                'container_class' => 'cta-header visible-desktop'
            ) ); ?>
            
        </div>
    </div>
    
    <div class="mobile-menu visible-mobile" id ="mobileMenu">
        <div class="nav">
            <div class="nav-item">
                <span>Services</span>
                <div class="mobile-sub-menu">
                    <a href="commercial-cleaning.html" class="mobile-sub-menu-item">Commercial Cleaning</a>
                    <a href="common-area-cleaning.html" class="mobile-sub-menu-item">Common Area Cleaning</a>
                </div>
            </div>
            <div class="nav-item"><a href="about.html">About</a></div>
            <div class="nav-item"><a href="people.html">People</a></div>
            <div class="nav-item"><a href="careers.html">Careers</a></div>
            <div class="nav-item"><a href="contact.html">Contact</a></div>
        </div>
    </div>
    
    <div class="drop-shadow" id="dropshadow"></div>
    
    <div class="mobile-cta visible-mobile" id="freequote">
        <a href="contact.html"><span>Get Free A Quote</span><i class="fas fa-chevron-right"></i></a>
    </div>
    
    <div id="pageBuffer"></div>