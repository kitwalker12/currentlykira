<!-- entry page -->
<header><?php edit_post_link(); ?></header>
<div class="row">
  <div class="column">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
      <div class="img-container" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)">
      </div>
    </article>
  </div>
</div>
<div class="row">
  <div class="column">
    <?php get_template_part( 'entry', 'content' ); ?>
  </div>
</div>
<!-- END entry page -->
