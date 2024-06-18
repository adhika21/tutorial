<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your CSS and JS files here -->
</head>
<body>
    <header>
        <% include Banner %>
    </header>
    <main class="content">
        <div class="container">
            <div class="row">
                <div class="main col-sm-8">
                    $Content
                    $Form
                </div>
                <div class="sidebar gray col-sm-4">
                    <% if $Menu(2) %>
                    <h2 class="section-title">In this section</h2>
                    <ul class="categories subnav">
                        <% loop $Menu(2) %>
                            <li><a class="$LinkingMode" href="$Link">$MenuTitle</a></li>
                        <% end_loop %>
                    </ul>
                    <% end_if %>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- Your footer content -->
    </footer>
</body>
</html>
