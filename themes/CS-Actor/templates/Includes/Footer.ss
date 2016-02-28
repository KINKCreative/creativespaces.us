<!-- Footer -->
<footer class="footer p-t-90 p-b-60">
    <div class="container">
        <div class="row">
            <!-- Footer Logo -->
            <div class="col-sm-12 text-center">

                <% if SiteConfig.Logo %>
                  <img src="$SiteConfig.Logo.SetWidth(300).URL" alt="$SiteConfig.Title - Logo" width="200">
                  <div class="clearfix"></div>
                <% else %>

                  <div class="clearfix"></div>
                  <h2>$SiteConfig.Title</h2>

                <% end_if %>
                <%-- <h4>$SiteConfig.Tagline</h4> --%>
                <% with SiteConfig %>
                <ul class="footer-social inline-block m-t-30">
                    <% if FacebookURL %>
                      <li><a href="$FacebookURL" target="_blank" class="primary-hover"><i class="icon-facebook"></i></a></li>
                    <% end_if %>
                    <% if TwitterURL %>
                      <li><a href="$TwitterURL"  target="_blank" class="primary-hover"><i class="icon-twitter"></i></a></li>
                    <% end_if %>
                    <% if InstagramURL %>
                      <li><a href="$InstagramURL" target="_blank"><i class="icon-picture"></i></a></li>
                    <% end_if %>
                    <% if LinkedInURL %>
                      <li><a href="$LinkedInURL"  target="_blank" class="primary-hover"><i class="icon-linkedin"></i></a></li>
                    <% end_if %>
                    <% if SoundCloudURL %>
                      <li><a href="$SoundCloudURL"  target="_blank" class="primary-hover"><i class="icon-mic"></i></a></li>
                    <% end_if %>
                    <% if $VimeoURL %>
                      <li><a href="$VimeoURL"  target="_blank" class="primary-hover"><i class="icon-vimeo"></i></a></li>
                    <% end_if %>
                    <% if URL %>
                      <li><a href="$YouTubeURL"  target="_blank" class="primary-hover"><i class="icon-youtube"></i></a></li>
                    <% end_if %>
                    <% if $GooglePlusURL %>
                      <li><a href="$URL"  target="_blank" class="primary-hover"><i class="icon-googleplus"></i></a></li>
                    <% end_if %>

                </ul>
                <% end_with %>

                <div class="clearfix"></div>

                <p class="m-t-45 m-b-45">
                  <a href="#top" class="primary-color"><i class="material-icons">arrow_upward</i></a>
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
