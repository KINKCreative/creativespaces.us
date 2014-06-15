<div class="main typography" role="main">
  <div class="row">

    <div class="<% if $Children || $Parent %>large-9 large-push-3<% else %>large-12<% end_if %> columns">
      <article>
        <h2>$Title</h2>
        $Content
        $Form
        <% include Images %>

        <% if Profiles %>
        <% loop Profiles %>
          <div class="row profile">
            <% if Image %>
            <div class="medium-3 columns">
              <div class="th round"><img src="$Image.CroppedImage(400,400).URL" alt="$Title.ATT" /></div>
            </div>
            <% end_if %>
            <div class="<% if Image %>medium-9<% else %>medium-12<% end_if %>  columns">
                <h3>$Title<% if JobPosition %> <span class="label large radius secondary">$JobPosition</span><% end_if %></h3>
                <% include VideoEmbed %>
                
                <% if Text %><p>$Text</p><% end_if %>
                <%--
                  'Title' => 'Varchar(255)',
                  'JobPosition' => 'Varchar(125)',
                  'Text' => 'Text',
                  'VideoEmbed' => 'Text',
                  'Email' => 'Varchar(64)',
                  'Phone' => 'Varchar(20)',
                  'TwitterUsername' => 'Varchar(32)',
                  'InstagramUsername' => 'Varchar(32)',
                  'GooglePlus' => 'Varchar(255)',
                  'Facebook' => 'Varchar(255)',
                  'Website' => 'Varchar(255)'
                --%>
            </div>
          </div>
        <% end_loop %>
        <% end_if %>

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