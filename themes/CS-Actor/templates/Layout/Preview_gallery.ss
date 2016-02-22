<% if Images %>
<div class="container-fluid gallery-grid col-no-p">

    <div class="row no-gutter">

        <% loop PreviewImages.Limit(8) %>
            <!-- Item -->
            <div class="col-xs-6 col-md-3 gallery-item">
                <a href="$Top.URLSegment">
                    <%-- <div class="cbp-caption-defaultWrap"> --%>
                        <img src="$FocusFill(600,600).URL" alt="Image {$ID}" class="img-responsive">
                    <%-- </div> --%>
                    <%-- <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <div class="cbp-l-caption-title">$Title</div>
                                <div class="cbp-l-caption-desc">$Genre</div>
                            </div>
                        </div>
                    </div> --%>
                </a>
            </div>
        <% end_loop %>

    </div>

</div> <!-- /.container-fluid -->
<% end_if %>
