<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
    <?php
      if ( is_single() ) { single_post_title(); }
      elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
      elseif ( is_page() ) { single_post_title(''); }
      elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
      elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
      else { bloginfo('name'); wp_title('|'); get_page_number(); }

    ?>
  </title>
  <?php if ( is_home() || is_front_page() ) { ?>
  <meta name="mobile-web-app-capable" content="yes">
  <?php } ?>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- start styles -->
  <?php $css_version = 1;  // for cachebusting  ?>
  <?php if (is_single() ) { ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/publish/onepost.<?php echo $css_version ?>.css" />
  <?php } else { ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/publish/multipost.<?php echo $css_version ?>.css" />
  <?php } ?>
  <!-- end styles -->
  
  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'your-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
  <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'your-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

</head>
<body>

<ul id="loading_message" style="display:none; top: 0px; left: 5%; position: fixed; width: 90%; height: auto; margin: 0px; padding: 0px; list-style-type: none; z-index: 9999999;">
  <li id="loading_message_inner" style="overflow: hidden; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAoCAYAAAAPOoFWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAPZJREFUeNq81tsOgjAMANB2ov7/7ypaN7IlIwi9rGuT8QSc9EIDAsAznxvY4pXPKr05RUE5MEVB+TyWfCEl9LZApYopCmo9C4FKSMtYoI8Bwv79aQJU4l6hXXCZrQbokJEksxHo9KMOgc6w1atHXM8K9DVC7FQnJ0i8iK3QooGgbnyKgMDygBWyYFZoqx4qS27KqLZJjA1D0jK6QJcYEQEiWv9PGkTsbqxQ8oT+ZtZB6AkdsJnQDnMoHXHLGKOgDYuCWmYhEERCI5gaamW0bnHdA3k2ltlIN+2qKRyCND0bhqSYCyTB3CAOc4WusBEIpkeBuPgJMAAX8Hs1NfqHRgAAAABJRU5ErkJggg==); background-attachment: scroll; background-color: rgb(100, 100, 100); border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-width: 2px; border-bottom-style: solid; border-color: rgb(100,100,100); border-left-width: 2px; border-left-style: solid; border-right-width: 2px; border-right-style: solid; box-shadow: rgba(0, 0, 0, 0.0980392) 0px 2px 4px; color: rgb(10, 10, 10); background-position: 0% 0%; background-repeat: repeat no-repeat;">
    <div>
      <div style="font-size: 13px; line-height: 16px; text-align: center; padding: 8px 10px 9px; width: auto; position: relative;">
        <span>Loading...</span>
      </div>
    </div>
  </li>
</ul>
<script type="text/javascript">
  // The loading message is hidden by default so you don't have a persistent "loading..." message if JS is disabled.
  // We'll use JS to show it now.
  document.getElementById('loading_message').style.display = 'block';
</script>

<div id="navigation" class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php bloginfo( 'url' ) ?>/"><?php bloginfo( 'name' ) ?></a>
      <div class="nav-collapse collapse" style="height: 0;">
        <form class="navbar-search pull-right" method="get" action="<?php bloginfo( 'home' ); ?>/">
          <input type="text" class="span2 search-query" placeholder="Search" name="s" id="s" >
        </form>
        <ul class="nav pull-right">
          <li <?php if(is_home()) { ?> class="active" <?php } ?>>
            <a href="<?php bloginfo( 'url' ) ?>/">Home</a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#archives" data-toggle="dropdown">
              Archives
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <?php
                $args = array(
                  'type' => 'monthly',
                  'format' => 'html'
                  );
                wp_get_archives($args);
              ?>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#categories" data-toggle="dropdown">
              Categories
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <?php
                $args = array(
                  'orderby' => 'name',
                  'order' => 'ASC'
                  );
                $categories = get_categories($args);
                foreach($categories as $category)
                {
              ?>
              <li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
              <?php
                }
              ?>
            </ul>
          </li>
        </ul>
      </div><!-- .nav-collapse -->
    </div><!-- .container-fluid -->
  </div><!-- .navbar-inner -->
</div><!-- #navigation -->

<div id="wrapper" class="hfeed container-fluid">

  <div id="main">
