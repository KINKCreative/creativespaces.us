<% include Images %>
<section class="main typography $ClassName.ATT" id="$URLSegment">
	<div class="row">
		<div class="large-12 columns">
			<div class="imagewrap"><img src="$ThemeDir/images/Pawana-HeaderImage.png" alt="Pawana Camp" /></div>
				<div class="maincontent">$Content</div>
		</div>
	</div>
</section>

<% loop Menu(1) %>
	<% if URLSegment!="home" %>
	<section class="main typography $ClassName.ATT $URLSegment">
			$IncludeLayout
	</section>
	<% end_if %>
<% end_loop %>
