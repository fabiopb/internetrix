<div id="Banner">
  <img src="http://www.silverstripe.org/assets/SilverStripe-200.png" alt="Homepage image" />
</div>

<div style="float: left; width: 65%;">
<h2>Latest off the press</h2>
	<% loop $LatestNews %>
	    <% include NewsTeaser %>
	<% end_loop %>
</div>

<% include SideBar %>
<div id="BrowserPoll">
    <h2>Browser Poll</h2>
    $BrowserPollForm
</div>
<div class="Content">