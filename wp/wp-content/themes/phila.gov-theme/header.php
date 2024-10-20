<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @package phila-gov
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <?php get_template_part('partials/global/analytics'); ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="<?php echo ( is_archive() || is_search() || is_home() ) ? get_bloginfo('description') : phila_get_item_meta_desc(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#2176d2">

  <!-- Swiftype -->
  <meta class="swiftype" name="title" data-type="string" content="<?php echo str_replace(' | ' . get_bloginfo('name'), '', phila_filter_title( $title ) ); ?>">
  <meta class="swiftype" name="tags" data-type="string" content="wordpress" />
  <meta class="swiftype" name="site-priority" data-type="integer" content="10" />
  <meta class="swiftype" name="content_type" data-type="string" content="<?php echo get_post_type($post->ID)?>">
  <meta class="swiftype" name="weighted_search" data-type="integer" content="<?php phila_weighted_search_results() ?>">

  <?php if (is_single()) : ?>
    <meta class="swiftype" name="published_at" data-type="date" content="<?php echo get_the_time('c', $post->ID); ?>" />
  <?php endif; ?>

  <link rel="shortcut icon" type="image/x-icon" href="//cityofphiladelphia.github.io/patterns/images/favicon.ico">

  <?php wp_head(); ?>

  <!--[if lte IE 9]>
  <p class="browsehappy alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience. If you can't switch browsers, turn off  compatibility mode.</p>
  <![endif]-->

  <?php if( ( !is_home() ) && ( is_single() ) ) : ?>
      <?php if (function_exists('rwmb_meta')): ?>
        <?php $append_to_head = rwmb_meta( 'phila_append_to_head', $args = array('type' => 'textarea'), $post->ID); ?>
        <?php if ( !$append_to_head == '' ): ?>
          <!-- Begin Custom Markup Metabox: Append to Head -->
          <?php echo $append_to_head; ?>
          <!-- End Custom Markup Metabox: Append to Head -->
        <?php endif;?>
      <?php endif; ?>
  <?php endif; ?>

</head>

