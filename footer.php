   
    <footer class="site-footer">
      <div class="wrapper">
        <!--<span id="footer-title">< ?php echo get_bloginfo( 'name' ); ?></span>-->

        <nav class="meta-nav">
        
        <?php
        wp_nav_menu( 
            array( 
                'theme_location' => 'footer', 
                'menu_class' => 'meta-nav-list' ) );

        
        ?>
        
        </nav>

      </div>
      <div class="sub-footer">
        <?php
          wp_nav_menu( 
            array( 
                'menu' => 'Unterfooter',
                'menu_class' => 'sub-nav-list' ) );
        ?>
      </div>

      <div class="copyright-notice">Grünenkirchen Theme für <a href="https://wordpress.com/">WordPress</a></div>
    </footer>
  
    <?php wp_footer(); ?>
  </body>
</html>





