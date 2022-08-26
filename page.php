<?php the_post(); 

$post_data = get_post($post->post_parent);
$post_slug = $post->post_name;
$parent_slug = $post_data->post_name;
if($parent_slug === "positionen")
{?>
  <!-- "positionen/*"-Layout -->
  <?php include get_theme_file_path( '/page-positionen-child.php' ); ?>
<?php }
elseif($parent_slug === "vorstand")
{?>
<?php include get_theme_file_path( '/page-vorstand-child.php' ); ?>
<?php
}
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


