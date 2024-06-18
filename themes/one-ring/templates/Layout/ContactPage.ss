<% include Banner %>

<div class="container my-5 contact-page">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <% if $ContactForm %>
                <div class="contact-form p-4">
                    <h2 class="text-center mb-4">Contact Us</h2>
                    $ContactForm
                </div>
            <% else %>
                <div class="alert alert-warning text-center">
                    Form is not available.
                </div>
            <% end_if %>
        </div>
    </div>
</div>

<style>
    .contact-page {
        margin-top: 50px; /* Space between the header and the form */
        margin-bottom: 50px; /* Space between the form and the footer */
    }
    .contact-form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #e3e3e3;
    }
    .contact-form h2 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        color: #333;
    }
    .contact-form input[type="text"],
    .contact-form input[type="email"],
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }
    .contact-form input[type="text"]:focus,
    .contact-form input[type="email"]:focus,
    .contact-form textarea:focus {
        border-color: #007bff;
    }
    .contact-form input[type="submit"] {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .contact-form input[type="submit"]:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }
    .alert {
        margin-top: 20px;
    }
</style>