<body <?php body_class(); ?> lang="en" data-clarity-unmask="True">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MC6CR2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <header class="global-nav no-js pbm pbn-mu mbn-mu">
    <h1 class="accessible">City of Philadelphia</h1>

    <!-- Utility Navigation -->
    <div class="row columns bg-ben-franklin-blue expanded utility-nav" data-swiftype-index="false">
      <div class="row">
        <div class="medium-24 columns float-right">
          <ul class="medium-horizontal menu show-for-medium float-right">
            <li><a href="/departments/mayor/">Office of the Mayor</a></li>
            <li><a href="/departments/">City government directory</a></li>
            <li>
              <div id="google_translate_element" class="no-js"><span class="show-for-sr">Google Translate</span></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- sticky/desktop nav -->
    <div id="global-sticky-nav" class="row">
      <div class="small-24 columns">
        <div class="row primary-menu" data-sticky-container data-swiftype-index="false">
          <div class="columns phila-sticky phn" data-margin-top="0" data-sticky data-sticky-on="medium">
            <div class="row sticky-header-width">
              <div class="small-16 medium-6 columns valign small-push-4 medium-push-0">
                <div class="valign-cell">
                  <a href="<?php echo get_home_url(); ?>" class="logo" aria-label="City of Philadelphia">
                    <img src="<?php echo get_stylesheet_directory_uri() . "/img/city-of-philadelphia-logo.svg" ?>" data-fallback="//cityofphiladelphia.github.io/patterns/images/city-of-philadelphia.png" alt="City of Philadelphia">
                  </a>
                </div>
              </div>
              <a href="#page" aria-hidden="false" class="accessible">Skip to main content</a>
              <div class="medium-17 columns show-for-medium desktop-nav">
                <div class="top-bar-right valign-mu">
                  <nav data-swiftype-index="false" class="phila-global-nav-menu valign-mu" aria-label="main-nav">
                    <ul class="horizontal menu pan valign-mu">
                      <li class="services-menu-link" data-toggle="services-mega-menu">
                        <a href="" class="no-link valign-cell" data-link="/service-directory/" onclick="noLink(event)">Services</a>
                      </li>
                      <li>
                        <a href="/programs-initiatives/#/" class="valign-cell">Programs &amp; initiatives</a>
                      </li>
                      <li>
                        <a href="/the-latest/" class="valign-cell"> News &amp; events</a>
                      </li>
                      <li>
                        <a href="/documents/" class="valign-cell"> Publications &amp; forms</a>
                      </li>
                    </ul>
                </nav>
              </div>
            </div>
            <div class="small-5 medium-1 columns valign phn-m">
              <div class="valign-cell">
                <button id="site-search-button" class="site-search" type="button" data-toggle="search-dropdown">
                  <i class="fas fa-search fa-2x" aria-hidden="true"></i>
                  <span class="show-for-small-only">Search</span>
                  <span class="accessible" for="site-search-button">Search</span>
                </button>
              </div>
            </div>
          </div> <!-- close row -->
          <!--Begin mobile nav -->
          <div class="top-bar">
            <div class="title-bar small-5 columns" data-responsive-toggle="mobile-nav" data-swiftype-index="false" data-hide-for="medium">
              <button class="menu-icon" type="button" data-toggle>
                <i class="fas fa-bars fa-2x" aria-hidden="true"></i>
                <span class="title-bar-title">Menu</span>
              </button>
            </div>
            <div class="primary-menu medium-15 medium-push-2 small-24 columns valign-mu" id="mobile-nav">
              <div class="top-bar-right valign-mu show-for-small-only">
              <nav data-swiftype-index="false" class="phila-mobile-nav-menu valign-mu" aria-label="mobile-nav">
                <ul id="mobile-nav-drilldown" class="vertical menu pan valign-mu">
                  <li><a href="/"><i class="fas fa-home fa-lg"></i> Home</a></li>
                  <li class="is-drilldown-submenu-parent" tabindex="0">
                    <a href="#service-directory" class="valign-cell"><i class="far fa-list show-for-small-only"></i> Services</a>
                    <ul class="menu vertical menu-top-offset" tabindex="0">
                      <li tabindex="0"><a href="/service-directory/"> Service directory</a></li>
                      <?php
                        $args = array(
                          //TODO: only display pages with taxonomy applied
                          'post_type' => 'service_page',
                          'orderby' => 'menu_order',
                          'order' => 'ASC',
                          'title_li' => '',
                          'link_before' => '<span>',
                          'link_after'  => '</span>',
                        );
                        wp_list_pages($args);
                      ?>
                    </ul>
                    </li>
                    <li tabindex="0">
                      <a href="/programs-initiatives/#/" class="valign-cell"><i class="fas fa-info-circle"></i> Programs &amp; initiatives</a>
                    </li>
                    <li tabindex="0">
                      <a href="/news/" class="valign-cell"><i class="fas fa-microphone"></i> News &amp; events</a>
                    </li>
                    <li tabindex="0">
                      <a href="/documents/" class="valign-cell"><i class="fas fa-file-alt"></i> Publications &amp; forms</a>
                    </li>
                    <li class="bg-sidewalk" tabindex="0">
                      <a href="/mayor/"><i class="fas fa-university"></i> Mayor's Office</a>
                    </li>
                    <li class="bg-sidewalk" tabindex="0"><a href="/departments/"><i class="fas fa-sitemap"></i> City government directory</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div><!--End mobile nav -->
        </div><!-- close columns -->
      </div>
    </div>
  </div>
</header>
<div id="page">
  <?php
    //create alerts when appropriate
    call_user_func(array('Phila_Gov_Site_Wide_Alert_Rendering', 'create_site_wide_alerts')); ?>
    <?php
    $parent = phila_util_get_furthest_ancestor($post);
    $post_type = get_post_type();
    if ( !phila_util_is_v2_template( $parent->ID ) &&
        !is_front_page() &&
        !is_404() &&
        !is_page_template('templates/the-latest.php') &&
        $post_type != 'programs' &&
        $post_type != 'guides' &&
        $post_type != 'event_spotlight') : ?>
        <div class="mtl mbm">
          <?php get_template_part( 'partials/breadcrumbs' ); ?>
        </div>
    <?php endif; ?>

  <div id="content">
