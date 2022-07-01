<?php get_header(); ?>
    
    
    <main class="site-content">
     <div class="wrapper">      
      
        <section class="content-intro">

        <?php the_archive_title( '<h2>', '</h2>' ); ?>
			  <?php the_archive_description( '<p>', '</p>' ); ?>
         
        </section>


        <section class="beitragsliste">

          <h2 class="visually-hidden">Beiträge</h2>

         <?php
          while ( have_posts() ) :
            the_post();
                      
            get_template_part( 'template-parts/content', get_post_type() );

          endwhile;

        ?>

<div class="nav-previous alignleft"><?php previous_posts_link( 'zurück' ); ?></div>
<div class="nav-next alignright"><?php next_posts_link( 'vor' ); ?></div>
        </section>


        <aside class="linklisten">

          <h2 class="visually-hidden">Linklisten</h2>


          <?php dynamic_sidebar( 'sidebar' ); ?>

        </aside>
      
      </div>
    </main>
    
    
   <?php get_footer(); ?>




