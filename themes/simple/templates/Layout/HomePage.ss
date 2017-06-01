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
<div id="BrowserPoll" style="width: 25%;">
    <h2>Browser Poll</h2>
        <% if $BrowserPollForm %>
            $BrowserPollForm
        <% else %>
        <ul>
            <% loop $BrowserPollResults %>
            <li>
                <div class="browser">$Browser: $Percentage%</div>
                <div class="bar" style="width:$Percentage%">&nbsp;</div>
            </li>
            <% end_loop %>
        </ul>
        <% end_if %>
</div>
<div class="Content">