<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
<!-- CSS Reset -->
<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
<!-- Milligram CSS minified -->
<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- <div id="search">
<?php /*get_search_form();*/ ?>
</div> -->

<main class="wrapper">
  <nav class="navigation">
    <section class="container">
      <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'float-left' ) ); ?>
    </section>
  </nav>
  <section class="container site-title">
    <?php
      $custom_logo_id = get_theme_mod( 'custom-logo' );
      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <?php echo $image; ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
      <?php the_custom_logo() ?>
    </a>
  </section>
  <section class="container site-body">
<!-- END header -->
