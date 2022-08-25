<?php get_header(); ?>
  <main class="site-content site-all">
    <div class="wrapper">
      <section class="all-posts">
        <?php 
        // wp-query to get all published posts without pagination
        $the_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
        
        <?php if ( $the_query->have_posts() ) : ?>
        
        <div class="post-wrapper all center-header">
          <div class="center-section">
            <h3>Alle Beiträge</h3>
            <div class="section">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              
              <a class="post" href="<?php the_permalink(); ?>">
                <div class="post-overlay">
                  <div class="post-info">
                    <!-- exclude all categories that are sub of 'position'-->
                    <!--< ?php $categories = get_the_category(); ?>
                    <h3>
                      <ul class="post-categories">
                        < ?php foreach($categories as $category){ ?>
                          < ?php 
                            $cat_parent_id = $category->category_parent;
                            
                            #$cat_parent = get_the_category_by_ID( $cat_parent_id );
                            if( $cat_parent_id != 14 )
                            {
                          ?>
                          <li><a href="< ?php echo get_category_link($category->term_id);?>"><?php echo $category->name ?></a></li>
                          < ?php } ?>
                        < ?php }?>
                      </ul>
                    </h3>-->
                    <h3><?php the_date(); ?></h3>
                    <h2><?php the_title(); ?></h2>
                    <p>
                      <?php 
                        $content = get_the_excerpt();
                        echo wp_filter_nohtml_kses( $content );
                        ?>
                    </p>
                  </div>
                </div>
                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                <?php else : ?>
                  <?php $image = array(''); ?>
                <?php endif; ?>
                <!--<div class="img-wrapper" style="background-image: url('<?php echo $image[0]; ?>')">
                </div>-->
              </a>
            <?php endwhile; ?>
            </div>
            <!---
            <div class="btn-wrap">
              <a class="call-to-action btn-more" href="./beitraege">Mehr</a>
            </div>-->
          </div>
        </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'There no posts to display.' ); ?></p>
        <?php endif; ?>
      </section>
    </div>
  </main>
<?php get_footer(); ?>