<%-- DetailProperty.ss --%>
<% include Banner %>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="main col-sm-12">
                <div class="property-details card mb-4 shadow-sm">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="image">
                                $Property.PrimaryPhoto.CroppedImage(600,400)
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h1 class="card-title">$Property.Title</h1>
                                <div class="price text-success mb-3">
                                    <span>$Property.FormattedHarga</span> <span class="text-muted"></span>
                                </div>
                                <div class="info mb-3">
                                    <h3 class="h5">
                                        <small class="text-muted">$Property.Region.Title</small>
                                        <br>
                                        <small class="text-muted">Available $Property.AvailableStart.Nice - $Property.AvailableEnd.Nice</small>
                                    </h3>
                                    <p>$Property.Description</p>
                                    <p><strong>Alamat:</strong> $Property.Alamat</p>
                                    <p><strong>Lokasi:</strong> $Property.Lokasi</p>
                                    <p><strong>Tipe:</strong> $Property.PropertyType.Title</p>
                                    <p><strong>Grup:</strong> $Property.Group</p>
                                    <p><strong>Fasilitas:</strong> $Property.FacilitiesList</p>
                                    <p><strong>Transaksi:</strong> $Property.Transaksi</p>
                                    <p><strong>Luas Bangunan:</strong> $Property.LuasBangunan</p>
                                    <p><strong>Luas Tanah:</strong> $Property.LuasTanah</p>
                                    <p><strong>Listrik:</strong> $Property.Listrik</p>
                                    <p><strong>Sertifikat:</strong> $Property.Sertifikat</p>
									<p><strong>Kamar Tidur:</strong> $Property.Bedrooms</p>
									<p><strong>Kamar Mandi:</strong> $Property.Bathrooms</p>
                                    <p><strong>Garasi:</strong> <% if $Property.Garasi %>Yes<% else %>No<% end_if %></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="agent-details card-footer bg-light">
                        <h2 class="h4">Agent Details</h2>
                        <% if $Property.Agent %>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="agent-photo">
                                        $Property.Agent.PrimaryPhoto.CroppedImage(150,150)
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <p><strong>Nama:</strong> $Property.Agent.Name</p>
                                    <p><strong>Alamat:</strong> $Property.Agent.Alamat</p>
                                    <p><strong>Telp:</strong> $Property.Agent.Telp</p>
                                    <p><strong>About:</strong> $Property.Agent.About</p>
                                    <a href="https://wa.me/{$Property.Agent.Telp}?text=Hello%20I%20am%20interested%20in%20your%20property" target="_blank" class="btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i> Contact via WhatsApp
                                    </a>
                                </div>
                            </div>
                        <% else %>
                            <p>No agent details available.</p>
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
    .property-details {
        margin-top: 20px;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .property-details .image {
        border: 5px solid #ffcc00;
        border-radius: 10px;
        overflow: hidden;
        margin: 15px;
    }

    .property-details .image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .property-details .card-body {
        padding: 20px;
    }

    .property-details .price {
        font-size: 24px;
        font-weight: bold;
    }

    .property-details .info {
        margin-bottom: 15px;
    }

    .property-details .info h3 {
        margin-bottom: 10px;
    }

    .property-details .info small {
        font-size: 12px;
        color: #888;
        margin-right: 10px;
    }

    .property-details .info p {
        line-height: 1.5;
    }

    .amenities {
        padding: 0;
        margin: 0;
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

    .agent-details {
        padding: 20px;
        background-color: #f9f9f9;
    }

    .agent-photo img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 50%;
    }

    .btn-whatsapp {
        background-color: #25d366;
        border-color: #25d366;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        margin-top: 10px;
        font-size: 16px;
    }

    .btn-whatsapp:hover {
        background-color: #1ebe5a;
        border-color: #1ebe5a;
        color: white;
    }

    .btn-whatsapp i {
        margin-right: 10px;
    }
</style>
