
    <?php get_header(); ?>
    
    <main class="site-content">

      <section class="landing-intro">
        <div id="landing-intro-half1"></div>
        <div class="landing-halflogo" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/gruene_halbblume_stencil.svg');"></div>
        <div id="landing-intro-half2" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/gruene_header.jpg')"></div>
        <div id="landing-stripe"></div>
        <div id="landing-text">
            <h1>GEILENKIRCHEN</h1>
            <h2><?php bloginfo('description');?></h2>
            <div id="landing-text-link-separator"></div>
            <a href="#">MEHR ERFAHREN</a>
        </div>
      </section>
      
      <section class="content-intro">
        <div class="partnership-wrapper">
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
        <div class="post-wrapper">
          <div class="posts-section">
          <?php 
          if ( have_posts() ) : $count=0; 
            while ( have_posts() && $count < 3 ) : the_post(); 
              $count++;
          ?>
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <?php else : ?>
              <?php $image = array(''); ?>
            <?php endif; ?>
            <div id="post-<?php echo $count ?>" style="background-image: url('<?php echo $image[0]; ?>')">
              <div class="post-overlay"></div>
              <a href="<?php the_permalink(); ?>"><span></span></a>
              <div class="post-info">
                <h3><?php the_category(); ?></h3>
                <h2><?php the_title(); ?></h2>
              </div>
            </div>

            <?php endwhile; ?>
          <?php endif; ?>
          </div>
          <div class="termin-section">
          </div>
        </div>

        <div class="date-wrapper">

        </div>
      </section>
      
      <!--
      <section class="infoboxen">
        <div class="wrapper">

          <h2 class="visually-hidden">Die Bereiche der Website</h2>

          < ?php dynamic_sidebar( 'startblocks' ); ?>

        </div>
      </section>
      
      <section class="kundenstimmen">
        <div class="wrapper">
        
          <h2>Das sagen die Kunden</h2>
          <p>Im folgenden eine kleine Auswahl von Kundenstimmen.</p>

          <blockquote class="kundenstimme">

            <h3>Wundervoll leichter Einstieg</h3>
            <p>Vielen herzlichen Dank für diesen gelungenen Kurs.</p>

            <footer>&mdash; Bernd</footer>

          </blockquote>

          <blockquote  class="kundenstimme">

            <h3>Absolut genial</h3>
            <p>Locker, aber trotzdem voll auf den Punkt … richtig gut!</p>

            <footer class="kunde">&mdash; Anna</footer>

          </blockquote>

          <blockquote class="kundenstimme">

            <h3>Besser geht's nicht</h3>
            <p>Ich bin schlichtweg begeistert. So macht Lernen Spaß! </p>

            <footer class="kunde">&mdash; John</footer>

          </blockquote>  
      
        </div>
      </section>-->
      

    </main>


    <?php get_footer(); ?>