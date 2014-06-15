<section class="pageSection $ClassName.ATT" id="$URLSegment">
	<div class="main typography">
		<div class="row">
			<div class="large-12 columns">
				<div class="imagewrap">
						<img src="$ThemeDir/images/Pawana-Logo-White-Large.png" alt="Pawana Camp" class="mainlogo" />
				</div>
				<div class="maincontent">$Content</div>
			</div>
		</div>
	</div>
</section>

<% loop Menu(1) %>
	<% if URLSegment!="home" %>
	<section class="pageSection $ClassName.ATT" id="$URLSegment">
			$IncludeLayout
	</section>
	<% end_if %>
<% end_loop %>
