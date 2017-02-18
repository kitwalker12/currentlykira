<!-- footer -->
    <div class="row">
      <div class="column">
        <h2 class="instagram">
          INSTAGRAM
        </h2>
        <a href="<?php echo get_theme_mod('instagram') ?>" class="instagram-link" target="_blank">
          <?php echo "@".basename(get_theme_mod('instagram')) ?>
        </a>
        <div id="instafeed"></div>
        <script type="text/javascript">
          $(document).ready(function() {
            try {
              var feed = new Instafeed({
                clientId: "<?php echo get_theme_mod('instagram_client') ?>",
                target: "instafeed",
                limit: 6,
                get: "user",
                userId: <?php echo get_theme_mod('instagram_user_id') ?>,
                accessToken: "<?php echo get_theme_mod('instagram_access_token') ?>",
                template: '<a href="{{link}}" class="instagram-image" target="_blank"><img src="{{image}}" /></a>',
                resolution: "low_resolution"
              });

              feed.run();
            } catch(err) {}
          });
        </script>
      </div>
    </div>
  </section>
  <footer class="site-footer">
    <section class="container">
      <div class="row">
        <div class="column column-25">
          <div class="footer-title">
            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
          </div>
        </div>
        <div class="column column-75">
          <div class="footer-nav">
            <ul class="float-right">
              <li class="social"><a target="_blank" href="<?php echo get_theme_mod('instagram') ?>" class='fa fa-instagram'></a></li>
              <li class="social"><a target="_blank" href="<?php echo get_theme_mod('facebook') ?>" class='fa fa-facebook-official'></a></li>
              <li class="social"><a target="_blank" href="https://www.youtube.com/channel/<?php echo get_theme_mod('youtube_channel') ?>" class='fa fa-youtube-play'></a></li>
            </ul>
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'float-right' ) ); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column column-50 footer-copyright">
          <?php echo sprintf( __( 'all rights reserved. %1$s %2$s', 'currentlykira' ), esc_html( get_bloginfo( 'name' ) ), date( 'Y' ) ); ?>
        </div>
        <div class="column column-50 footer-attrib">
          <?php echo sprintf( __( ' Site Designed By %1$s.', 'currentlykira' ), '<a href="http://www.rosalie.agency" style="text-decoration:underline" target="_blank">Rosalie</a>' ); ?>
        </div>
      </div>
    </section>
  </footer>
</main>
<?php wp_footer(); ?>
</body>
</html>
