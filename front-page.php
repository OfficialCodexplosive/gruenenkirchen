
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
        <div class="wrapper">
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <h2><?php the_title(); ?></h2>

          <?php the_content(); ?>
          <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </section>
      
      <section class="infoboxen">
        <div class="wrapper">

          <h2 class="visually-hidden">Die Bereiche der Website</h2>

          <?php dynamic_sidebar( 'startblocks' ); ?>

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
      </section>
      

    </main>


    <?php get_footer(); ?>