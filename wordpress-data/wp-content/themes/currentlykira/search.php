<!-- search -->
<?php get_header(); ?>

<?php $count = 0; ?>
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php if ($count == 0): ?>
      <div class="row">
        <div class="column">
          <h2 class="entry-latest-posts">
            <?php printf( __( 'Search Results for: <span class="category-title">%s</span>', 'currentlykira' ), get_search_query() ); ?>
          </h2>
        </div>
      </div>
    <?php endif ?>
    <?php get_template_part( 'entry', 'search' ); ?>
    <?php comments_template(); ?>
    <?php $count = $count + 1; ?>
  <?php endwhile; ?>
<?php else : ?>
  <div class="row">
    <div class="column">
      <h2 class="entry-latest-posts">
        <?php _e( 'Sorry, nothing matched your search. Please try again.', 'currentlykira' ); ?>
      </h2>
    </div>
  </div>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<!-- END search -->
