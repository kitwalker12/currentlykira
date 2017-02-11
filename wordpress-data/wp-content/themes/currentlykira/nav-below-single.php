<!-- nav-below-single -->
<section class="row">
  <?php
    $nav_below_posts = get_posts(array(
      'numberposts' => 2,
      'exclude' => array(get_the_ID())
    ))
  ?>
  <?php $custom_query = new WP_Query(array( 'posts_per_page' => 2, 'post__not_in' => array( get_the_ID() ) ));
    while($custom_query->have_posts()) : $custom_query->the_post(); ?>
      <?php get_template_part( 'entry', 'nav-below-single' ); ?>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</section>
<!-- END nav-below-single -->
