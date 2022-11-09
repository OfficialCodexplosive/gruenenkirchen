<?php get_header(); ?>
<main class="site-content site-positionen site-beitraege">
  <div class="wrapper">
    <div class="center-section">
      <?php the_archive_title( '<h3>', '</h3>' ); ?>
      <?php the_archive_description( '<p>', '</p>' ); ?>
      <div class="positionen-row">
        <?php while ( have_posts() ) : the_post(); ?>
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
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>