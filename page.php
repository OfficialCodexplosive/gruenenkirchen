<?php get_header(); ?>
    
    <main class="site-content">
      <div class="wrapper">      
      
        <section class="content-intro clearfix">

          <?php the_post(); ?>

          <h2><?php the_title(); ?></h2>

          <?php the_content(); ?>

        </section>       
       
      </div>
    </main>
    
    <?php get_footer(); ?>


