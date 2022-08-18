<?php get_header(); ?>
    
    <main class="site-content">
      <div class="wrapper">      
      
        <section class="content-intro clearfix">

          <?php the_post(); ?>   

          <div id="post-header">
            <h2><?php the_title(); ?></h2>
            <h3><?php the_excerpt(); ?></h3>
          </div>

          <h4>Aus den Kategorien
          <?php $categories = get_the_category(); ?>
          <?php foreach($categories as $category) { ?>
          <span><a href="<?php echo get_category_link($category->term_id);?>"><?php echo $category->name;?></a></span>
          <?php } ?>
          </h4>

          <!--
          <p class="beitragsinfo">
            Veröffentlicht am
            <time datetime="2018-03-25"><?php the_date(); ?></time>
            von
            <span class="autor"><?php the_author();?></span>
          </p>
          -->

          <?php the_post_thumbnail( 'post-thumbnail', [ 'style' => 'float:left; ']); ?>
          <?php the_content(); ?>

        </section>       
       
        <section class="">
         <?php comment_form(); ?>
        </section>

        <section>
          <?php comments_number( 'Kein Kommentar', 'Ein Kommentar', '% Kommentare' ); ?>
          <ol class="commentlist">
            <?php wp_list_comments('callback=mytheme_comment', get_comments() ); ?>
          </ol>
        </section>


      </div>
    </main>
    
    <?php get_footer(); ?>


