<% with Item %>

<!-- Project Single Header -->
<div class="jumbotron project-single-header" style="background-image: url($Image.CroppedImage(1422,800).URL);">
    <div class="jumbotron-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="elements-title text-center p-l-120 p-r-120 p-n-xs">
                <h2 class="uppercase strong m-b-10">$Title</h2>
                <p class="m-b-20">$Genre / $Format</p>
                <% if IMDBLink %><a href="$IMDBLink" class="btn btn-white-t">IMDB Page</a><% end_if %>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>
<!-- End Project Single Header -->

<div class="container project-single-container">

    <%-- <div class="project-single-info">
        <div class="col-sm-6">
            <h2>What we did</h2>
            <p>Proin facilisis varius nunc. Curabitur eros risus, ultrices et dui ut, luctus accumsan nibh. Fusce convallis sapien placerat tellus suscipit vehicula. Ea mei nostrum imperdiet deterruisset, mei ludus efficiendi ei. Sea summo mazim ex, ea errem eleifend definitionem vim. Detracto erroribus et mea.</p>
        </div>

        <div class="col-sm-6">
            <h2>About Project</h2>
            <p>Btur eros risus, ultrices et dui ut, luctus accumsan nibh. Fusce convallis sapien placerat tellus suscipit vehicula. Ea mei nostrum imperdiet deterruisset, mei ludus efficiendi ei. Sea summo mazim ex, ea errem eleifend definitionem vim. Detracto erroribus et mea proin facilisis varius nunc curabi.</p>
        </div>
    </div>

    <div class="clearfix"></div> --%>

    <% if Clips %>
    <div class="project-single-video">
        <div class="col-sm-12">
            <% loop Clips %>
            <div class="embed-responsive embed-responsive-16by9 m-b-20">
                $Video.EmbedHTML.RAW
            </div>
            <% end_loop %>
        </div>
    </div>
    <% end_if %>

    <div class="clearfix"></div>

    <!-- Project Single Details -->
    <div class="project-single-details">

        <!-- Left Column -->
        <div class="col-sm-4">
            <h2>Project Details</h2>
            <ul class="list-group project-list-group">
                <li class="list-group-item project-list-group-item">
                    <span class="badge">$Genre</span>
                    Genre:
                </li>
                <li class="list-group-item project-list-group-item">
                    <span class="badge">$Format</span>
                    Format:
                </li>
                <li class="list-group-item project-list-group-item">
                    <span class="badge">$Director</span>
                    Date:
                </li>
                <li class="list-group-item project-list-group-item">
                    <span class="badge">$ProductionCompany</span>
                    Production:
                </li>
            </ul>
        </div>

        <!-- Right Column -->
        <div class="col-sm-8">
            <p>$Description</p>
        </div>
    </div>
</div>

<p class="p-l-25 p-r-25 p-b-15 m-t-0 text-center">
    <a href="$URLPrefix" class="btn btn-black">Back to Projects</a>
</p>

<% if Images %>
<section class="section-bg-color project-single-details">
    <div class="container p-30">
        <div class="row">
            <h2>Project Gallery</h2>
        </div>
    </div>

    <% include Gallery %>
</section>
<% end_if %>

<% if sBTSImages %>
<section class="section-bg-color project-single-details">
    <div class="container p-30">
        <div class="row">
            <h2>Behind the Scenes</h2>
        </div>
    </div>

    <div class="container-fluid col-no-p m-t--5">

        <div class="cbp-l-grid-masonry">

            <% loop BTSImages %>
            <div class="cbp-item graphic identity">
                <a class="cbp-lightbox cpb-caption" data-title="Image {$ID}" href="$Fit(1000,1000).URL">
                    <div class="cbp-caption-defaultWrap">
                        <img src="$FocusFill(600,600).URL" alt="Specify an alternate text for an image">
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

</section>
<% end_if %>

<% end_with %>

