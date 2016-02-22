<div class="main typography" role="main">
	<div class="row">

		<div class="large-12 columns">
			<article>
				<h2>$Title</h2>
				$Content
				$Form
				<% include Images %>

				<% loop QuoteItems %>
					<div class="text-center">
						<blockquote>
							$QuoteText
						</blockquote>
						<% if Link %><a href="$Link" target="_blank"><% end_if %>
						<small>$Name</small>
						<% if Link %></a><% end_if %>
					</div>
				<% end_loop %>
			</article>
		</div>

	</div>
</div>