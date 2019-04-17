<?php get_header(); ?>
  
<?php
    $args = array(
        'post_type' => 'slides',
        'order' => 'ASC',
        'orderby' => 'date'
    );
    $slides = new WP_Query($args);
?>
<?php if($slides->have_posts()): ?>
    <div class="swiper-container swiper1">
        <div class="swiper-wrapper">
        <?php while($slides->have_posts()): $slides->the_post(); ?>
            <?php if(has_post_thumbnail() ): ?>
                <div class="swiper-slide">
                <?php the_post_thumbnail('full', ['class'=>'slideshow-img', 'alt'=>'thumbnail image']); ?>
                <div class="slide-content">
                    <div class="slide-text">
                        <div class="emph-slide-text"><?php the_title(); ?></div>
                        <div class="parag-slide-text"><?php the_content()?></div>
                    </div>
                </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
<?php endif; ?>
   
<div class="section section-service-menu">

  <h1 class="page-title">
       <?= get_bloginfo('description'); ?>
       <div class="underline-grey underline-50 underline-centered"></div>
   </h1>

   <h3 class="page-heading">Who are we?</h3>
<p class="page-blurb">We’re a full commercial cleaning solution that can be tailored to any industry. We are not a franchise. We never will be.</p>
<div class="service-menu">
   <a href="commercial-cleaning.html" class="service-menu-item">
       <div><i class="fas fa-building service-icon"></i></div>
       <div class="service-name">Commercial Cleaning</div>
   </a>
   <a href="common-area-cleaning.html" class="service-menu-item">
       <div><i class="fas fa-users service-icon"></i></div>
       <div class="service-name">Common Area Cleaning</div>
   </a>
</div>
</div>

<div class="section testimonial-section">

   <div class="testimonial-heading-wrapper">
       <h2 class="testimonial-heading">
           What our clients say
           <div class="underline-grey underline-60 underline-wrap"></div>
       </h2>
   </div>

   <div class="testimonial-container">

        <div class="testimonial-box">
            <div class="testimonial-content">
                <div class="testimonial-title">
                    What stands out for me about cmos is the enthusiasm and energy the team give every day.
                </div>
                <div class="testimonial-parag">
                    <p>They really work hard to deliver on their promise of a top quality service. I can rely on them to get the job done right and done efficiently with virtually no issues. I also like to know that the people who are on the end of the vacuum are being looked after by their employer and CMOS is quite clearly doing that. I highly recommend CMOS to any other commercial property managers out there. They’re raising the standard for commercial cleaning.</p>
                </div>
                <div class="testimonial-sign">
                    <h5>Jonathan Carr</h5>
                    <p>Bayleys Property Services</p>
                </div>
            </div>
        </div>

        <div class="testimonial-box">
            <div class="testimonial-content">
                <div class="testimonial-title">
                    What stands out for me about cmos is the enthusiasm and energy the team give every day.
                </div>
                <div class="testimonial-parag">
                    <p>They really work hard to deliver on their promise of a top quality service. I can rely on them to get the job done right and done efficiently with virtually no issues. I also like to know that the people who are on the end of the vacuum are being looked after by their employer and CMOS is quite clearly doing that. I highly recommend CMOS to any other commercial property managers out there. They’re raising the standard for commercial cleaning.</p>
                </div>
                <div class="testimonial-sign">
                    <h5>Jonathan Carr</h5>
                    <p>Bayleys Property Services</p>
                </div>
            </div>
        </div>

        <div class="testimonial-box">
            <div class="testimonial-content">
                <div class="testimonial-title">
                    What stands out for me about cmos is the enthusiasm and energy the team give every day.
                </div>
                <div class="testimonial-parag">
                    <p>They really work hard to deliver on their promise of a top quality service. I can rely on them to get the job done right and done efficiently with virtually no issues. I also like to know that the people who are on the end of the vacuum are being looked after by their employer and CMOS is quite clearly doing that. I highly recommend CMOS to any other commercial property managers out there. They’re raising the standard for commercial cleaning.</p>
                </div>
                <div class="testimonial-sign">
                    <h5>Jonathan Carr</h5>
                    <p>Bayleys Property Services</p>
                </div>
            </div>
        </div>

    </div>

</div>


<?php get_footer(); ?>