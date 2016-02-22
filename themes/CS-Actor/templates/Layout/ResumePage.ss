<section id="content-section" class="section-padding">

    <div class="container">

        <div class="row">
            <div class="col-sm-12">

                <% if SiteConfig.Resume %>
                    <div data-sr="enter bottom over 1.3s and move 65px" class="pull-right m-t-15">
                        <a class="btn btn-black btn-tiny" href="$Resume.Link" role="button">Download Resume</a>
                    </div>
                <% end_if %>
                <h1>$Title</h1>
                <p>$Content</p>

                <% if Image %>
                    <img src="$Image.SetWidth(1200).URL" class="img-responsive" />
                <% end_if %>

            </div>

        </div>

    </div>

</section>

<div class="container-fluid text-center p-30">
    <div data-sr="enter bottom over 1.3s and move 65px">
        <a class="btn btn-black" href="/" role="button">Return to Home</a>
    </div>
</div> <!-- /.container -->
