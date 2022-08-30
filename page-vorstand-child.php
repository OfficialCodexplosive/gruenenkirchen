<?php get_header(); ?>
  <main class="site-content">
    <div class="wrapper">
      <div id="vorstand-header">
        <div class="column portrait">
          <div id="vorstand-thumbnail" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>');"></div>
        </div>
        <div class="column content">
          <?php echo the_title(); ?>
          <?php echo the_content(); ?>
        </div>
      </div>
    </div>
  </main>