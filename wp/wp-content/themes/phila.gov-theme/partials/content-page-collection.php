<?php
/**
 * The template used for displaying a content collection
 *
 * @package phila-gov
 */

 $parent_title = get_the_title();

 $parent_content = get_the_content();
?>

<?php if ( $parent_title ) : ?>

  <h1><?php echo $parent_title ?> </h1>

  <p><?php echo $parent_content ?></p>

<?php else :

  $walker_menu = new Content_Collection_Walker();
  if($post->post_parent) {
    $children = wp_list_pages(array(
      'sort_column' => 'menu_order',
      'title_li' => '',
      'child_of' => $post->post_parent,
      'echo' => 0,
      'walker' => $walker_menu
      ));
    $page_title = get_the_title($post->post_parent);
  } ?>
  <div class="data-swiftype-index='true'">
    <div class="row">
      <header class="entry-header small-24 columns">
        <?php if ( $parent_title ) : ?>
          <h1><?php echo $parent_title ?> </h1>
        <?php else : ?>
          <h1><?php echo $page_title; ?></h1>
        <?php endif; ?>
      </header>
    </div>
    <article id="post-<?php the_ID(); ?>">
      <div class="row">
        <div class="small-24 columns">
            <aside>
              <h1><?php echo $page_title; ?></h1>

              <ul class="tabs vertical">
                <?php  echo $children; ?>
              </ul>
            </aside>
        <div data-swiftype-name="body" data-swiftype-type="text" class="entry-content tabs-content">
          <div class="content active">
            <header class="entry-header">
              <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
            </header><!-- .entry-header -->
            <?php the_content(); ?>
          </div>
        </div><!-- .entry-content -->
      </div>
    </div>
  </div>
    <?php get_template_part( 'partials/content', 'modified' ) ?>
  </article><!-- #post-## -->

<?php endif; ?>
