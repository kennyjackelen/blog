    </div><!-- #main -->
 
    <div id="footer">
        <div id="colophon">
 
            <div id="site-info">
            </div><!-- #site-info -->
 
        </div><!-- #colophon -->
    </div><!-- #footer -->

  </div><!-- #wrapper -->

  <?php
    // Set this flag to true to have the server grab non-minified JS
    $debug_mode = false;
  ?>

<?php if ( $debug_mode ) { ?>
  <!-- Grab Microsoft CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.0.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/libs/jquery-1.11.0.min.js"><\/script>')</script>

  <!-- start scripts -->
  <script src="<?php bloginfo('template_url'); ?>/js/libs/min/bootstrap.min.js"></script>
  <?php if (is_single() ) { ?>
  <script src="<?php bloginfo('template_url'); ?>/js/libs/min/jquery.magnific-popup.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/libs/min/jquery.touchSwipe.min.js"></script>
  <?php } ?>
  <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
  <!-- end scripts -->
<?php } else {  // not in debug mode ?>
<?php $js_version = 2;  // for cachebusting  ?>
  <script type="text/javascript">
    // Add a script element as a child of the body
    function downloadJSAtOnload() {
      var element = document.createElement("script");
      <?php if (is_single() ) { ?>
      element.src = "<?php bloginfo('template_url'); ?>/js/publish/onepost.<?php echo $js_version ?>.js";
      <?php } else { ?>
      element.src = "<?php bloginfo('template_url'); ?>/js/publish/multipost.<?php echo $js_version ?>.js";
      <?php } ?>
      document.body.appendChild(element);
    }

    // Check for browser support of event handling capability
    if (window.addEventListener)
      window.addEventListener("load", downloadJSAtOnload, false);
    else if (window.attachEvent)
      window.attachEvent("onload", downloadJSAtOnload);
    else window.onload = downloadJSAtOnload;

  </script>
<?php } ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-43071584-1', 'kennyjackelen.com');
    ga('send', 'pageview');
  </script>
</body>
</html>
