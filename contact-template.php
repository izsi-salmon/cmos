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

    $pageUrl = get_the_permalink();

    // CONTACT FORM

    if ($_POST) {
		$errors = array();
		$success_messsage = '';
		if (!wp_verify_nonce($_POST['_wpnonce'], 'wp_contact_form')) {
			echo("We cannot save the data at this time. Please try again later.");
			return;
		}
		if (strlen($_POST['full_name']) <= 2) {
			$errors['nameError'] = 'Name is too short. Please enter your full name';
		} elseif (strlen($_POST['full_name']) >= 90) {
			$errors['nameError'] = 'Name is too long.';
		}
		if (strlen($_POST['email']) <= 1) {
			$errors['emailError'] = 'Email is too short. Please enter a valid email.';
		}
		if (strlen($_POST['enquiry']) <= 5) {
			$errors['enquiryError'] = 'Please write a more detailed enquiry';
		} elseif (strlen($_POST['user_message']) >= 400) {
			$errors['enquiryError'] = 'Please write a shorter enquiry';
		}
		if (empty($errors)) {
            
            $success_message = get_theme_mod( 'success_message_setting');
            
            $name = $_POST['full_name'];
            $mailFrom = $_POST['email'];
            $enquiry = $_POST['enquiry'];

            $mailTo = '8m8cat@gmail.com';
            $headers = 'From : '.$mailFrom;
            $message = 'You have recieved an enquiry from: '.$name.'\n\n Message: \n\n'.$enquiry;

            mail($mailTo, 'Website enquiry', $message, $headers);
		}
	}


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
                <form method="post" action="<?= $pageUrl; ?>" class="contact-form">
                    <?php wp_nonce_field('wp_contact_form'); ?>
                    <label for="full_name">Name: *</label>
                    <span class="form-error"><?= $errors['nameError'] ?></span>
                    <input type="text" name="full_name" value="<?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['full_name']) ? $_POST['full_name'] : '' ?> <?php endif; ?>"/>
                    <label for="email">Email: *</label>
                    <span class="form-error"><?= $errors['emailError'] ?></span>
                    <input type="email" name="email" value="<?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['email']) ? $_POST['email'] : '' ?> <?php endif; ?>"/>
                    <label for="enquiry">Enquiry: *</label>
                    <span class="form-error"><?= $errors['enquiryError'] ?></span>
                    <textarea name="enquiry"><?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['enquiry']) ? $_POST['enquiry'] : '' ?> <?php endif; ?></textarea>
                    <input type="submit" name="submit" value="submit" class="form-submit">
                </form>
                
                <?php if($_POST): ?>
                    <p class="submit-message"><?php if($success_message) {echo $success_message;} ?></p>
                <?php else: ?>
                    <p class="submit-message"><?php if(get_theme_mod( 'submit_message_setting') != ""){echo get_theme_mod( 'submit_message_setting');} ?></p>
                <?php endif; ?>
                
            </div>
            
            
        </div>
    </div>

<?php get_footer(); ?>