<?php get_header(); ?>
  <main class="site-content site-default">
    <div class="wrapper">
      <section class="default-page">   
        <div class="post-wrapper default center-header">
            <div class="center-section">
                <h3><?php echo the_title(); ?></h3>
                <p><?php echo the_content(); ?></p>
            </div>
        </div>
      </section>
    </div>
  </main>