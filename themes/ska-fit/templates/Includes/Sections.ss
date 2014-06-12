<% if Sections %>
	<% loop Sections %>
		<section class="pageSection $ExtraClass <% if Image %>has-bg<% end_if %>" <% if Image %>style="background-image: url($Image.SetWidth(1600).URL)"<% end_if %> >
			<div class="row">
				<div class="large-12 columns">
					<% if Title %><h1>$Title</h1><% end_if %>
					<% if Content %><p>$Content</p><% end_if %>
					<% if DisplayPage %>
						<% with DisplayPage %>
							<ul class="large-block-grid-{$MaxColumns} blockgrid">
								<% loop Children %>
								<li>
									<% if Image %><img src="$Image.CroppedImage(600,337).URL" class="th" /><% end_if %>
									<% if Title %><h3>$Title</h3><% end_if %>
									<% if Content %><p>$Content.Summary(20)<% end_if %>
									<% if Link %><br/>
									<a href="$Link" title="View $Title.XML" class="button round">Read more</a>
									<% end_if %>
								</li>
								<% end_loop %>
							</div>
						<% end_with %>
					<% end_if %>
				</div>
			</div>
		</section>
	<% end_loop %>
<% end_if %>