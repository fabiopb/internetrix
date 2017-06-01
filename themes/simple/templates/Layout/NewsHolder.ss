<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">  
    <article>
        <h1>$Title</h1>
        $Extract
        <div class="content">$Extract</div>
    </article>
    
    <% loop $Children %>
        <% include NewsTeaser %>
    <% end_loop %>

        $Form
        
</div>