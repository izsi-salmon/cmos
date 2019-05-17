<?php

/*
  Template Name: Contact template
  Template Post Type: page
*/

?>
 
 <?php

    $locationsArgs = array(
        'post_type' => 'locations',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
        );
    $locations = new WP_Query($locationsArgs);

    $pageUrl = get_the_permalink();

    // CONTACT FORM

    if ($_POST) {
		$errors = array();
        $success = false;
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
            
            $success = true;
            $success_message = get_theme_mod( 'success_message_setting');
            
            $name = $_POST['full_name'];
            $mailFrom = $_POST['email'];
            $enquiry = $_POST['enquiry'];

            $mailTo = 'welcome@cmos.co.nz';
            $headers =  'MIME-Version: 1.0' . "\r\n"; 
            $headers .= 'From: <'.$mailFrom.'>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
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
            
            <div class="contact-collumn contact-collumn-left">
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
                    <input type="text" required name="full_name" value="<?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['full_name']) ? $_POST['full_name'] : '' ?> <?php endif; ?>"/>
                    <label for="email">Email: *</label>
                    <span class="form-error"><?= $errors['emailError'] ?></span>
                    <input type="email" required name="email" value="<?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['email']) ? $_POST['email'] : '' ?> <?php endif; ?>"/>
                    <label for="enquiry">Enquiry: *</label>
                    <span class="form-error"><?= $errors['enquiryError'] ?></span>
                    <textarea name="enquiry" required><?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['enquiry']) ? $_POST['enquiry'] : '' ?> <?php endif; ?></textarea>
                    <input type="submit" name="submit" value="submit" class="form-submit">
                </form>
                
                <p class="submit-message"><?php if(get_theme_mod( 'submit_message_setting') != ""){echo get_theme_mod( 'submit_message_setting');} ?></p>
                
                <?php if($_POST): ?>
                       <?php if($success === true): ?>                    
                            <div class="success-modal-wrapper" id="successWrapper">
                                <div class="success-modal" id="successModal">

                                    <div class="modal-content">
                                        <div class="success-tick">
                                           <i class="fas fa-check-circle"></i>
                                       </div>
                                       <?php if($success_message != ""): ?>
                                           <p class="modal-text text-secondary"><?= $success_message; ?></p>
                                       <?php else: ?>
                                           <p class="modal-text text-secondary">Thank you for your enquiry.</p>
                                       <?php endif; ?>
                                    </div>

                                    <div class="close" id="closeSuccess">ok</div>

                                </div>
                            </div>
                        <?php endif; ?>
                <?php endif; ?>
                
            </div>
            
            
        </div>
    </div>
    
    <button id="modalButton">Modal Button</button>

<?php get_footer(); ?>