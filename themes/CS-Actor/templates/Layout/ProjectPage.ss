<!-- Header -->
<section id="header-section">

    <!-- Navbar -->
    <nav class="navbar header-navbar navbar-fixed-top" role="navigation">
        <div class="container-fluid header-navbar-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Logo link and image -->
                <a class="navbar-brand" href="/#top">
                    <img src="$ThemeDir/assets/img/logo.png" alt="Rook Logo" height="60" width="60">
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">

                <!-- Navigation Menu -->
                <% include Navigation %>

            </div>
        </div> <!-- /.container-fluid -->
    </nav>
    <!-- End Navbar -->

</section>

<% if Projects %>

<section id="projects">
    <% with Projects.First %>
        <!-- Revolution Slider -->
        <div class="tp-banner-container">
            <div class="tp-banner-1">
                <ul>

                    <!-- SLIDE NR. $Pos  -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="700">
                        <!-- MAIN IMAGE -->
                        <img src="$Image.CroppedImage(1422,800).URL"  alt="Slider Image $Pos"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption slider-text-big lfb ltt tp-resizeme p-80 unwrap"
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


                        <% if Genre %>
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
                            data-endeasing="Power4.easeIn">$Genre / $Format
                        </div>
                        <% end_if %>



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
                                <a class="btn btn-white-t" href="$Link" role="button">View project</a>
                                <% if IMDBLink %><a class="btn btn-white-t" href="$IMDBLink" role="button" target="_blank">IMDB</a><% end_if %>
                        </div>

                    </li>

                </ul>
            </div>
        </div><!-- End Revolution Slider -->
        <% end_with %>

</section>
<!-- End Header -->
<% end_if %>

 <!-- About Section -->
<section id="{$URLSegment}-section" class="section-padding">
    <!-- Head Title -->
    <div class="rk-head-title">
        <h1>$Title</h1>
        <!-- Title Devider -->
        <div class="rk-separator"></div>
    </div>
</section>
<!-- /.section -->

<% if Projects.Count > 1 %>
<div class="container-fluid col-no-p">

    <div id="portfolio2-grid-container" class="cbp-l-grid-masonry">

        <% loop Projects.Limit(999,1) %>
            <!-- Item -->
            <div class="cbp-item graphic identity">
                <a class="cbp-caption" data-title="Tiger" href="$Link">
                    <div class="cbp-caption-defaultWrap">
                        <img src="$Images.First.CroppedImage(800,450).URL" alt="Specify an alternate text for an image">
                    </div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <div class="cbp-l-caption-title">$Title</div>
                                <div class="cbp-l-caption-desc">$Genre</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <% end_loop %>

    </div>

</div>
<% end_if %>


<div class="container-fluid text-center p-30">
    <div data-sr="enter bottom over 1.3s and move 65px">
        <a class="btn btn-black" href="/" role="button">Return to Home</a>
    </div>
</div> <!-- /.container -->
