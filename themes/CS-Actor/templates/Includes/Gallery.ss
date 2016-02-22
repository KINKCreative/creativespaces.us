<% if Images %>
<div class="container-fluid col-no-p m-t--5">

    <div id="portfolio2-grid-container" class="cbp-l-grid-masonry">

        <% loop Images %>
        <div class="cbp-item graphic identity">
            <a class="cbp-lightbox cpb-caption" data-title="Image {$Image.ID}" href="$Image.Fit(1000,1000).URL">
                <div class="cbp-caption-defaultWrap">
                    <img src="$Image.FocusFill(600,600).URL" alt="Specify an alternate text for an image">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <div class="cbp-l-caption-title">Four Things I Wanted To Do With You</div>
                            <div class="cbp-l-caption-desc">Comedy</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <% end_loop %>

    </div>

</div> <!-- /.container-fluid -->
<% end_if %>
