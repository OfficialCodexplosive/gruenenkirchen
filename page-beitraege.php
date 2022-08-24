<?php get_header(); ?>
  <main class="site-content">
    <div class="wrapper">
      <section class="content-intro clearfix">
        <h2><?php the_title(); ?></h2>
        <?php echo "Test"; ?>
        <?php the_content(); ?>
      </section>  
      <section class="all-posts">
        <?php 
        // wp-query to get all published posts without pagination
        $the_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
        
        <?php if ( $the_query->have_posts() ) : ?>
        
        <ul>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'There no posts to display.' ); ?></p>
        <?php endif; ?>
      </section>
    </div>
  </main>
<?php get_footer(); ?>