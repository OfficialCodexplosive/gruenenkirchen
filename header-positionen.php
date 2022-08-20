<!DOCTYPE html>

<html lang="de">
  
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <title><?php wp_title('&raquo;', true, 'right'); bloginfo('name'); ?></title>
        
    <!-- Font Awesome https://fontawesome.com/start --> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <?php wp_head(); ?>

   
  </head>
  <?php
  $bodyclass = (is_archive( )) ? 'news' : '';
  ?>
  
  <body <?php body_class( $bodyclass); ?>>

    <nav class="site-nav transparent-background">
      <div class="wrapper">
        
        <button class="menubutton" onclick="this.classList.toggle('show-menu')">
          <i class="fas fa-bars"></i>&nbsp;Menü
        </button>
        
        <!--
        <div class="site-nav-col">
          <img class="site-nav-logo" src="<?php echo get_bloginfo('template_url') ?>/images/gruen_sonnenblume.png"/>
        </div>-->
        <div class="site-nav-col">
          <!--<img class="site-nav-logo" src="< ?php echo get_bloginfo('template_url') ?>/images/gruen_sonnenblume.png"/>-->
          <a href="<?php echo get_home_url(); ?>">
            <div id="site-nav-logo" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/gruen_sonnenblume.png');"></div>
          </a>
          <?php
          wp_nav_menu( 
              array( 
                  'theme_location' => 'primary', 
                  'menu_class' => 'site-nav-list' ) );
          ?>
          <div class="site-nav-separator"></div>
          <div class="menu-all-pages-container">
            <ul class="site-nav-list right">
              <li><a href="#"><div class="brand-icon" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/facebook_f.svg');"></div></a></li>
              <li><a href="#"><div class="brand-icon" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/instagram_outline.svg');"></div></a></li>
              <li class="site-nav-participate">
                <a href="<?php echo get_permalink( get_page_by_path( 'mitmachen' ) );?>">
                  <span id="site-nav-border-participate">Mitmachen</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    
    