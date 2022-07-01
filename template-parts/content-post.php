<article>

<header>
  <h3><?php the_title();?></h3>

  <p class="beitragsinfo">
    <span class="autor"><?php the_author();?></span> | 
    <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
  </p>
</header>  

<p>
    <?php the_excerpt(); ?>
</p>

<p>
  <a href="<?php echo wp_make_link_relative(get_the_permalink())?>" class="read-more-link">Weiterlesen...</a>
</p>  

</article>