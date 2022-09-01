<?php

add_action( 'wp_enqueue_scripts', 'register_gk_styles' );

function gk_register_widget()
{
  
}

add_post_type_support( 'page', 'excerpt' );

remove_filter('the_content','wpautop');
remove_filter('the_excerpt','wpautop');
remove_filter('the_title','wpautop');

add_action('widgets_init', 'gk_register_widget');

function register_gk_styles() { 
    wp_enqueue_style( 'themestyle', get_stylesheet_uri() );
    
    wp_register_style( 'main', get_template_directory_uri() . '/css/style.css'  );
    wp_enqueue_style( 'main' );
    

    wp_register_script('gkscript', 
                        get_template_directory_uri() .'/js/script.js',   
                        null, false, true);
    wp_enqueue_script('gkscript');
   
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

