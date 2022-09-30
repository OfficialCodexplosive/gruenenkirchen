<?php get_header('positionen'); ?>
  <main class="positionen-content">
    <div class="wrapper">
      <section class="positionen-intro clearfix">
        <h1><?php the_title(); ?></h1>

        <div id="positionen-beschreibung">
          <?php the_content(); ?>
        </div>
      </section> 
      <section class="positionen-antrag">
      </section>
    </div>
    <?php 
      $args = array( 
        'tax_query' => array
        (
          'relation' => 'AND',
          array (
          'taxonomy' => 'category',
          'terms' => array($post_slug),
          'field' => 'slug'
          ),
          array ( 
          'taxonomy' => 'category',
          'terms' => array('antrag'),
          'field' => 'slug'
          )
        ) );
      $unsliced_query = new WP_Query( $args );

      $args['posts_per_page'] = 3;
      $the_query = new WP_Query( $args );
    
      if ($the_query->have_posts()) :?>
      <section class="antrag-content center-header">
        <h3>Anträge</h3>
        <ul>
          <?php
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="antrag-collapsible">
              <details>
                <summary>
                  <div class="summary-col">
                    <?php echo get_the_title();?>
                  </div>
                  <div class="summary-col">
                    <?php 
                      $posttags = get_the_tags();
                      if ($posttags) {
                        foreach($posttags as $tag) 
                        {
                          if ( in_array( $tag->name, array("gestellt", "beschlossen", "abgelehnt") ) )
                          { ?>
                            <?php echo 'Antrag ' . $tag->name; ?>
                    <?php 
                            break;
                          }
                        }
                      }
                    ?>
                  </div>
                </summary>
                <div class="not-summary">
                  <?php echo get_the_content();?>
                </div>
              </details>
            </li>
          <?php endwhile; ?>
        </ul>
        <?php if($unsliced_query->found_posts > 3): ?>
          <a href="<?php echo get_permalink( get_page_by_path('antraege') ) ?>?focus=<?php echo get_queried_object()->post_name; ?>">mehr Anträge</a>
        <?php endif; ?>
      </section>
    <?php endif; ?>
    <div class="single position post-wrapper center-header">
      <div class="center-section">
        <h3>Weiterlesen</h3>
        <div class="section">
          <?php
            $the_query = new WP_Query( array( 'category_name' => $post_slug, 'posts_per_page' => 3 ) );
          ?>
          <?php 
          if ( $the_query->have_posts() ) : 
            while ( $the_query->have_posts() ) : $the_query->the_post(); 
              $count++;
          ?>
            <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
            <?php else : ?>
              <?php $image = array( get_bloginfo('template_url') . '/images/image_placeholder.png)' ); ?>
            <?php endif; ?>
            <a class="post" href="<?php the_permalink(); ?>">
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
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>