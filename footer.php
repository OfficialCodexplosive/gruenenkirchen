   
    <footer class="site-footer">
      <div class="wrapper">


        <nav class="meta-nav">
        
        <?php
        wp_nav_menu( 
            array( 
                'theme_location' => 'footer', 
                'menu_class' => 'meta-nav-list' ) );
        ?>
        
        </nav>

      </div>
    </footer>
  
    <?php wp_footer(); ?>
  </body>
</html>





