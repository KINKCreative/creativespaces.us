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

<% if Content %>
<section id="content-section" class="section-padding">

    <div class="container">

        <div class="row">
            <div class="col-sm-6">

                <h1>$Title</h1>
                <p>$Content</p>
                $Form

            </div>
            <div class="col-sm-6">
                <img class="img-responsive" src="$Image.SetWidth(800).URL" alt="Image-$Image.ID" />
            </div>

        </div>

    </div>

</section>
<% end_if %>

<% include Gallery %>

<div class="container-fluid text-center p-30">
    <div data-sr="enter bottom over 1.3s and move 65px">
        <a class="btn btn-black" href="/" role="button">Return to Home</a>
    </div>
</div> <!-- /.container -->
