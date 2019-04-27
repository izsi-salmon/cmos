<?php  if(has_post_thumbnail()): ?>
   <div class="banner-image" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()) ?>)">
        <div class="banner-text">
            <h1 class="banner-title">
                <?php the_title() ?>
                <div class="underline-green underline-50 underline-centered"></div>
            </h1>
        </div>
    </div>
<?php else: ?>
    <h1 class="section-title"><?php the_title() ?></h1>
<?php endif; ?>