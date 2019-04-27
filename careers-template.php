<?php

/*
  Template Name: Careers template
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

?>
  
<?php get_header(); ?>
<?php require 'includes/page-buffer.php'; ?>
<?php require 'includes/banner.php'; ?>
    
    <div class="section section-careers-blurb">
        <div class="careers-title">Why do our employees smile so much?</div>
        <div class="careers-parag">
            <p>Being some of the highest paid cleaners in the country probably has something to do with it.</p>
            <p>But, more importantly, it’s because we give them respect, support and appreciation.</p>
        </div>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSf0fjG7hembg2EDP7VWCeyivzJi5FpwCdBIkT4Sj9K8FOlMzQ/viewform" class="page-cta cta-centered" target="_blank">Join the CMOS Family</a>        
    </div>
    
    <div class="section section-employee-values">
        <div class="employee-values-container">
           
            <div class="employee-value-card">
                <div class="employee-value-title">Health</div>
                <p>Staff safety is an absolute priority. Well, we can’t claim all that stuff about helping our people to support their families and then leave hazards all over the place. We’re thinking ‘safer workplaces’ daily, and of course we comply with all health and safety legislation, standards, and codes of practice.</p>
            </div>
            
            <div class="employee-value-card">
                <div class="employee-value-title">Culture</div>
                <p>Our culture comes from celebrating the unique cultural backgrounds of our staff. Staff are encouraged to communicate with each other in their native tongue. When we have vacancies we often take on people that our staff have recommended from within their community. And when we get together, as part of our own lively workplace culture, we often have food and activity that reflects the tastes of our staff, not just of our management.</p>
            </div>
            
            <div class="employee-value-card">
                <div class="employee-value-title">Family</div>
                <p>Family is everything to our cleaning staff. We talk regularly with them to ensure we are providing work that not only supports their family but brings pride to it as well.</p>
            </div>
            
            <div class="employee-value-card">
                <div class="employee-value-title">Gear</div>
                <p>We make sure the team has all the well-maintained, modern appliances and gear they need to do an exceptional job. It’s easier to enjoy your work and take pride in it when you have quality equipment.</p>
            </div>
            
        </div>
    </div>
    
<?php get_footer(); ?>