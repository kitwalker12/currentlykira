<!-- footer -->
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
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'float-right' ) ); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column column-50">
          <?php echo sprintf( __( 'all rights reserved. %1$s %2$s', 'currentlykira' ), esc_html( get_bloginfo( 'name' ) ), date( 'Y' ) ); ?>
        </div>
        <div class="column column-50 footer-attrib">
          <?php echo sprintf( __( ' Site Designed By: %1$s.', 'currentlykira' ), '<a href="http://www.rosalie.agency">Rosalie</a>' ); ?>
        </div>
      </div>
    </section>
  </footer>
</main>
<?php wp_footer(); ?>
</body>
</html>
