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
          <div id="vorstand-thumbnail" style="background-image:url('<?php echo the_post_thumbnail_url('large'); ?>');"></div>
        </div>
      </div>
    </div>
    <div id="vorstand-contact">
      <div class="column">
          <h2>Schick <?php echo get_the_title(); ?> eine Nachricht.</h2>
          <h3>Mit dem Anklicken des Senden-Buttons erkennst du unsere <a href="<?php echo get_permalink(get_page_by_path( 'datenschutz' )) ?>">Datenschutzbestimmung</a> an.</h3>
        </div>
        <div class="column">
          <div class="contact-form">
            <?php include get_theme_file_path( '/contact.php' ); ?>
          </div>
        </div>
    </div>
  </main>

  <?php get_footer(); ?>