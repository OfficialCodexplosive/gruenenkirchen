
    <?php get_header(); ?>
    
    <main class="site-content">

      <!--<section class="landing-intro">
        <div id="landing-text">
            <h1>GEILENKIRCHEN</h1>
            <h2>< ?php bloginfo('description');?></h2>
            <div id="landing-text-link-separator"></div>
            <a href="#aktuelles">MEHR ERFAHREN</a>
        </div>
        <div id="landing-img" style="background-image: url('< ?php echo get_bloginfo('template_url') ?>/images/gruene_gk_collage_v2_blur.png');"></div>
      </section>-->

      <?php include('landing-intro.php'); ?>

      <section class="partnerships center-header">
          <h3>Mach mit!</h3>
            <ul>
              <li><div><a href="./spenden" class="call-to-action">Spenden</a></div></li>
              <li><div><a href="https://www.gruene.de/mitglied-werden" class="call-to-action">Mitglied werden</a></div></li>
              <li><div><a href="https://www.gruene.de/aktiv-werden" class="call-to-action">Aktiv werden</a></div></li>
            </ul>
      </section>
      
      <section class="content-intro">
        
        <div class="post-wrapper center-header">
          <h3 id="aktuelles">Aktuelles</h3>
          <div class="center-section">
            
            <div class="section">
              <?php
                $the_query = new WP_Query( array('posts_per_page' => 3,) );
              ?>
              <?php 
              if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
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
                      <h3><?php the_date(); ?></h3>
                      <p>
                        <?php 
                          $content = get_the_content();
                          echo wp_filter_nohtml_kses( $content );
                          ?>
                      </p>
                      <span class="faux-link">Weiterlesen</span>
                    </div>
                  </div>
                </a>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="btn-wrap">
              <a class="call-to-action btn-more" href="./beitraege">Mehr</a>
            </div>
        </div>

        

        <div class="positionen-wrapper center-header">
          <div class="center-section">
            <h3>Positionen</h3>
            <div class="section">
              <ul class="positionen-gallery">
                <li>
                  <a href="./positionen/stadtentwicklung-wirtschaft">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/stadtentwicklung.jpg"/>
                    <div class="overlay"><span>Stadtentwicklung & Wirtschaft</span></div>
                  </a>
                </li>
                <li>
                  <a href="./positionen/klimaschutz">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/klimaschutz.jpg"/>
                    <div class="overlay"><span>Klimaschutz</span></div>
                  </a>
                </li>
                <li>
                  <a href="./positionen/gesundheit">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/gesundheit.jpg"/>
                    <div class="overlay"><span>Gesundheit</span></div>
                  </a>
                </li>
                <li>
                  <a href="./positionen/energie-waerme">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/energie.jpg"/>
                    <div class="overlay"><span>Energie & Wärme</span></div>
                  </a>
                </li>
                <li>
                  <a href="./positionen/verkehr-mobilitaet">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/mobilität.jpg"/>
                    <div class="overlay"><span>Verkehr & Mobilität</span></div>
                  </a>
                </li>
                <li>
                  <a href="./positionen/umwelt-naturschutz">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/naturschutz.jpg"/>
                    <div class="overlay"><span>Umwelt & Naturschutz</span></div>
                  </a>
                </li>
                <li>
                  <a href="./positionen/bildung-schule">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/bildung.jpg"/>
                    <div class="overlay"><span>Bildung & Schule</span></div>
                  </a>
                </li>
                <li>
                  <a href="./positionen/diversitaet-lgbtqi">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/diversity.jpg"/>
                    <div class="overlay"><span>Diversität/ LGBTQI</span></div>
                  </a>
                </li>
                <li>
                  <a href="./positionen/kultur">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/positionen/culture_germany.jpg"/>
                    <div class="overlay"><span>Kultur</span></div>
                  </a>
                </li>
              </ul>
              </div>
              <div class="btn-wrap">
                <a class="call-to-action btn-more" href="./positionen">Alle Positionen</a>
              </div>
            </div>
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