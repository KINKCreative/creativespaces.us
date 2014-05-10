<% if Sections %>
	<% loop Sections %>
		<section class="pageSection $ExtraClass <% if Image %>has-bg<% end_if %>" <% if Image %>style="background-image: url($Image.SetWidth(1024).URL)"<% end_if %> >
			<div class="row">
				<div class="large-12 columns">
					<% if Title %><h1>$Title</h1><% end_if %>
					<% if Content %><p>$Content</p><% end_if %>
					<% if DisplayPage %>

					<% end_if %>
				</div>
			</div>
		</section>
	<% end_loop %>
<% end_if %>