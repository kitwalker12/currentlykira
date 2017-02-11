<!-- entry-nav-below-single -->
<div class="column column-50">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-nav-below' ); ?>>
    <div class="row">
      <div class="column column-50">
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
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="entry-read-more">
            READ MORE
          </a>
        </article>
      </div>
      <div class="column column-50">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <div class="img-container" style="background-image: url(<?php the_post_thumbnail_url('medium_large'); ?>)"></div>
        </a>
      </div>
    </div>
    <header>
      <?php edit_post_link(); ?>
      <?#php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
    </header>
    <?#php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
    <?#php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
  </article>
</div>
<!-- END entry-nav-below-single -->
