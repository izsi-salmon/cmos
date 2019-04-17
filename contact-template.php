<?php

/*
  Template Name: Contact template
  Template Post Type: page
*/

?>
  
<?php get_header(); ?>
    
    <div class="section contact-section">
       <h1 class="section-title">Contact us</h1>
        <div class="contact-container">
            
            <div class="contact-collumn">
                <div class="phone-flex">
                    <i class="fas fa-phone"></i>
                    <span>0800 002 557</span>
                </div>
                <div class="contact-locations">

                    <div class="contact-location">
                        <h3>Auckland</h3>
                        <p>51 Randolph Street</p>
                        <p>Eden Terrace</p>
                        <p>Auckland 1010</p>
                    </div>

                    <div class="contact-location">
                        <h3>Wellington</h3>
                        <p>16 Kaiwharawhara Road</p>
                        <p>Kaiwharawhaura</p>
                        <p>Wellington 6035</p>
                    </div>

                </div>

                <a href="https://docs.google.com/forms/d/e/1FAIpQLSf0fjG7hembg2EDP7VWCeyivzJi5FpwCdBIkT4Sj9K8FOlMzQ/viewform" target="_blank" class="page-cta">Apply for work <i class="fas fa-chevron-right"></i></a>
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