<!-- entry -->
<?php
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://google.com/article"
  },
  "headline": "<?php the_title(); ?>",
  "image": {
    "@type": "ImageObject",
    "url": "<?php the_post_thumbnail_url('medium'); ?>",
    "height": "200",
    "width": "300"
  },
  "datePublished": "<?php the_time('c'); ?>",
  "dateModified": "<?php the_time('c'); ?>",
  "author": {
    "@type": "Person",
    "name": "<?php the_author_meta('display_name') ?>"
  },
   "publisher": {
    "@type": "Organization",
    "name": "<?php echo esc_html( get_bloginfo( 'name' ) ); ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo $image[0] ?>",
      "width": 426,
      "height": 36
    }
  },
  "description": "<?php echo get_post_meta( get_the_ID(), 'tagline', true ); ?>"
}
</script>
<header><?php edit_post_link(); ?></header>
<div class="row">
  <div class="column">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
      <?php if (has_post_thumbnail()): ?>
        <div class="img-container" style="background-image: url(<?php the_post_thumbnail_url('x-large'); ?>)"></div>
      <?php endif ?>
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
