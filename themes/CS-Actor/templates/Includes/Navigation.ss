<ul class="nav navbar-nav navbar-nav-white">
    <% loop $Menu(1) %>
        <% if $Children %>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">$MenuTitle <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <% loop Children %>
                        <li class="$LinkingMode">
                            <a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
                        </li>
                    <% end_loop %>
                <ul>
            </li>
        <% else %>
            <li class="$LinkingMode">
                <a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
            </li>
        <% end_if %>

    <% end_loop %>

    <% with $SiteConfig %>

        <% if FacebookURL %>
          <li class="social"><a href="$FacebookURL" target="_blank"><i class="fi-social-facebook"></i></a></li>
        <% end_if %>
        <% if TwitterURL %>
          <li class="social"><a href="$TwitterURL"  target="_blank"><i class="fi-social-twitter"></i></a></li>
        <% end_if %>
        <% if InstagramURL %>
          <li class="social"><a href="$InstagramURL" target="_blank"><i class="fi-social-instagram"></i></a></li>
        <% end_if %>

        <% if ActorsAccessURL || Resume || ImdbURL || ActorsGreenRoomURL %>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <% if ImdbURL %><li><a href="$ImdbURL" role="button" target="_blank">IMDB Profile</a></li><% end_if %>
                <% if ActorsGreenRoomURL %><li><a href="$ActorsGreenRoomURL" role="button">AGR Member Profile</a></li><% end_if %>
                <% if ActorsAccessURL %>
                    <li><a href="$ActorsAccessURL" role="button" target="_blank">Actor's Access</a></li><% end_if %>
                <% if Resume %><li><a href="$Resume.Link" role="button">Download Resume</a></li><% end_if %>
              </ul>
            </li>
        <% end_if %>

    <% end_with %>

    <li class="visible-xs m-t-80">
        <a href="#" data-toggle="collapse" data-target=".navbar-main-collapse">
            <i class="material-icons md-24">close</i>
        </a>
    </li>

</ul>
