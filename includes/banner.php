<?php  if(has_post_thumbnail()): ?>
   <div class="banner-image" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()) ?>)">
        <div class="banner-text">
           <?php 
                $id= get_the_id();
                $post = get_post($id); 
                $theTitle = apply_filters('the_title', $post->post_title); 
                
                 if(strlen($theTitle) < 21):
            ?>
            <h1 class="banner-title">
                <?= $theTitle ?>
                <div class="underline-green underline-50 underline-centered"></div>
            </h1>
            
            <?php else: ?>
            <h1 class="banner-title banner-title-small">
                <?= $theTitle ?>
                <div class="underline-green underline-50 underline-centered"></div>
            </h1>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <h1 class="section-title"><?= $theTitle ?></h1>
<?php endif; ?>