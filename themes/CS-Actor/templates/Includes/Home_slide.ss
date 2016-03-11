<!-- SLIDE NR.1  -->
<li data-transition="fade" data-slotamount="5" data-masterspeed="700" >

    <img src="$Image.FocusFill(1422,800).URL"  alt="Slider Image $Pos"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

    <div class="container align-bottom text-center">
        <!-- End Hero Content -->
        <% with SiteConfig %>

            <% if CustomHtml %>
                $CustomHtml
            <% else %>
                <!-- Title -->
                <h1 class="m-b--0">
                    $SiteConfig.Title
                </h1>

                <% if Unions %>
                    <h3 class="m-t-10 m-b-30"><b>$Unions</b></h3>
                <% end_if %>

                 <% if ActorsAccessURL %>
                    <a class="btn btn-white" href="$ActorsAccessURL" role="button" target="_blank">Actor's Access</a>
                <% end_if %>
                <% if Resume %>
                    <a class="btn btn-white-t" href="$Resume.Link" role="button">Download Resume</a>
                <% end_if %>
                <% if ImdbURL %>
                    <a class="btn btn-white btn-right" href="$ImdbURL" role="button" target="_blank">IMDB Profile</a>
                <% end_if %>
            <% end_if %>
        <% end_with %>

        <% if Sections %>
            <!-- Scroll Down -->
            <p class="m-t-10">
                <a href="$Sections.First.Link" class="inline-block absabs-b">
                  <i class="material-icons md-36">keyboard_arrow_down</i>
                </a>
            </p>
        <% end_if %>
    </div>
</li>
