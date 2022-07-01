<?php get_header(); ?>
    
    <main class="site-content">
      <div class="wrapper">      
      
        <section class="content-intro clearfix">

          <?php the_post(); ?>

         

          <h2><?php the_title(); ?></h2>

          <p class="beitragsinfo">
            Veröffentlicht am
            <time datetime="2018-03-25"><?php the_date(); ?></time>
            von
            <span class="autor"><?php the_author();?></span>
         </p>

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


