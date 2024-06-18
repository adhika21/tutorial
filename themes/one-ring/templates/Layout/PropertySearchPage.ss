<% include Banner %>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="main col-sm-8">
                <div class="search-form-container">
                    $PropertySearchForm
                </div>
            </div>
        </div>
    </div>
</div>

<div class="search-results mt-4">
    <div class="container">
        <div class="row">
            <% loop $Results %>
            <div class="item col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="image">
                        <a href="{$Link}" target="_blank">
                            <img src="$PrimaryPhoto.URL" alt="$Title" class="property-image">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="price text-success">
                            <span>Rp $Harga</span><span class="text-muted"></span>
                        </div>
                        <div class="info">
                            <h3 class="card-title">
                                <a href="{$Link}/$URLSegment" class="text-dark" target="_blank">$Title</a>
                            </h3>
                            <small class="text-muted d-block">$Region.Title</small>
                            <small class="text-muted d-block">Available $AvailableStart.Nice - $AvailableEnd.Nice</small>
                            <p class="card-text mt-2">$Description.LimitSentences(3)</p>
                            <ul class="amenities list-unstyled mt-3">
                                <li><i class="fa fa-bed"></i> $Bedrooms Bedrooms</li>
                                <li><i class="fa fa-bath"></i> $Bathrooms Bathrooms</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <% end_loop %>
        </div>
    </div>
</div>

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMK6MQ7MGAtWGoj3F3BIuCP3K3uNHmg8DdxI1g" crossorigin="anonymous">

<style>
    .content {
        /* Styles for the content */
    }

    .container {
        /* Styles for the container */
    }

    .row {
        /* Styles for the row */
    }

    .main {
        /* Styles for the main column */
    }

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

    .search-results {
        /* Styles for the search results */
        margin-top: 20px; /* Space between Search button and search results */
    }

    .item {
        /* Styles for the item */
    }

    .card {
        /* Styles for the card */
    }

    .card-body {
        /* Styles for the card body */
    }

    .price {
        font-size: 18px;
        font-weight: bold;
    }

    .info h3 {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .info small {
        font-size: 12px;
        color: #888;
    }

    .info p {
        margin-top: 10px;
        line-height: 1.5;
    }

    .amenities li {
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
    }

    .amenities li i {
        margin-right: 10px;
        color: #888;
    }

    .image {
        position: relative;
        overflow: hidden;
    }

    .property-image {
        border: 5px solid #ffcc00; /* Yellow border */
        border-radius: 10px;
        width: 100%;
        height: auto;
        max-width: 300px; /* Max width for the image */
        max-height: 300px; /* Max height for the image */
    }
</style>
