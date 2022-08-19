
    <?php get_header(); ?>
    
    <main class="site-content">

      <section class="landing-intro">
        <div id="landing-flower-overlay">
          <div id="landing-intro-half1"></div>
          <img class="landing-halflogo" src="<?php echo get_bloginfo('template_url') ?>/images/gruene_halbblume_stencil.svg"></div>
        </div>
        <div id="landing-intro-half2" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/gruene_header.jpg')"></div>
        <div id="landing-stripe"></div>
        <div id="landing-text">
            <h1>GEILENKIRCHEN</h1>
            <h2><?php bloginfo('description');?></h2>
            <div id="landing-text-link-separator"></div>
            <a href="#">MEHR ERFAHREN</a>
        </div>
      </section>

      <section class="partnerships center-header">
        <h3>Mach mit!</h3>
        <ul>
          <!--
          <li><div style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/nabu.svg');"></div></li>
          <li><div style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/volksinitiative_artenvielfalt.svg');"></div></li>
          <li><div style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/ichkaufelokal.svg');"></div></li>
          <li><div style="background-image: url('<?php echo get_bloginfo('template_url') ?>/images/bluetenparadies.svg');"></div></li>
          -->
          <li><div><a href="#" class="call-to-action">Spenden</a></div></li>
          <li><div><a href="#" class="call-to-action">Mitglied werden</a></div></li>
          <li><div><a href="#" class="call-to-action">Aktiv werden</a></div></li>
        </ul>
      </section>
      
      <section class="content-intro">
        
        <div class="post-wrapper center-header">
          <h3>Aktuelles</h3>
          <div class="posts-section">
          <?php
            query_posts($args=null);
          ?>
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

        <!--
        <div class="date-wrapper">
              <div class="events">
                < ?php 
                  $events = tribe_get_events( array('ends_after' => 'now') );

                  foreach( $events as $event )
                  {
                    setup_postdata( $event );
                  
                ?>
                <span>< ?php echo 'break 12'; ?></span>
                <div class="event">
                  <h2 class="event-date">
                    < ?php echo tribe_get_start_date( $event ); ?>
                  </h2>
                  <h1 class="event-title">
                    < ?php echo $event->post_title; ?>
                  </h1>
                  <a class="event-link" href="< ?php echo tribe_get_event_link( $event ); ?>">
                    <div class="event-button">
                      Details ansehen
                    </div>
                  </a>
                </div>

                < ?php }?>
              </div>
        </div>-->

        <div class="positionen-wrapper center-header">
          <h3>Positionen</h3>
          <ul class="positionen-gallery">
            <li>
              <a href="#">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/stadtentwicklung.jpg"/>
                <div class="overlay"><span>Stadtentwicklung & Wirtschaft</span></div>
              </a>
            </li>
            <li>
              <a href="#2">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/klimaschutz.jpg"/>
                <div class="overlay"><span>Klimaschutz</span></div>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/gesundheit.jpg"/>
                <div class="overlay"><span>Gesundheit</span></div>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/energie.jpg"/>
                <div class="overlay"><span>Energie & Wärme</span></div>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/mobilität.jpg"/>
                <div class="overlay"><span>Verkehr & Mobilität</span></div>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/naturschutz.jpg"/>
                <div class="overlay"><span>Umwelt & Naturschutz</span></div>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/bildung.jpg"/>
                <div class="overlay"><span>Bildung & Schule</span></div>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/diversity.jpg"/>
                <div class="overlay"><span>Diversität/ LGBTQI</span></div>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/culture_germany.jpg"/>
                <div class="overlay"><span>Kultur</span></div>
              </a>
            </li>
          </ul>
        </div>

        <div class="instagram-wrapper center-header">
          <h3>Instagram</h3>
          <div class="feed">
            <?php echo do_shortcode('[instagram-feed feed=2]'); ?>
          </div>
        </div>
      </section>
    </main>


    <?php get_footer(); ?>