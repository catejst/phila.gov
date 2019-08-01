<?php
/**
 * Guides template
 *
 * @package phila-gov
*/

$user_selected_template = phila_get_selected_template();

$full_row_blog_selected =  rwmb_meta( 'phila_full_row_blog_selected' );
$full_row_blog = rwmb_meta('phila_full_row_blog');
$full_width_press_releases_selected = rwmb_meta( 'phila_full_row_press_releases_selected' );
$full_width_press_releases = rwmb_meta( 'phila_full_row_press_releases' );
$cal_id = rwmb_meta('phila_full_width_calendar_id');

get_header();

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('guides clearfix'); ?>>
  <?php
    while ( have_posts() ) : the_post();
      include( locate_template( 'partials/guides/header.php' ) ); ?>
    <div class="grid-container">
      <div class="grid-x grid-padding-x guide-landing-nav">
      <?php
      $args = array(
        'post_parent' => $post->ID,
        'post_type'   => 'guides', 
        'numberposts' => -1,
        'post_status' => 'any',
        'orderby' => 'menu_order'
      );
      $children = get_children( $args );
      //var_dump($children)
      ?>
      <?php foreach ($children as $child): ?>
        <?php 
          $h3 = $child->post_title; 
          $description = rwmb_meta('phila_meta_desc', $child->ID );
          $icon = rwmb_meta('guide_page_icon', $child->ID);
          $bg_color = rwmb_meta('guide_color_picker', $child->ID);

        ?>
        <div class="cell medium-7">
          <?php include( locate_template( 'partials/guides/navigation-card.php' ) ); ?>
        </div>
        <div class="cell medium-1"></div>
      <?php endforeach;?>

      </div>

    </div>

    <?php if( !empty($full_row_blog_selected) )  :?>
      <?php $blog_override = rwmb_meta('phila_get_post_cats');
            $blog_cat_override = isset( $blog_override['phila_post_category']) ? $blog_override['phila_post_category'] : '';
            $blog_tag_override = isset($blog_override['tag'])? $blog_override['tag'] : ''; 
            $blog_see_all = isset( $blog_override['override_url']) ? $blog_override['override_url'] : ''; ?>

      <!-- Blog Content-->
      <section class="mvl">
        <?php include(locate_template('partials/departments/phila_full_row_blog.php'));?>
      </section>
      <!-- /Blog Content-->
    <?php endif; ?>


      <?php if( !empty($full_width_press_releases_selected) )  :?>
        <?php $press_override = rwmb_meta('phila_get_press_cats');
              $press_cat_override = isset($press_override['phila_press_release_category']) ? $press_override['phila_press_release_category'] : '';
              $press_tag_override = isset($press_override['tag']) ? $press_override['tag'] : '';?> 
        <!-- Press Releases -->
        <div class="row mvl">
          <?php echo do_shortcode('[press-releases posts=5]');?>
        </div>
        <!-- /Press Releases -->
      <?php endif;?>

      <?php if ( !empty( $cal_id ) ):?>
      <?php $cal_calendar= rwmb_meta('phila_calendar_owner');
            $calendar_see_all = rwmb_meta('override_url'); ?>
        <!-- Full Width Calendar -->
        <?php include( locate_template( 'partials/departments/v2/calendar.php' ) ); ?>

        <!-- /Full Width Calendar -->
      <?php endif;?>
        <?php 
        switch ($user_selected_template){
          case ('phila_one_quarter'):
            get_template_part( 'partials/departments/v2/content', 'one-quarter' );
            break;
          case ('resource_list_v2'):
            include(locate_template('partials/resource-list.php'));
            break;
          case('collection_page_v2') :
            include(locate_template('partials/departments/v2/collection-page.php')); 
            break;
          case('document_finder_v2'):
            include(locate_template('partials/departments/v2/document-finder.php'));
            break;
        } ?>
        <?php get_template_part( 'partials/departments/content', 'programs-initiatives' ); ?>

        <?php get_template_part( 'partials/content', 'additional' ); ?>

      <?php endwhile; ?>
  </div><!-- #post-## -->
<?php get_footer(); ?>
