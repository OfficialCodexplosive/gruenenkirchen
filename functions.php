<?php

add_action( 'wp_enqueue_scripts', 'register_gk_styles' );

function gk_register_widget()
{
  
}

add_action( 'wp_enqueue_scripts', 'gk_content_articles' );
function gk_content_articles($_content)
{
  $string = $_content;
  $pattern = '/<a(.*?)class="(.*?)participate(.*?)"(.*?)>(.*?)<\/a>/';

  preg_match_all($pattern, $string, $matches);
  $full_pattern_matches = $matches[0];

  foreach($full_pattern_matches as $full_match)
  {
    echo $full_match;
  }
}

add_action( 'wp_enqueue_scripts', 'gk_content_without_articles' );
function gk_content_without_articles($_content)
{
  $string = $_content;
  $pattern = '/<a(.*?)class="(.*?)participate(.*?)"(.*?)>(.*?)<\/a>/';
  $replacement = '';
  $repl_content = preg_replace($pattern, $replacement, $string);
  echo $repl_content;
}



add_post_type_support( 'page', 'excerpt' );

remove_filter('the_content','wpautop');

remove_filter('the_excerpt','wpautop');
remove_filter('the_title','wpautop');

add_action('widgets_init', 'gk_register_widget');

do_action('customize_register');

function register_gk_styles() { 
    wp_enqueue_style( 'themestyle', get_stylesheet_uri() );
    
    wp_register_style( 'main', get_template_directory_uri() . '/css/style.css'  );
    wp_enqueue_style( 'main' );
    

    wp_register_script('gkscript', 
                        get_template_directory_uri() .'/js/script.js',   
                        null, false, true);
    wp_enqueue_script('gkscript');

    wp_register_script('gkunfocus',
                        get_template_directory_uri() .'/js/hide_unfocus.js',
                        null, false, true);
    wp_enqueue_script('gkunfocus');
   
}

add_shortcode( 'contact-form', 'display_contact_form' );

function display_contact_form() {

	$validation_messages = [];
	$success_message = '';

	if ( isset( $_POST['contact_form'] ) ) {

		//Sanitize the data
		$full_name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

		//Validate the data
		if ( strlen( $full_name ) === 0 ) {
			$validation_messages[] = 'Please enter a valid name.';
		}

		if ( strlen( $email ) === 0 ) {
			$validation_messages[] = 'Please enter a valid email address.';
		}

		if ( strlen( $message ) === 0 ) {
			$validation_messages[] = 'Please enter a valid message.';
		}

		//Send an email to the WordPress administrator if there are no validation errors
		if ( empty( $validation_messages ) ) {

			$mail    = get_option( 'admin_email' );
			$subject = 'New message from ' . $full_name;
			$message = $message . ' - The email address of the customer is: ' . $mail;

			wp_mail( $mail, $subject, $message );

			$success_message = 'Your message has been successfully sent.';

		}

	}

	//Display the validation errors
	if ( ! empty( $validation_messages ) ) {
		foreach ( $validation_messages as $validation_message ) {
			echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
		}
	}

	//Display the success message
	if ( strlen( $success_message ) > 0 ) {
		echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
	}

	?>

    <!-- Echo a container used that will be used for the JavaScript validation -->
    <div id="validation-messages-container"></div>

    <form action="" method="POST">
      <input type="hidden" name="contact_form">
      <div class="elem-group">
        <input type="text" id="name" name="name" placeholder="Name" pattern=[A-Z\sa-z]{3,20} required>
      </div>
      <div class="elem-group">
        <input type="email" id="email" name="email" placeholder="E-Mail" required>
      </div>
      <div class="elem-group">
        <textarea id="message" name="message" placeholder="Nachricht" required></textarea>
      </div>
      <button type="submit">Senden</button>
    </form>

<?php
}

function empty_content($str) {
  return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
}


function mytheme_comment($comment, $args, $depth) {
  if ( 'div' === $args['style'] ) {
      $tag       = 'div';
      $add_below = 'comment';
  } else {
      $tag       = 'li';
      $add_below = 'div-comment';
  }?>
  <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
  if ( 'div' != $args['style'] ) { ?>
      <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
  } ?>
      <div class="comment-author vcard"><?php 
          if ( $args['avatar_size'] != 0 ) {
              echo get_avatar( $comment, $args['avatar_size'] ); 
          } 
          printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
      </div><?php 
      if ( $comment->comment_approved == '0' ) { ?>
          <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
      } ?>
      <div class="comment-meta commentmetadata">
          <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
              /* translators: 1: date, 2: time */
              printf( 
                  __('%1$s at %2$s'), 
                  get_comment_date(),  
                  get_comment_time() 
              ); ?>
          </a><?php 
          edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
      </div>

      <?php comment_text(); ?>

      <div class="reply"><?php 
              comment_reply_link( 
                  array_merge( 
                      $args, 
                      array( 
                          'add_below' => $add_below, 
                          'depth'     => $depth, 
                          'max_depth' => $args['max_depth'] 
                      ) 
                  ) 
              ); ?>
      </div><?php 
  if ( 'div' != $args['style'] ) : ?>
      </div><?php 
  endif;
}





add_action( 'after_setup_theme', 'register_gk_menu' );
function register_gk_menu() {
  register_nav_menu( 'primary', 'Hauptmenü' );
  register_nav_menu( 'footer', 'Footer' );
}




add_action( 'widgets_init', 'gk_sidebar' );
function gk_sidebar() {

  $sidebars = array(
    array(
      'name'          => 'Seitenleiste',
      'id'            => 'sidebar',
      'description'   => 'Seitenleiste für Beiträge, etc.',
    ),
    array(
      'name'          => 'Startseite Kästen',
      'id'            => 'startblocks',
      'description'   => 'Widgets auf der Startseite',
     
      'before_widget' => '<article id="%1$s" class="infobox %2$s">',
      'after_widget'  => '</article>',
      'before_title'  => '<span style="display:none">',
      'after_title'   => '</span>' 
    )
  );

  $default = array(
    'name'          => 'Seitenleiste',
    'id'            => 'sidebar',
    'description'   => 'Beschreibung der Seitenleiste',
    'class'         => '',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>' 
  );

  foreach( $sidebars as $sidebar ) {
    $args = wp_parse_args( $sidebar, $default );
    register_sidebar( $args );
  }

}



add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50);

