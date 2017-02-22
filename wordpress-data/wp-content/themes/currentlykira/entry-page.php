<!-- entry page -->
<header><?php edit_post_link(); ?></header>
<?php if (has_post_thumbnail()): ?>
  <div class="row">
    <div class="column">
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
        <div class="img-container" style="background-image: url(<?php the_post_thumbnail_url('x-large'); ?>)">
        </div>
      </article>
    </div>
  </div>
<?php endif ?>
<div class="row">
  <div class="column">
    <?php get_template_part( 'entry', 'content' ); ?>
  </div>
</div>
<!-- END entry page -->
