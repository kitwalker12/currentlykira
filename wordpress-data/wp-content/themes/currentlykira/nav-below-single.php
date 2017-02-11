<!-- nav-below-single -->
<section class="row nav-below-single">
  <?php $nav_below_query_count = 0; ?>
  <?php $nav_below_query = new WP_Query(array( 'posts_per_page' => 2, 'post__not_in' => array( get_the_ID() ) )); ?>
    <?php while($nav_below_query->have_posts()) : $nav_below_query->the_post(); ?>
      <?php get_template_part( 'entry', "nav-below-single-$nav_below_query_count" ); ?>
      <?php $nav_below_query_count++; ?>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</section>
<!-- END nav-below-single -->
