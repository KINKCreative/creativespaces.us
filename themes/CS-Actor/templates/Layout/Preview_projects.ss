 <!-- About Section -->
<section id="{$URLSegment}-section" class="section-padding section-bg-color">
    <!-- Head Title -->
    <div class="rk-head-title">
        <h1>$Title</h1>
        <!-- Title Devider -->
        <div class="rk-separator"></div>
    </div>

    <% if Projects %>
    <div class="container-fluid col-no-p">

        <div id="portfolio2-grid-container" class="cbp-l-grid-masonry">

            <% loop Projects.Limit(3) %>
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

    <div class="container">
        <div class="about-content text-center">
            <!-- Button -->
            <div data-sr="enter bottom over 1.3s and move 65px">
                <a class="btn btn-black m-t-15" href="$URLSegment" role="button">See all $Title</a>
            </div>
        </div>
    </div>

</section>
<!-- /.section -->
