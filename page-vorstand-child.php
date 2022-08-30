<?php get_header(); ?>
  <main class="site-content">
    <div class="wrapper">
      <div id="vorstand-header">
        <div class="column content">
          <h2><?php echo the_excerpt(); ?></h2>
          <h1><?php echo the_title(); ?></h1>
          <div class="personal">
            <?php echo the_content(); ?>
          </div>
        </div>
        <div class="column portrait">
          <div id="vorstand-thumbnail" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>');"></div>
        </div>
      </div>
    </div>
  </main>