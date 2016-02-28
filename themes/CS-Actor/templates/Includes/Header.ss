<nav class="navbar header-navbar header-nav-white navbar-fixed-top" role="navigation">
    <div class="container-fluid header-navbar-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Logo link and image -->
            <a class="navbar-brand primary-color" href="/#header-section">
                <% if SiteConfig.Logo %>
                    <img src="$SiteConfig.Logo.FitMax(600,100).URL" class="navbar-logo" />
                <% else %>
                    $SiteConfig.Title
                <% end_if %>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">

            <% include Navigation %>

        </div>
    </div> <!-- /.container-fluid -->
</nav>

<!-- Header -->
<section id="header-section">

    <% if ClassName=="HomePage" || Slider %>

        <!-- Revolution Slider -->
        <div class="tp-banner-container">
            <div class="tp-banner-1">
                <ul>

                    <% if ClassName=="HomePage" %>
                        <!-- SLIDE NR.1  -->
                        <li data-transition="fade" data-slotamount="5" data-masterspeed="700" >

                            <img src="$Image.FocusFill(1422,800).URL"  alt="Slider Image $Pos"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                            <div class="tp-caption slider-text-big lfb ltt tp-resizeme"
                                data-x="center" data-hoffset="0"
                                data-y="center" data-voffset="-50"
                                data-speed="600"
                                data-start="800"
                                data-easing="Power4.easeOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="500"
                                data-endeasing="Power4.easeIn"
                                style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">
                                <a id="bgndVideo" class="player" data-property="{videoURL:'oSde9NSulQM',containment:'.video-bg-slide', quality:'large', autoPlay:true, mute:true, opacity:1, stopMovieOnBlur: true}"></a>
                                <%-- optimizeDisplay:true,  --%>
                            </div>

                            <div class="tp-caption slider-text lfb ltt tp-resizeme"
                                data-x="center" data-hoffset="0"
                                data-y="center" data-voffset="-50"
                                data-speed="600"
                                data-start="800"
                                data-easing="Power4.easeOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="500"
                                data-endeasing="Power4.easeIn">
                                <!-- Hero Content -->
                                <div class="hero-content">
                                    <div class="container">
                                        <div class="home-text text-center p-t-90">

                                            <% with SiteConfig %>

                                                <!-- Title -->
                                                <h1>
                                                    $Tagline
                                                </h1>

                                                <!-- Title -->
                                                <h2 class="m-b-10">
                                                    $Title
                                                </h2>

                                                <% if Unions %>
                                                    <h3 class="m-b-90"><b>$Unions</b></h3>
                                                <% end_if %>

                                                <% if ActorsAccessURL %>
                                                    <a class="btn btn-white" href="$ActorsAccessURL" role="button" target="_blank">Actor's Access</a>
                                                <% end_if %>
                                                <% if Resume %>
                                                    <a class="btn btn-white-t" href="$Resume.Link" role="button">Download Resume</a>
                                                <% end_if %>
                                                <% if ImdbURL %>
                                                    <a class="btn btn-white btn-right" href="$ImdbURL" role="button" target="_blank">IMDB Profile</a>
                                                <% end_if %>

                                            <% end_with %>

                                            <% if Sections %>
                                                <!-- Scroll Down -->
                                                <p class="m-t-90">
                                                    <a href="$Sections.First.Link" class="inline-block absabs-b">
                                                      <i class="material-icons md-36">keyboard_arrow_down</i>
                                                    </a>
                                                </p>
                                            <% end_if %>
                                            <!-- End Scroll Down -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Hero Content -->

                            </div>
                        </li>
                    <% end_if %>

                    <% if Slider %>
                        <% loop Slider %>

                            <!-- SLIDE NR. $Pos  -->
                            <li data-transition="fade" data-slotamount="5" data-masterspeed="700">
                                <!-- MAIN IMAGE -->
                                <img src="$Image.CroppedImage(1422,800).URL"  alt="Slider Image $Pos"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption slider-text-big lfb ltt tp-resizeme"
                                    data-x="center" data-hoffset="0"
                                    data-y="center" data-voffset="-50"
                                    data-speed="600"
                                    data-start="800"
                                    data-easing="Power4.easeOut"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.01"
                                    data-endelementdelay="0.1"
                                    data-endspeed="500"
                                    data-endeasing="Power4.easeIn">$Title
                                </div>


                                <% if Caption %>
                                <div class="tp-caption slider-text-small lfb ltt tp-resizeme"
                                    data-x="center" data-hoffset="0"
                                    data-y="center" data-voffset="50"
                                    data-speed="600"
                                    data-start="900"
                                    data-easing="Power4.easeOut"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.01"
                                    data-endelementdelay="0.1"
                                    data-endspeed="500"
                                    data-endeasing="Power4.easeIn">$Caption
                                </div>
                                <% end_if %>


                                <% if Link %>
                                <div class="tp-caption slider-text lfb ltt tp-resizeme"
                                    data-x="center" data-hoffset="0"
                                    data-y="center" data-voffset="150"
                                    data-speed="600"
                                    data-start="900"
                                    data-easing="Power4.easeOut"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.01"
                                    data-endelementdelay="0.1"
                                    data-endspeed="500"
                                    data-endeasing="Power4.easeIn">
                                        <a class="btn btn-primary" href="$Link.RAW" role="button" <% if OpenInNew %>target="_blank"<% end_if %> >$ButtonLabel</a>
                                </div>
                                <% end_if %>
                            </li>

                        <% end_loop %>
                    <% end_if %>

                </ul>
            </div>
        </div><!-- End Revolution Slider -->

    <% end_if %>

</section>
<!-- End Header -->
