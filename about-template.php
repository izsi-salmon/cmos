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

    $aboutValuesArgs = array(
        'post_type' => 'aboutValues'
        );
    $aboutValues = new WP_Query($aboutValuesArgs);
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
            
            <div class="about-image">
<!--                <img src="images/CMOSPrint-16.jpg" alt="">-->
            </div>
            
        </div>
    </div>

      <?php if($aboutValues->have_posts()): ?>
        <div class="underline-grey separator"></div>
        
            <?php while($aboutValues->have_posts()): $aboutValues->the_post(); ?>
               
            <?php
                  $postID = get_the_id();
                  $ctaLink = get_post_meta($postID, 'cta_link_text', true);
                  $ctaText = get_post_meta($postID, 'cta_text_text', true);
            ?>
               
                <div class="section-value">

                    <div class="page-blurb-title">
                        <?php the_title() ?>
                        <div class="underline-green-strong underline-130"></div>
                    </div>
                        <?php the_content() ?>

                    <div class="value-cards-container">

                        <div class="value-card">
                            <div class="value-icon"><i class="fas fa-globe-europe"></i></div>
                            <div class="value-text">
                                <div class="value-title">We use green products wherever possible</div>
                                <p class="value-parag">We’re always on the lookout for effective new eco products that we can incorporate into our business. We currently use a range of environmentally friendly and non-toxic floor cleaners and spray cleaners for desks, benchtops and windows.</p>
                            </div>
                        </div>

                        <div class="value-card">
                            <div class="value-icon"><i class="fas fa-recycle"></i></div>
                            <div class="value-text">
                                <div class="value-title">We recycle</div>
                                <p class="value-parag">CM Office Services can supply separate recycling pods for glass, cardboard, compost material and general waste. We can make sure that you’re putting as little into landfill as possible.</p>
                            </div>
                        </div>

                        <div class="value-card">
                            <div class="value-icon"><i class="fas fa-car-side"></i></div>
                            <div class="value-text">
                                <div class="value-title">We carpool</div>
                                <p class="value-parag">Our staff regularly car-pool to work and between the sites at night. As well as reducing fuel consumption and carbon emissions, it has helped to build a supportive culture and a family atmosphere in our business.</p>
                            </div>
                        </div>

                        <div class="value-card">
                            <div class="value-icon"><i class="fas fa-tree"></i></div>
                            <div class="value-text">
                                <div class="value-title">We celebrate with trees</div>
                                <p class="value-parag">At the end of every year, we team up with the Sustainable Business Network and plant trees relative to the size of every new contract we earned in those 12 months.</p>
                            </div>
                        </div>

                    </div>
                    
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
    
    

        <div class="underline-grey separator"></div>

        <div class="section-value">

            <div class="page-blurb-title">
                Security
                <div class="underline-green-strong underline-130"></div>
            </div>
            <div class="page-blurb-parag blurb-70">
                <p>We work hard to ensure that staff know the rules. They’re happy to follow them because everyone is on the same page here, unified and motivated to do an exceptional job.</p>
            </div>

            <div class="value-cards-container">

                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-user"></i></div>
                    <div class="value-text">
                        <p class="value-parag">As part of our welcome, new members of the CMOS family are introduced to our culture of integrity and responsibility. Clear expectations are set and they’re given training to ensure they know how to meet our high security standards.</p>
                    </div>
                </div>

                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-building"></i></div>
                    <div class="value-text">
                        <p class="value-parag">1. Only authorised staff are allowed on site at all times – no exceptions. 2. Staff are never on site without their ID tag and CMOS uniform. Supervisors are checking closely for these things at the start of every shift. Also, every member of the CMOS team goes through this security process before they receive the coveted blue shirt.</p>
                    </div>
                </div>

                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-user-check"></i></div>
                    <div class="value-text">
                        <p class="value-parag">Past employers are contacted to verify credentials and to provide a character assessment. Nobody with a past record of misconduct is hired.</p>
                    </div>
                </div>

                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-address-card"></i></div>
                    <div class="value-text">
                        <p class="value-parag">We check for any criminal record with the New Zealand Police. You can be sure that all CMOS people are law-abiding citizens.</p>
                    </div>
                </div>

            </div>

            <div class="centred-content">
                <a href="contact.html" class="page-cta value-cta">Commence your secure and trustworthy cleaning service today</a>
            </div>

        </div>
    
<?php get_footer(); ?>