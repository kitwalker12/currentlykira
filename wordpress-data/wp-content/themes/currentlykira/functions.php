<?php
add_action( 'after_setup_theme', 'currentlykira_setup' );
function currentlykira_setup() {
  load_theme_textdomain( 'currentlykira', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 640;
  register_nav_menus(
  array( 'main-menu' => __( 'Main Menu', 'currentlykira' ) )
  );
}
add_action( 'wp_enqueue_scripts', 'currentlykira_load_scripts' );
function currentlykira_load_scripts() {
  wp_enqueue_script( 'jquery' );
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
  'name' => __( 'Sidebar Widget Area', 'currentlykira' ),
  'id' => 'primary-widget-area',
  'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
  'after_widget' => "</li>",
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


