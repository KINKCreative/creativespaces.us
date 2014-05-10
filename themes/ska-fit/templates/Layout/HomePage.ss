<section class="pageSection services">
<dl class="tabs" data-tab>
<dd class="active"><a href="#panel2-1">Tab 1</a></dd>
	<dd><a href="#panel2-2">Tab 2</a></dd>
	<dd><a href="#panel2-3">Tab 3</a></dd>
	<dd><a href="#panel2-4">Tab 4</a></dd>
</dl>
<div class="tabs-content">
	<div class="content active" id="panel2-1">
	<p>First panel content goes here...</p>
	</div>
	<div class="content" id="panel2-2">
	<p>Second panel content goes here...</p>
	</div>
	<div class="content" id="panel2-3">
	<p>Third panel content goes here...</p>
	</div>
	<div class="content" id="panel2-4">
	<p>Fourth panel content goes here...</p>
	</div>
</div>
</section>

<div class="services">
	<div class="row">
		<% control Page(services)
	</div>
</div>

<% if HideMainContent==0 %>
<div class="main typography" role="main">
	<div class="row">

		<div class="<% if $Children || $Parent %>large-9 large-push-3<% else %>large-12<% end_if %> columns">
			<article>
				<h2>$Title</h2>
				$Content
				$Form
			</article>
		</div>
		<% if $Children || $Parent %><%--Determine if Side Nav should be rendered, you can change this logic--%>
		<div class="large-3 large-pull-9 columns">
			<div class="panel">
				<% include SideNav %>
			</div>
		</div>
		<% end_if %>

	</div>
</div>
<% end_if %>