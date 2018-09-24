<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */




?>
<div id="post-<?php the_ID(); ?>" class="card resource-<?php echo $term_list[0]->slug; ?>">
  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
    <h2><?php the_title(); ?></h2>
  </a>
  <p><?php echo excerpt(24); ?></p>
    <?php

    $term_list = wp_get_post_terms($post->ID, 'md_addiction', array("fields" => "all"));
    if ((!empty($term_list)) && (!is_wp_error($term_list))) {
    $myArray = [];
    echo '<div class="resource-post-tags taxonomy-md_addiction clearfix"><h3 class="card-tag-header">MD Addiction:</h3>';
      echo '<ul class="resource-tags">';
      foreach($term_list as $term) {
        $parents = get_ancestors($term->term_id, 'md_addiction' );
        $parents = array_reverse($parents);
        array_push($parents, $term->term_id);
        $myArray = array_merge($myArray, $parents);
        $myArray = array_unique($myArray);
      }
      array_unique($myArray);
      foreach($myArray as $parent) {
        $foo = get_term( $parent);
        echo '<li class="resource-tag"><span><a href="' . get_term_link($foo) . '">' . $foo->name . '</a></span></li>';
      }
      echo "</ul>";
    echo '</div>';
    }

    $term_list = wp_get_post_terms($post->ID, 'response_type', array("fields" => "all"));
    if ((!empty($term_list)) && (!is_wp_error($term_list))) {
      echo '<div class="resource-post-tags taxonomy-response_type clearfix"><h3 class="card-tag-header">Response Type</h3>';
      echo '<ul class="resource-tags">';
      foreach($term_list as $tag) {
        echo '<li class="resource-tag"><span><a href="' . get_term_link($tag) . '">' . $tag->name . '</a></span></li>';
      }
      echo '</ul></div>';
    }
    ?>
</div>
