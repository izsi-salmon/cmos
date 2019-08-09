<?php

/* @package cmosTheme */

if( post_password_required() ){
    return;
}

?>


<div id="comments" class="comments-area">
   
   <h3 class="comments-title">
       <?php
        printf(
            esc_html( _nx('One comment', '%1$s Comments', get_comments_number(), 'cmosTheme') ),
            number_format_i18n( get_comments_number() ),
        );
       ?>
   </h3>   
   <hr class="comments-underline"></hr>
   
   <?php

        $fields  = array(
            'author' =>
               '<p class="comment-form-author comments-text-input">' .
               '<input id="author" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) .
               '" required="required" /></p>',
            'email' =>
                '<p class="comment-form-email comments-text-input">' .
                '<input id="email" name="email" type="email" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" required="required" /></p>',
            'cookies' =>
               '<p class="comment-form-cookies-consent comments-cookie">
               <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" class="comments-cookie-input"' . $consent . ' />' . 
            '<label for="wp-comment-cookies-consent" class="text-secondary">' . __( 'Save my name, email, and website in this browser for the next time I comment.' ) . 
            '</label></p>'
        );
            
        $args = array(
            'class_form' => 'cmos-comments-form',
            'class_submit' => 'form-submit',
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title comments-sub-title">',
            'title_reply' => 'Leave a comment',
            'title_reply_to' => 'Reply to %s',
            'logged_in_as' => '<p class="logged-in-as text-secondary">' . sprintf( __( 'Logged in as %2$s, <a href="%3$s" title="Log out of this account" class="logged-in-as-link">log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'comment_notes_before' => '<p class="comment-notes text-secondary">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
            'comment_field' => '<p class="comment-form-comment comments-text-input"><textarea id="comment" name="comment" placeholder="Comment" aria-required="true">' . '</textarea></p>',
            'submit_field' => '%1$s %2$s',
            'fields' => apply_filters('comment_form_default_fields', $fields)
        );
    ?>
    
    <?php comment_form($args); ?>
    
    <hr class="comments-underline"></hr>
    
    <?php if( have_comments() ): ?>
    <!--  We have comments  -->
       <?php function format_comment($comment, $args, $depth) {  ?>
                   <li <?php comment_class('comment-item'); ?> id="li-comment-<?php comment_ID() ?>">
                      <div class="comment-content">
                           <div class="comment-avatar-container">
                               <?php echo get_avatar($comment, 40, $default, $alt, $args); ?>
                           </div>
                           <div class="comment-text-content">
                               <span class="comment-author"><?php echo get_comment_author(); ?></span>
                               <span class="comment-date text-secondary"><?php echo get_comment_date(); ?>, <?php echo get_comment_time(); ?></span>
                               <div class="comment-text"><?php echo get_comment_text(); ?></div>
                               <a href="<?php get_comment_reply_link(); ?>"><?php echo $args['reply_text'] ?></a>
                           </div>
           <?php } ?>
        
        <?php function close_comment($comment, $args, $depth){ ?>
                       </div>
                    </li>
            <?php if($depth !== 1): ?>
                <hr class="comments-underline comments-underline-between"></hr>
            <?php endif; ?>

       <?php } ?>
        
        <ol class="custom-comments-list">
            <?php
            
            $args = array(
                'walker' => null,
                'max_depth' => 2,
                'style' => 'ol',
                'callback' => 'format_comment',
                'end-callback' => 'close_comment',
                'type' => 'all',
                'reply_text' => 'Reply',
                'page' => '',
                'per_page' => '',
                'avatar_size' => 40,
                'reverse_top_level' => true,
                'reverse_children' => '',
                'format' => 'html5',
                'short_ping' => false,
                'echo' => true
            );
            
            wp_list_comments($args);
            
            ?>
        </ol>        
       
        <?php if( !comments_open() && get_comments_number() ): ?>
            <p><?php esc_html_e('Comments are closed', 'cmosTheme'); ?></p>
        <?php endif; ?>
    
    <?php endif; ?>
    
</div>