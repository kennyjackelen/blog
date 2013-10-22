    </div><!-- #main -->
 
    <div id="footer">
        <div id="colophon">
 
            <div id="site-info">
            </div><!-- #site-info -->
 
        </div><!-- #colophon -->
    </div><!-- #footer -->

  </div><!-- #wrapper -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/libs/jquery-1.10.2.min.js"><\/script>')</script>

  <!-- start scripts -->
  <script src="<?php bloginfo('template_url'); ?>/js/libs/min/bootstrap.min.js"></script>
  <?php if (is_single() ) { ?>
  <script src="<?php bloginfo('template_url'); ?>/js/libs/min/jquery.magnific-popup.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/libs/min/jquery.touchSwipe.min.js"></script>
  <?php } ?>
  <script src="<?php bloginfo('template_url'); ?>/js/main.min.js"></script>
  <!-- end scripts -->

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
