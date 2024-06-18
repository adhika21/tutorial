<% with $PopularRegionsPage %>
    <h1>Popular Regions</h1>
    <% loop $PopularRegions %>
        <div class="region">
            <h2><a href="$Link">$Title</a></h2>
            <p>$Content</p>
            <p>Views: $ViewCount</p>
        </div>
    <% end_loop %>
<% end_with %>
