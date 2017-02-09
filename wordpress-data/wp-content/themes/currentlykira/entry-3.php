<!-- entry-3 -->
<?php if ($wp_query->current_post % 3 == 0) {
  echo "<div class='row'>";
} ?>
<div class="column column-33">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-3' ); ?>>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <div class="img-container" style="background-image: url(<?php the_post_thumbnail_url(large); ?>)">
      </div>
    </a>
    <article class="entry-info">
      <?php if ( is_singular() ) {
        echo '<h1 class="entry-title">';
      } else {
        echo '<h2 class="entry-title">';
      } ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
      <?php if ( is_singular() ) {
        echo '</h1>';
      } else {
        echo '</h2>';
      } ?>
    </article>
    <header>
      <?php edit_post_link(); ?>
      <?#php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
    </header>
    <?#php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
    <?#php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
  </article>
</div>
<?php if (($wp_query->current_post % 3 == 2) || ($wp_query->current_post +1) == ($wp_query->post_count)) {
  echo "</div>";
} ?>
<!-- END entry-3 -->
