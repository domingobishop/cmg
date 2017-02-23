<div class="sponsors">
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo-southaust.jpg">
      </div>
      <div class="col-md-4 text-center">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo-sport-sa.jpg">
      </div>
      <div class="col-md-4 text-center">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo-cgvc.jpg">
      </div>
    </div>
  </div>
</div>
<div class="major-sponsors">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h3>Major Sponsors</h3>
      </div>
    </div>
    <div class="row major-sponsors-wrapper">
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/Mr-Mick-logo.png" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/MAGIC_logo.png" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/639_North_West.png" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/Plains-Producer.png" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/DP01_MasterLogo.png" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/Design_Valley_Logo-01.png" class="img-responsive">
      </div>
    </div>
    <div class="row major-sponsors-wrapper">
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/detpak.gif" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/CLARE-SIGNS.png" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/SJM_logo.png" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/5cs-logo.png" class="img-responsive">
      </div>
      <div class="col-xs-4 col-sm-3 col-md-2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/sponsors/BSA_SATC_1_RGB.png" class="img-responsive">
      </div>
    </div>
  </div>
</div>
<footer id="footer" class="bc-footer">
  <div class="container">
    <?php if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
      <div class="row">
          <?php dynamic_sidebar( 'footer-widget-area' ); ?>
      </div>
    <?php } ?>
    <div class="row bc-info">
      <div class="col-lg-8 col-lg-offset-2 text-center">
        <h4>Clare Masters Games</h4>
        <p>
          <a href="https://www.facebook.com/ClareMastersGames/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png"></a>
          <a href="https://twitter.com/claresamasters" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/twitter.png"></a>
        </p>
        <p>
          Clare & Gilbert Valleys Council<br>
          Telephone: <a href="tel:+61 (08) 88 42 39 99">+61 (08) 88 42 39 99</a><br>
          Email us: <a href="mailto:kjk@CGVC.sa.gov.au">kjk@CGVC.sa.gov.au</a>
        </p>
        <p><small>Copyright © <?php echo date("Y"); ?> <br>
            Website by <a href="http://creatistic.com.au/" target="_blank">Creatistic</a></small></p>
      </div>
    </div>
  </div>
</footer>
<!-- #foot -->

<?php wp_footer(); ?>

<!-- jQuery -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js" type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

<!-- BC JavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/js/bc.js"></script>
</body>
</html>