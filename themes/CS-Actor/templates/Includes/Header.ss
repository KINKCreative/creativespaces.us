<% if ClassName=="HomePage" || Slider %>
<!-- Header -->
<section id="header-section" class="m-t--100">

        <!-- Revolution Slider -->
        <div class="tp-banner-container">
            <div class="tp-banner-1">
                <ul>

                    <% if ClassName=="HomePage" %>
                        <% include Home_slide %>
                    <% end_if %>

                    <% if Images %>
                        <% loop Images %>

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

</section>
<!-- End Header -->
<% end_if %>


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
