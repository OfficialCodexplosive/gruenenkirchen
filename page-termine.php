<?php get_header(); ?>
  <main class="site-content site-positionen">
    <div class="wrapper">
      <div class="center-section events">
        <h3>Unsere Termine</h3>
        <h2>Sitzungen, Veranstaltungen und Sonstiges</h2>
        <h4>Vergangene Termine</h4>
        <?php echo do_shortcode('[events_list scope="past" limit="3"]'); ?>
        <h4>Anstehende Termine</h4>
        <?php echo do_shortcode('[events_list scope="future"]'); ?>
      </div>
    </div>
  </main>

  <?php get_footer(); ?>