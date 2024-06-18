<% include Banner %>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-form-container">
                    $AgentSearchForm
                </div>
            </div>
        </div>
        <div class="row results-container">
            <% loop $Results %>
                <div class="col-md-4 mb-4">
                    <div class="agent-card">
                        <a href="$Link" class="agent-link">
                            <div class="agent-image">
                                <img src="$PrimaryPhoto.URL" alt="$Name">
                            </div>
                            <div class="agent-info">
                                <h3>$Name</h3>
                                <p><strong>Alamat:</strong> $Alamat</p>
                                <p><strong>Telp:</strong> $Telp</p>
                                <p><strong>About:</strong> $About</p>
                            </div>
                        </a>
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>

<style>
    .search-form-container {
        max-width: 400px; /* Limit the width of the search form */
        margin: 0; /* Reset margin */
        padding: 0; /* Reset padding */
    }

    .search-form-container form {
        display: flex;
        flex-direction: column;
        gap: 10px; /* Space between form elements */
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .search-form-container input,
    .search-form-container select,
    .search-form-container button {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .results-container {
        margin-top: 20px; /* Space between the search form and search results */
    }

    .search-form {
        margin-bottom: 10px;
    }

    .search-form input[type="text"] {
        font-size: 12px;
        padding: 5px;
        width: 150px;
    }

    .search-form input[type="submit"],
    .search-form button {
        font-size: 12px;
        padding: 5px 10px;
        width: 150px; /* Ensure button matches input width */
    }

    .agent-card {
        width: 100%;
        background-color: #fff;
        border: 1px solid #eee;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        margin-bottom: 20px;
    }

    .agent-card:hover {
        transform: translateY(-5px);
    }

    .agent-link {
        text-decoration: none;
        color: inherit;
    }

    .agent-image img {
        width: 100%;
        height: auto;
        border-radius: 10px 10px 0 0;
    }

    .agent-info {
        padding: 20px;
    }

    .agent-info h3 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    .agent-info p {
        margin-bottom: 5px;
        font-size: 14px;
        color: #666;
    }

    .content {
        margin-top: 20px;
    }

    .container {
        margin-bottom: 20px;
    }
</style>
