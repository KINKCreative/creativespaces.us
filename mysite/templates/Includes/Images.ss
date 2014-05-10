<% if Images %>
<% if ImageCount==1 %>
	<img src="$Images.First.SetWidth(1000).URL" alt="<% if Caption %>$Caption<% else %>Image-$Pos<% end_if %>" />
<% else %>
	<div class="slideshow-wrapper leading">
		<ul data-orbit data-options="pause_on_hover:true; resume_on_mouseout:true; slide_number:false;bullets:false; animation:'fade'; animation_speed: 1000;">
			<% loop Images %>
			<li>
				<% if Link %><a href="$Link"><% end_if %>
				<img src="$SmallImage.URL" alt="<% if Caption %>$Caption<% else %>Image-$Pos<% end_if %>" data-interchange="[$SmallImage.URL, (default)], [$MediumImage.URL, (small)], [$LargeImage.URL, (medium)],"/>
				<% if Caption %><div class="orbit-caption">$Caption</div><% end_if %>
				<% if Link %></a><% end_if %>
		  	</li>
		  	<% end_loop %>
		</ul>
	</div>
<% end_if %>
<% end_if %>