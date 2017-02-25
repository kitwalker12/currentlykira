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
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Font Awesome -->
<script src="https://use.fontawesome.com/e8efe8b873.js"></script>

<!-- Google Structured Data -->
<?php
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<script type="application/ld+json">
[
  {
    "@context": "http://schema.org",
    "@type": "WebSite",
    "name": "<?php echo esc_html( get_bloginfo( 'name' ) ); ?>",
    "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "<?php echo esc_url( home_url( '/' ) ); ?>s?q={s}",
      "query-input": "required name=s"
    }
  },
  {
    "@context": "http://schema.org",
    "@type": "Organization",
    "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
    "logo": "<?php echo $image[0] ?>",
    "sameAs": [
      "<?php echo get_theme_mod('instagram') ?>",
      "<?php echo get_theme_mod('facebook') ?>",
      "https://www.youtube.com/channel/<?php echo get_theme_mod('youtube_channel') ?>"
    ]
  }
]
</script>
<!-- END Google Structured Data -->

<!-- RewardStyle -->
<script>window.nastygoat = {aid:"1zzER76s8t4bOcXXDIK53N8azsUDRA3F-IF9Hie3d28i",pid:"ekTA5CDrOVNxLBwwEbRT3haRKiWJ7bRKJPaOUAmETqB7"};</script>
<script type="text/javascript" src="//assets.rewardstyle.com/scriptmanager/rs-script-manager.js"></script>
<!-- END RewardStyle -->
</head>
<body <?php body_class(); ?>>

<!-- GA -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', "<?php echo get_theme_mod('google_analytics') ?>", 'auto');
  ga('send', 'pageview');

</script>
<!-- END GA -->

<!-- Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- END Facebook -->

<!-- Twitter -->
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
<!-- END Twitter -->

<main class="wrapper">
  <nav class="navigation">
    <section class="container">
      <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'float-left' ) ); ?>
      <div id="search">
        <?php get_search_form(); ?>
      </div>
      <ul class="float-right">
        <li class="social"><a target="_blank" href="<?php echo get_theme_mod('instagram') ?>" class='fa fa-instagram'></a></li>
        <li class="social"><a target="_blank" href="<?php echo get_theme_mod('facebook') ?>" class='fa fa-facebook-official'></a></li>
        <li class="social"><a target="_blank" href="https://www.youtube.com/channel/<?php echo get_theme_mod('youtube_channel') ?>" class='fa fa-youtube-play'></a></li>
      </ul>
    </section>
  </nav>
  <section class="container site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
      <?php the_custom_logo() ?>
    </a>
  </section>
  <section class="container site-body">
<!-- END header -->
