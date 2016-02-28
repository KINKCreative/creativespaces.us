<% if Slider.Count==0 %>
<!-- Project Single Header -->
<div class="jumbotron page-header m-0" <% if Image %>style="background-image: url($Image.CroppedImage(1422,800).URL);"<% end_if %>>
    <div class="container">
        <div class="row">
            <!-- Title and Description -->
            <div class="elements-title text-center p-l-120 p-r-120 p-n-xs">
                <h1>$Title</h1>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>
<!-- End Project Single Header -->
<% end_if %>

<section id="content-section" class="section-padding">

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-push-2">

                <h1>$Title</h1>
                <p>$Content</p>
                $Form

                <% loop Videos %>
                    <h3 class="m-t-15">$Title</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        $EmbeddedObject.EmbedHTML.RAW
                    </div>
                <% end_loop %>

            </div>
        </div>

    </div>

</section>

<% include Gallery %>

<div class="container-fluid text-center p-30">
    <div data-sr="enter bottom over 1.3s and move 65px">
        <a class="btn btn-black" href="/" role="button">Return to Home</a>
    </div>
</div> <!-- /.container -->
