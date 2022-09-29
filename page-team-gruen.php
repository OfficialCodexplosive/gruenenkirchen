<?php get_header(); ?>

  <main class="site-content site-vorstand">
    <div class="wrapper">
      <div class="center-section">
        <h3>Team Grün</h3>
        <div class="focus-selection">
            <a href="#alle" id="#alle">Alle</a>
            <a href="#vorstand" id="#vorstand">Vorstand</a>
            <a href="#ratsfraktion" id="#ratsfraktion">Ratsfraktion</a>
        </div>
        <!--<h2>Alle Beiträge</h2>-->
        <div class="vorstand-row">
            <?php
            $children_args = array(
            'post_type'   => 'page',
            'post_parent' => $post->ID,
            );
            $focus = "";
            if( isset( $_GET['focus'] ) )
            {
                $focus = $_GET['focus'];
            }
            $children_ids = array();
            $children_query = new WP_Query( $children_args );
            if( $children_query->have_posts() ) :
                while( $children_query->have_posts() ) : 
                    $children_query->the_post();
                    if( $focus == "" )
                        $children_ids[] = get_the_ID();
                    elseif ( $post->post_name == $focus )
                        $children_ids[] = get_the_ID();
                endwhile;
            endif;

            foreach ($children_ids as $id)
            {
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'post_parent'    => $id,
                    'order'          => 'ASC',
                );

                $subpage = new WP_Query( $args );
                if( $subpage->have_posts() ) :
                    while( $subpage->have_posts() ) : 
                        $subpage->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="<?php echo get_post_parent( get_the_ID() )->post_name; ?> child-portrait" >
                            <div class="img-wrapper img-vorstand">
                                <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                            </div>
                            <div class="name"><?php the_title(); ?></div>
                            <div class="amt"><?php the_excerpt(); ?></div>
                        </a>   
            <?php
                    endwhile;
                endif;
            }  
            ?>
        </div>
      </div>
    </div>
  </main>

  <?php get_footer(); ?>