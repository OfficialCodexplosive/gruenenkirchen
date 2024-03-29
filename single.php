<?php get_header(); ?>
    
    <main class="site-content">
      <div class="wrapper">      
      
        <section class="content-intro clearfix">

          <?php the_post(); ?>   

          <div id="post-header" >
          <div class="column text">
              <div id="summary">
                <h4>
                    <!-- exclude all categories that are sub of 'position'; WIP-->
                    <?php $categories = get_the_category(); ?>
                    <?php $not_first = false; ?>
                    <?php foreach($categories as $category) { ?>
                      <?php 
                        $cat_parent_id = $category->category_parent;
                        
                        #$cat_parent = get_the_category_by_ID( $cat_parent_id );
                        if( $cat_parent_id != 11 )
                        {
                      ?>
                    <span>
                      <?php if(($not_first)){?>
                      <?php echo '&';?> 
                      <?php }?>
                      <?php $not_first = true;?>
                      <a href="<?php echo get_category_link($category->term_id);?>"><?php echo $category->name;?></a>
                    </span>
                    <?php } }?>
                </h4>
                <h2><?php the_title(); ?></h2>
                <h3><?php the_excerpt(); ?></h3>
              </div>
            </div>

            <div class="column thumb">
              <div id="post-thumbnail" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
            </div>
            
                        
          </div>

          <div id="post-content" class="has-padding has-side-column">
            <div class="flexcol side-column">
              <a href="#" class="participate">Mitmachen</a>
              <?php 
                gk_content_articles( get_the_content() );
              ?>
            </div>
            <div class="flexcol separator"></div>
            <div class="flexcol main-column">
              <?php 
                gk_content_without_articles( get_the_content() );
              ?>
            </div>
          </div>
        </section>       
       
        <?php $comma_separated_cat = ""; ?>
          <?php foreach($categories as $category) { ?>
            <?php $comma_separated_cat .= ",".$category->cat_ID; ?>
          <?php }?>
          <?php  $comma_separated_cat = substr($comma_separated_cat, 1)?>
          <?php $matching_posts = get_posts( array( 'category' => $comma_separated_cat, 'posts_per_page' => 3, 'exclude' => array( $post->ID ) ) );?>
          <div class="single post-wrapper center-header">
            <div class="center-section">
              <h3>Weiterlesen</h3>
              <div class="section">
                <?php
                  $the_query = new WP_Query( array( 'category' => $comma_separated_cat, 'posts_per_page' => 3, 'exclude' => array( $post->ID ) ) );
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
        <!--
        <section class="has-padding">
         < ?php comment_form(); ?>
        </section>

        <section class="has-padding">
          < ?php comments_number( 'Kein Kommentar', 'Ein Kommentar', '% Kommentare' ); ?>
          <ol class="commentlist">
            < ?php wp_list_comments('callback=mytheme_comment', get_comments() ); ?>
          </ol>
        </section>
        -->
      </div>
    </main>
    
    <?php get_footer(); ?>


