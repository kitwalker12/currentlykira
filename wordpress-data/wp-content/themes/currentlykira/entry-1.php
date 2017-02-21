<!-- entry-1 -->
<div class="row">
  <div class="column">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-1' ); ?>>
      <div class="img-container" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)">
        <article class="entry-info">
          <h3 class="entry-hashtag">
            <?php if ( get_post_meta( get_the_ID(), 'hashtag', true ) ): ?>
              <?php echo get_post_meta( get_the_ID(), 'hashtag', true ); ?>
            <?php else: ?>
              <?php echo "#CURRENTLYBEAUTY"; ?>
            <?php endif ?>
          </h3>
          <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
              <?php the_title(); ?>
            </a>
          </h2>
          <div class="entry-line">&nbsp;</div>
          <?php if ( get_post_meta( get_the_ID(), 'tagline', true ) ): ?>
            <p class="entry-tagline">
              <?php echo get_post_meta( get_the_ID(), 'tagline', true ); ?>&hellip;
            </p>
          <?php endif ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="entry-read-more">
            READ MORE
          </a>
        </article>
      </div>
      <header>
        <?php edit_post_link(); ?>
      </header>
    </article>
  </div>
</div>
<!-- END entry-1 -->
