<% include Banner %>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="main col-sm-12">
                <div class="agent-details card mb-4 shadow-sm">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="image">
                                $Agent.PrimaryPhoto.CroppedImage(600,400)
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h1 class="card-title">$Agent.Name</h1>
                                <div class="info mb-3">
                                    <p><strong>Alamat:</strong> $Agent.Alamat</p>
                                    <p><strong>Telp:</strong> $Agent.Telp</p>
                                    <p><strong>About:</strong> $Agent.About</p>
                                </div>
                                <a href="https://wa.me/{$Agent.Telp}?text=Hello%20I%20am%20interested%20in%20your%20property" target="_blank" class="btn-whatsapp">
                                    <i class="fa fa-whatsapp"></i> Contact via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="agent-properties card-footer bg-light">
                        <h2 class="h4">Properties Owned by Agent</h2>
                        <% if $Properties.exists %>
                            <div class="row">
                                <% loop $Properties %>
                                    <div class="item col-md-4 mb-4">
                                        <div class="card shadow-sm">
                                            <div class="image">
                                                <a href="{$Link}" target="_blank">
                                                    <img src="$PrimaryPhoto.URL" alt="$Title" class="property-image">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="price text-success">
                                                    <span>Rp $Harga</span>
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
                        <% else %>
                            <p>No properties available.</p>
                        <% end_if %>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMK6MQ7MGAtWGoj3F3BIuCP3K3uNHmg8DdxI1g" crossorigin="anonymous">

<style>
    .agent-details .image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .card-body h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .info p {
        font-size: 16px;
    }

    .btn-whatsapp {
        display: inline-block;
        padding: 10px 15px;
        background-color: #25D366;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        margin-top: 20px;
    }

    .btn-whatsapp .fa-whatsapp {
        margin-right: 5px;
    }

    .agent-properties {
        margin-top: 20px;
    }

    .agent-properties .item {
        margin-bottom: 20px;
    }

    .agent-properties .card {
        border: 1px solid #eee;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .agent-properties .card:hover {
        transform: translateY(-5px);
    }

    .property-image {
        border: 5px solid #ffcc00;
        border-radius: 10px;
        width: 100%;
        height: auto;
        max-width: 300px;
        max-height: 300px;
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
</style>
