<?php get_header(); ?>
  <main class="site-content">
    <div class="wrapper">
      <?php echo the_title(); ?>
      <?php echo the_content(); ?>
      <?php echo the_post_thumbnail_url(); ?>
    </div>
  </main>