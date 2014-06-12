<% if Images %>
<% if ImageCount==1 %>
	<img src="$Images.First.SetWidth(1000).URL" alt="<% if Caption %>$Caption<% else %>Image-$Pos<% end_if %>" />
<% else %>
	<div class="slideshow-wrapper">
		<ul data-orbit data-options="pause_on_hover:true; resume_on_mouseout: true; slide_number:false; animation:fade; animation_speed: 1000;">
			<% loop Images %>
			<li>
				<% if Link %><a href="$Link"><% end_if %>

					<!-- < % if Portrait % > -->
						<img src="$Image.GreyPaddedImage(800,450).URL" alt="<% if Caption %>$Caption<% else %>Image-$Pos<% end_if %>" data-interchange="[$Image.GreyPaddedImage(800,450).URL, (default)], [$Image.GreyPaddedImage(1000,562).URL, (small)], [$Image.GreyPaddedImage(1200,675).URL, (medium)]"/>
					<!-- < % else % >
						<img src="$Image.CroppedFocusedImage(800,450).URL" alt="<% if Caption %>$Caption<% else %>Image-$Pos<% end_if %>" data-interchange="[$Image.CroppedFocusedImage(800,450).URL, (default)], [$Image.CroppedFocusedImage(1000,562).URL, (small)], [$Image.CroppedFocusedImage(1200,675).URL, (medium)]"/>
					< % end_if % > -->
				
				<% if Link %></a><% end_if %>
				<% if Caption %><div class="orbit-caption">$Caption</div><% end_if %>
		  	</li>
		  	<% end_loop %>
		</ul>
	</div>
<% end_if %>
<% end_if %>