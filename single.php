<?php get_header(); ?>
    
    <main class="site-content">
      <div class="wrapper">      
      
        <section class="content-intro clearfix">

          <?php the_post(); ?>   

          <div id="post-header" >
            <div class="column">
              <div id="summary">
                <h4>
                    <!-- exclude all categories that are sub of 'position'; WIP-->
                    <?php $categories = get_the_category(); ?>
                    <?php $not_first = false; ?>
                    <?php foreach($categories as $category) { ?>
                      <?php 
                        $cat_parent_id = $category->category_parent;
                        
                        #$cat_parent = get_the_category_by_ID( $cat_parent_id );
                        if( $cat_parent_id != 14 )
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

            <div class="column">
              <div id="post-thumbnail" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
            </div>            
          </div>

          

          <!--
          <p class="beitragsinfo">
            Veröffentlicht am
            <time datetime="2018-03-25"><?php the_date(); ?></time>
            von
            <span class="autor"><?php the_author();?></span>
          </p>
          -->

          <div id="post-content" class="has-padding has-side-column">
            <div class="flexcol side-column">
              <a href="#" class="participate">Mitmachen</a>
            </div>
            <div class="flexcol separator"></div>
            <div class="flexcol main-column">
              <?php the_content(); ?>
            </div>
          </div>
        </section>       
       
        <section class="similar-content">
          <?php $comma_separated_cat = ""; ?>
          <?php foreach($categories as $category) { ?>
            <?php $comma_separated_cat .= ",".$category->cat_ID; ?>
          <?php }?>
          <?php  $comma_separated_cat = substr($comma_separated_cat, 1)?>
          <?php $matching_posts = get_posts( array( 'category' => $comma_separated_cat, 'posts_per_page' => 3 ) );?>
          
          
          <div class="similiar-wrapper center-header">
            <h3>Weiterlesen</h3>
            <ul class="similar-gallery">
              <?php foreach($matching_posts as $post) : setup_postdata( $post ); ?>
              <li> 
                <a href="<?php the_permalink(); ?>">
                  <?php if( has_post_thumbnail() ){ ?>
                    <img src="<?php the_post_thumbnail_url( 'medium' );?>"/>
                  <?php } else {?>
                    <div class="img-replacement"></div>
                  <?php }?>
                  <div class="banner"><span><?php the_title(); ?></span></div>
                </a> 
              </li>
              <?php endforeach; wp_reset_postdata();?>
            </ul>
          </div>

        </section>
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


