<?php get_header(); ?>

  <main class="site-content site-vorstand">
    <div class="wrapper">
      <div class="center-section">
        <h3>Team Grün</h3>
        <h2><?php echo $pagename; ?></h2>
        <!--<h2>Alle Beiträge</h2>-->
        <div class="vorstand-row">
          <?php
          $args = array(
              'post_type'      => 'page',
              'posts_per_page' => -1,
              'post_parent'    => $post->ID,
              'order'          => 'ASC',
          );
          $parent = new WP_Query( $args );
          if ( $parent->have_posts() ) : ?>
              <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="child-portrait">
                    <div class="img-wrapper img-vorstand">
                      <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                    </div>
                    <div class="name"><?php the_title(); ?></div>
                    <div class="amt"><?php the_excerpt(); ?></div>
                </a>
              <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </main>

  <?php get_footer(); ?>