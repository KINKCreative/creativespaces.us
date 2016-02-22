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

    <li class="visible-xs m-t-80">
        <a href="#" data-toggle="collapse" data-target=".navbar-main-collapse">
            <i class="material-icons md-24">close</i>
        </a>
    </li>

</ul>
