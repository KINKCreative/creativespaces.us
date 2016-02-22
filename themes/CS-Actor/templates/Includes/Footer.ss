<!-- Footer -->
<footer class="footer p-t-90 p-b-60">
    <div class="container">
        <div class="row">
            <!-- Footer Logo -->
            <div class="col-sm-12 text-center">

                <% if SiteConfig.Logo %>
                  <img src="$SiteConfig.Logo.SetWidth(120)" alt="$SiteConfig.Title - Logo" height="60" width="60">
                <% end_if %>

                <div class="clearfix"></div>

                <h2>$SiteConfig.Title</h2>
                <%-- <h4>$SiteConfig.Tagline</h4> --%>
                <% with SiteConfig %>
                <ul class="footer-social inline-block m-t-30">
                    <li><a href="$FacebookURL" target="_blank" class="primary-hover"><i class="icon-facebook"></i></a></li>
                    <li><a href="$TwitterURL"  target="_blank" class="primary-hover"><i class="icon-twitter"></i></a></li>
                    <%-- <li><a href="$InstagramURL" target="_blank"><i class="icon-instagram"></i></a></li> --%>
                    <li><a href="$LinkedInURL"  target="_blank" class="primary-hover"><i class="icon-linkedin"></i></a></li>
                </ul>
                <% end_with %>

                <div class="clearfix"></div>

                <p class="m-t-45 m-b-45">
                  <a href="#top" class="primary-color"><i class="material-icons">keyboard_arrow_up</i></a>
                </p>

                <small>&copy; {$Now.Year} $SiteConfig.Title</small>

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</footer>
<!-- End Footer -->

<!-- Javascript Plugins -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<%-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-18606421-1', 'auto');
  ga('send', 'pageview');

</script> --%>

<%-- <!-- Main Javascript -->
<script src="$ThemeDir/assets/js/main.js"></script>
<script src="$ThemeDir/scripts/main.min.js"></script>

 --%>
