<% if Sections %>
	<% loop Sections %>
		<section class="pageSection $ExtraClass">
			<div class="row">
				<div class="large-12 columns">
					<% if Title %><h1>$Title</h1><% end_if %>
					<% if Content %><p>$Content</p><% end_if %>
				</div>
			</div>
		</section>
	<% end_loop %>
<% end_if %>