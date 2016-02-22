
<% include Images %>

<div class="row layout">

	<div class="large-9 large-centered columns">
		<h1>$Title</h1>
		<% if Content %><div class="maincontent panel">
			<div class="textcontent">$Content</div>
		</div>
		<% end_if %>
			<% if Blogroll %>
			<% loop Blogroll %>
				<div class="article">
					<a href="$Link">
					<% if VideoEmbed %><div class="flex-video widescreen">$VideoEmbed.RAW</div><% else %>
						<% if FirstImage %><center>$FirstImage.SetWidth(800)</center><% end_if %>
					<% end_if %>
					<div class="details">
						<h3>$Title</h3>
						<% if Content %><p class="summary">$Content.Summary(30)</p><% end_if %>
						<% include AddThisShare %>
					</div>
					</a>
				</div>
			<% end_loop %>
			
			<% if Blogroll.MoreThanOnePage %> 
				<ul class="pagination">
					<% if Blogroll.PrevLink %> 
				  		<li class="arrow"><a href="$Visuals.PrevLink">&laquo;</a></li>
				  	<% else %>
				  		<li class="arrow unavailable"><a href="">&laquo;</a></li>
				  	<% end_if %>
				  	
				  	<% with Blogroll.PaginationSummary(9) %>
				  		<% if CurrentBool %>
				 			<li class="current round"><a href="#">$PageNum</a></li>
				 		<% else %>
				 			<% if Link %>
				 				<li><a href="$Link">$PageNum</a></li>
				 			<% else %>
				 				<li class="unavailable"><a href="">&hellip;</a></li>
				 			<% end_if %>
				 		<% end_if %>
				 	<% end_with %>
				 	
				 	<% if Blogroll.NextLink %> 
				 		<li class="arrow"><a href="$Visuals.NextLink">&raquo;</a></li>
				 	<% else %>
				 		<li class="arrow unavailable"><a href="">&raquo;</a></li>
				 	<% end_if %>
				 </ul>
			<% end_if %>
			<% end_if %>
	</div>
</div>

<% include SocialBlock %>