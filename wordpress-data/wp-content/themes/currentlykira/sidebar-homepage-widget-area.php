<!-- sidebar -->
<aside id="sidebar" role="complementary">
<?php if ( is_active_sidebar( 'homepage-widget-area' ) ) : ?>
<div id="primary" class="homepage-widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'homepage-widget-area' ); ?>
</ul>
</div>
<?php endif; ?>
</aside>
<!-- END sidebar -->
