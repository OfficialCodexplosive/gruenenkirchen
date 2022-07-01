
    <?php get_header(); ?>
    
    <main class="site-content">

      <section class="landing-intro">
        <span>
          <h1>GEILENKIRCHEN</h1>
          <h2><?php bloginfo('description');?></h2>
        </span>
      </section>
      
      <section class="content-intro">
        <div class="wrapper">
      
        <?php
        the_post(); 
        ?>
          <h2><?php the_title(); ?></h2>

          <?php the_content(); ?>
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