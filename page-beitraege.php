<?php get_header(); ?>
  <main class="site-content site-positionen site-beitraege">
    <div class="wrapper">
      <div class="center-section">
        <h3>Aktuelles</h3>
        <h2>Alle Beiträge</h2>
        <div class="positionen-row">
          <?php
          $args = array(
              /*'post_type'      => 'page',*/
              'posts_per_page' => -1,
              /*'post_parent'    => $post->ID,*/
              'order'          => 'DESC',
          );
          $the_query = new WP_Query( $args );
          if ( $the_query->have_posts() ) : ?>
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                  <?php else : ?>
                    <?php $image = array( get_bloginfo('template_url') . '/images/image_placeholder.png)' ); ?>
                  <?php endif; ?>
                  <a class="pos-portrait" href="<?php the_permalink(); ?>">
                    <div class="img-wrapper">
                      <img src="<?php echo $image[0]; ?>"/>
                    </div>
                    <div class="post-overlay">
                      <div class="post-info">
                        <h2><?php the_title(); ?></h2>
                      </div>
                    </div>
                  </a>
              <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </main>