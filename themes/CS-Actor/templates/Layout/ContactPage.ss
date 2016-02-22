<% if Image %>
<!-- Project Single Header -->
<div class="jumbotron page-header m-0" <% if Image %>style="background-image: url($Image.CroppedImage(1422,800).URL); background-size: cover; background-position: center center;"<% end_if %>>
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
            <div class="col-md-6">

                <h1>$Title</h1>
                <p>$Content</p>

                <% with SiteConfig %>
                    <div class="m-t-20">
                        <% if Address %>
                            <h4>Address</h4>
                            <address style="line-height: 1.7;">
                              $Address
                            </address>
                            <hr />
                        <% end_if %>

                        <% if Phone %><abbr title="Phone Number">Phone:</abbr> $Phone<br><% end_if %>
                        <% if Email %><abbr title="Email Address">Email:</abbr> <a href="mailto:$Email">$Email</a><% end_if %>

                    </div>
                <% end_with %>
            </div>
            <div class="col-md-6">
                $ContactForm
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
