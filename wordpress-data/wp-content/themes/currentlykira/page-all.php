<!-- page-all -->
<?php /* Template Name: All Posts Page */ ?>
<?php get_header(); ?>

<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
<?php $wp_query = new WP_Query(array( 'posts_per_page' => 15, 'paged' => $paged )); ?>
<?php $count = 0; ?>
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
  <?php if ($count == 0): ?>
    <div class="row">
      <div class="column">
        <h2 class="entry-latest-posts">
          <span class="category-title"><?php echo "All Posts" ?></span>
        </h2>
      </div>
    </div>
  <?php endif ?>
  <?php get_template_part( 'entry', '3col' ); ?>
  <?php comments_template(); ?>
  <?php $count = $count + 1; ?>
<?php endwhile; ?>

<div class="row">
  <div class="column column-25 pagination-link">
    <span class="prev-arrow"></span>
    <?php previous_posts_link( 'Newer posts' ); ?>
  </div>
  <div class="column column-25 column-offset-50 pagination-link">
    <?php next_posts_link( 'Older posts' ); ?>
    <span class="next-arrow"></span>
  </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<!-- END page-all -->
