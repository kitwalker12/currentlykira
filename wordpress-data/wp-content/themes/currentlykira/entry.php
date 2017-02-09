<!-- entry -->
<header><?php edit_post_link(); ?></header>
<div class="row">
  <div class="column">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
      <div class="img-container" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)">
      </div>
      <article class="entry-info">
        <h3 class="entry-hashtag">
          <?php if ( get_post_meta( get_the_ID(), 'hashtag', true ) ): ?>
            <?php echo get_post_meta( get_the_ID(), 'hashtag', true ); ?>
          <?php else: ?>
            <?php echo "#CURRENTLYBEAUTY"; ?>
          <?php endif ?>
        </h3>
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
        <p class="entry-tagline">
          <?php the_time( get_option( 'date_format' ) ); ?>
        </p>
        <div class="entry-line">&nbsp;</div>
      </article>
    </article>
  </div>
</div>
<div class="row">
  <div class="column">
    <?php get_template_part( 'entry', 'content' ); ?>
  </div>
</div>
<!-- END entry -->
