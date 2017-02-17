<!-- category -->
<?php get_header(); ?>

<?php $count = 0; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php if ($count == 0): ?>
    <?php get_template_part( 'entry', '1' ); ?>
    <?php comments_template(); ?>
  <?php endif ?>
  <?php if ($count == 1): ?>
    <div class="row">
      <div class="column">
        <h2 class="entry-latest-posts">
          ALL IN <span class="category-title"><?php single_cat_title(); ?></span>
        </h2>
      </div>
    </div>
  <?php endif ?>
  <?php if ($count > 0): ?>
    <?php get_template_part( 'entry', 'cat3' ); ?>
    <?php comments_template(); ?>
  <?php endif ?>
<?php $count = $count + 1; ?>
<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<!-- END category -->
