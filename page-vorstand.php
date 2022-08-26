<?php get_header(); ?>
  <main class="site-content site-vorstand">
    <div class="wrapper">
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
              <div class="child-portrait">
                <a href="<?php the_permalink(); ?>">
                  <div>
                    <span class="name"><?php the_title(); ?></span>
                    <span class="amt"><?php the_excerpt(); ?></span>
                    <span class="portrait-img"><?php the_post_thumbnail_url(); ?></span>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </main>