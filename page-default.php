<?php get_header(); ?>
  <main class="site-content site-default">
    <div class="wrapper">
      <section class="default-page">   
        <div class="post-wrapper default center-header">
            <div class="center-section">
                <h3><?php echo the_title(); ?></h3>
                <p><?php echo the_content(); ?></p>
            </div>
            <?php
                if($post->post_name != "themen")
                {
                  if ($post->post_parent)	{
                    $ancestors=get_post_ancestors($post->ID);
                    $root=count($ancestors)-2;
                    $parent = $ancestors[$root];
                    
                  } else {
                    $parent = $post->ID;
                  }
                  $parent_post = get_post($parent);

                  $children = get_pages( array( 'child_of' => $parent_post->ID ) );

                  $index = 0;
                  $children_names = array();
                  $downloads_page = NULL;
                  foreach ( $children as $child )
                  {
                    $children_names[$index] = $child->post_name;
                    
                    if($child->post_name === "downloads")
                    {
                      $downloads_page = $child;
                    }

                    $index++;

                  }

                  if( in_array("downloads", $children_names) )
                  {
                  
            ?>
              <div class="center-section download-section">
                <h3>Downloads</h3>
                <?php
                  echo $downloads_page->post_content;
                ?>
              </div>
            <?php
                }
              }
            ?>
        </div>
      </section>
    </div>
  </main>