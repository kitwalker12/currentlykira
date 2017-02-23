<!-- index -->
<?php get_header(); ?>

<?php $count = 0; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php if ($count == 0): ?>
    <?php get_template_part( 'entry', '1' ); ?>
    <?php comments_template(); ?>
    <?php get_sidebar('homepage-widget-area'); ?>
  <?php endif ?>
  <?php if ($count == 1): ?>
    <div class="row">
      <div class="column">
        <h2 class="entry-latest-posts">
          LATEST POSTS
        </h2>
      </div>
    </div>
  <?php endif ?>
  <?php if ($count == 1 || $count == 2): ?>
    <?php get_template_part( 'entry', '2' ); ?>
    <?php comments_template(); ?>
  <?php endif ?>
  <?php if ($count > 2): ?>
    <?php get_template_part( 'entry', '3' ); ?>
    <?php comments_template(); ?>
  <?php endif ?>
<?php $count = $count + 1; ?>
<?php endwhile; endif; ?>

<?php $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-all.php',
                'number' => 1
                )); ?>
<?php if ($pages[0]): ?>
  <div class="row">
    <div class="column view-all-link">
       <a href="<?php echo get_page_link($pages[0]->ID); ?>" class="entry-read-more">
        VIEW ALL POSTS
      </a>
    </div>
  </div>
<?php endif ?>

<?php get_template_part( 'nav', 'below' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<!-- END index -->
