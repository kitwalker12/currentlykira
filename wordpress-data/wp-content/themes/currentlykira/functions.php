<?php
add_action( 'after_setup_theme', 'currentlykira_setup' );
function currentlykira_setup() {
  load_theme_textdomain( 'currentlykira', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 1440;
  register_nav_menus(
  array( 'main-menu' => __( 'Main Menu', 'currentlykira' ) )
  );
}
add_action( 'comment_form_before', 'currentlykira_enqueue_comment_reply_script' );
function currentlykira_enqueue_comment_reply_script() {
  if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'currentlykira_title' );
function currentlykira_title( $title ) {
  if ( $title == '' ) {
  return '&rarr;';
  } else {
  return $title;
  }
}
add_filter( 'wp_title', 'currentlykira_filter_wp_title' );
function currentlykira_filter_wp_title( $title ) {
  return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'currentlykira_widgets_init' );
function currentlykira_widgets_init() {
  register_sidebar( array (
  'name' => __( 'Above Footer Area', 'currentlykira' ),
  'id' => 'primary-widget-area',
  'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
  'after_widget' => "</div>",
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  ) );

  //Add Sidebars
  register_sidebar( array (
  'name' => __( 'Inside Footer Area', 'currentlykira' ),
  'id' => 'footer-widget-area',
  'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
  'after_widget' => "</div>",
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  ) );
  register_sidebar( array (
  'name' => __( 'Homepage Middle Area', 'currentlykira' ),
  'id' => 'homepage-widget-area',
  'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
  'after_widget' => "</div>",
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  ) );
}
function currentlykira_custom_pings( $comment ) {
  $GLOBALS['comment'] = $comment;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
  <?php
}
add_filter( 'get_comments_number', 'currentlykira_comments_number' );
function currentlykira_comments_number( $count ) {
  if ( !is_admin() ) {
    global $id;
    $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}

// Add active class to nav li
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
      $classes[] = 'active ';
  }
  return $classes;
}

// Add Logo Support to Theme
function theme_prefix_setup() {
  add_theme_support( 'custom-logo', array(
    'height'      => 36.8,
    'width'       => 431.3,
    'flex-width' => true,
  ) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

function theme_prefix_the_custom_logo() {
  if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
  }
}

// Add Custome image size
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
  add_image_size( 'x-large', 1140 );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
  return array_merge( $sizes, array(
    'x-large' => __( 'X-Large' ),
  ) );
}

// Add Youtube/GA/Facebook/Instagram Settings
function currentlykira_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
  $wp_customize->add_setting( 'youtube_channel' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_setting( 'youtube_api_key' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_setting( 'facebook' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_setting( 'instagram' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_setting( 'google_analytics' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_setting( 'instagram_client' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_setting( 'instagram_user_id' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ) );
  $wp_customize->add_setting( 'instagram_access_token' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ) );

  $wp_customize->add_section( 'currentlykira_social' , array(
    'title'      => __( 'Social', 'currentlykira' ),
    'priority'   => 30,
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'currentlykira_social_youtube_channel', array(
    'label'        => __( 'Youtube Channel ID', 'currentlykira' ),
    'section'    => 'currentlykira_social',
    'settings'   => 'youtube_channel',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'currentlykira_social_youtube_api', array(
    'label'        => __( 'Youtube API Key', 'currentlykira' ),
    'section'    => 'currentlykira_social',
    'settings'   => 'youtube_api_key',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'currentlykira_social_google_analytics', array(
    'label'        => __( 'Google Analytics ID', 'currentlykira' ),
    'section'    => 'currentlykira_social',
    'settings'   => 'google_analytics',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'currentlykira_social_facebook', array(
    'label'        => __( 'Facebook URL', 'currentlykira' ),
    'section'    => 'currentlykira_social',
    'settings'   => 'facebook',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'currentlykira_social_instagram', array(
    'label'        => __( 'Instagram URL', 'currentlykira' ),
    'section'    => 'currentlykira_social',
    'settings'   => 'instagram',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'currentlykira_social_instagram_client', array(
    'label'        => __( 'Instagram Client ID', 'currentlykira' ),
    'section'    => 'currentlykira_social',
    'settings'   => 'instagram_client',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'currentlykira_social_instagram_user_id', array(
    'label'        => __( 'Instagram User ID', 'currentlykira' ),
    'section'    => 'currentlykira_social',
    'settings'   => 'instagram_user_id',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'currentlykira_social_instagram_access_token', array(
    'label'        => __( 'Instagram Access Token', 'currentlykira' ),
    'section'    => 'currentlykira_social',
    'settings'   => 'instagram_access_token',
  ) ) );
}
add_action( 'customize_register', 'currentlykira_customize_register' );

// Don't compress images
add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );

// Add Instafeed
function load_instafeed() {
  wp_register_script( 'instafeed', get_template_directory_uri() . '/js/instafeed.min.js' );
  wp_enqueue_script( 'instafeed' );
}
add_action( 'wp_enqueue_scripts', 'load_instafeed' );
