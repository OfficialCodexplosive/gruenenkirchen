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
elseif($post_slug === "ratsfraktion")
{?>
<?php include get_theme_file_path( '/page-vorstand.php' ); ?>
<?php 
}
elseif($post_slug === "themen")
{?>
<?php include get_theme_file_path( '/page-themen.php' ); ?>
<?php 
}
elseif($post_slug === "termine")
{?>
<?php include get_theme_file_path( '/page-termine.php' ); ?>
<?php }
elseif($parent_slug === "ratsfraktion")
{?>
<?php include get_theme_file_path( '/page-vorstand-child.php' ); ?>
<?php
}else
{?>  
  <?php include get_theme_file_path( '/page-default.php' ); ?>
<?php }?>     
    
  

<?php get_footer(); ?>


