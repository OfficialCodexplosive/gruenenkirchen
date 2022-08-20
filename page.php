<?php the_post(); 

$post_data = get_post($post->post_parent);
$post_slug = $post->post_name;
$parent_slug = $post_data->post_name;
if($parent_slug === "positionen")
{?>
  <!-- "positionen/*"-Layout -->
  <?php get_header('positionen'); ?>
  <main class="positionen-content">
    <div class="wrapper">      
      <section class="positionen-intro clearfix">
        <h1><?php the_title(); ?></h1>

        <div id="positionen-beschreibung">
          <?php the_content(); ?>
        </div>
      </section> 
      <section class="positionen-antrag">
      </section>
    </div>

    <section class="antrag-content">
      <ul>
        <?php
        $args = array( 'tax_query' => array
        (
          'relation' => 'AND',
          array (
          'taxonomy' => 'category',
          'terms' => array($post_slug),
          'field' => 'slug'
          ),
          array ( 
          'taxonomy' => 'category',
          'terms' => array('antrag'),
          'field' => 'slug'
          )
        ) );
        $the_query = new WP_Query( $args );
        ?>
        <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <li class="antrag-collapsible">
            <details>
              <summary>
                <div class="">
                <div class="summary-col">
                  <?php echo get_the_title();?>
                </div>
                <div class="summary-col">
                  <?php 
                    $posttags = get_the_tags();
                    if ($posttags) {
                      foreach($posttags as $tag) 
                      {
                        if ( in_array( $tag->name, array("gestellt", "beschlossen", "abgelehnt") ) )
                        { ?>
                          <?php echo 'Antrag ' . $tag->name; ?>
                  <?php 
                          break;
                        }
                      }
                    }
                  ?>
                </div>
              </summary>
              <div class="not-summary">
                <?php echo get_the_content();?>
              </div>
            </details>
          </li>
        <?php endwhile; endif; ?>
      </ul>
    </section>

    <section class="similar-content">
      <?php $matching_posts = get_posts( array( 'category_name' => $post_slug ) );?>      
      <div class="similiar-wrapper center-header">
        <h3>Beiträge zum Thema</h3>
        <ul class="similar-gallery">
          <?php foreach($matching_posts as $post) : setup_postdata( $post ); ?>
          <li> 
            <a href="<?php the_permalink(); ?>">
                <?php if( has_post_thumbnail() ){ ?>
                  <img src="<?php the_post_thumbnail_url( 'medium' );?>"/>
                <?php } else {?>
                  <div class="img-replacement"></div>
                <?php }?>
              <div class="banner"><span><?php the_title(); ?></span></div>
            </a> 
          </li>
          <?php endforeach; wp_reset_postdata();?>
        </ul>
      </div>

    </section>
  </main>
<?php }
else
{?>  
  <!-- Standardseiten-Layout -->
  <?php get_header(); ?>
  <main class="site-content">
    <div class="wrapper">
      <section class="content-intro clearfix">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
      </section>  
    </div>
  </main>
<?php }?>     
    
  

<?php get_footer(); ?>


