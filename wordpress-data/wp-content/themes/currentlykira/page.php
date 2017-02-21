<!-- page -->
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'entry', 'page' ); ?>
<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<!-- END page -->
