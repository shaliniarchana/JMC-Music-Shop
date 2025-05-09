
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Joy Music Corner</title>
        <link rel="stylesheet" href="home.css">
        <!-- Font Awesome CDN for Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script defer src="script.js"></script>
    </head>
    
<body>
<?php include("./views/includes/header.php") ?>
   
    <style>

/* Contact Us Section */
.contact-us {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
     /* Replace with your background image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 40px;
}

.form-container {
    position: relative;
    background: rgba(255, 255, 255, 0.5); /* Transparent white layer to make text more readable */
    border-radius: 10px;
    padding: 30px;
    width: 200%;
    max-width: 600px; /* Slightly increased width for message box flexibility */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;

    /* Create a blurred background effect */
    
    background-size: cover;
    background-position: center;
    backdrop-filter: blur(200px); /* Blurs the background */
}
.logo-container img {
    margin-bottom: 20px;
    max-width: 150px;
}

.form-container h2 {
    margin-bottom: 10px;
    color: #333;
}

.form-container p {
    margin-bottom: 20px;
    font-size: 16px;
    color: #555;
}

/* Form Fields */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #444;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 16px;
    resize: vertical;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #ff6f61;
}

.btn-submit {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background: #ff6f61;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn-submit:hover {
    background: #ff4a3d;
}

/* Terms and Conditions */
.terms-conditions {
    background: rgba(255, 255, 255, 0.5);
    text-align: center;
    padding: 30px;
    margin-top: 20px;
}

.terms-conditions h3 {
    font-size: 24px;
    margin-bottom: 15px;
    color: #333;
}

.terms-conditions p {
    font-size: 14px;
    margin-bottom: 10px;
    color: #666;
}

.terms-conditions a {
    color: #ff6f61;
    text-decoration: none;
}

.terms-conditions a:hover {
    text-decoration: underline;
}
    </style>
<script>
    document.getElementById("contact-form").addEventListener("submit", function (event) {
    event.preventDefault();
    alert("Thank you for reaching out! We will respond to your message soon.");
});

</script>



    <section class="contact-us">
        <div class="form-container">
            <div class="logo-container">
                <img src="images/JOY (1).png" alt="Joy Music Corner Logo">
            </div>
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Please fill out the form below to send your queries or feedback.</p>
            <form id="contact-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Full Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email Address" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Type your query or feedback..." required></textarea>
                </div>
                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </div>
    </section>

    <section class="terms-conditions">
        <h3>Terms and Conditions</h3>
        <p>By using the Joy Music Corner services, you agree to adhere to our guidelines and respect our policies. </p>
        <p>All customer inquiries will be addressed within 24-48 hours of submission.</p>
        <p>Please ensure your provided details are accurate to avoid delays in communication. For more information, visit our <a href="#">Terms and Policies</a> page.</p>
        <p>&copy; 2025 Joy Music Corner. All rights reserved.</p>
    </section>







































    

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-col">
                    <h4><i class="fas fa-user-circle"></i> My Account</h4>
                    <ul>
                        <li><a href="account.php?type=acc"><i class="fas fa-cogs"></i> Edit Account</a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> View Cart</a></li>
                        <li><a href="account.php?type=addr"><i class="fas fa-map-marker-alt"></i> Edit Address</a></li>
                        <li><a href="account.php"><i class="fas fa-box"></i> Track Order</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4><i class="fas fa-link"></i> Quick Links</h4>
                    <ul>
                        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="private_policy.php"><i class="fas fa-shield-alt"></i> Privacy Policy</a></li>
                        <li><a href="products.php"><i class="fas fa-guitar"></i> Products</a></li>
                        <li><a href="index.php#contact"><i class="fas fa-phone-alt"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4><i class="fas fa-share-alt"></i> Follow Us</h4>
                    <div class="social-links">
                        <a href="https://github.com/jmc-brand"><i class="fab fa-github"></i> GitHub</a>
                        <a href="https://t.me/jmc_support"><i class="fab fa-telegram"></i> Telegram</a>
                        <a href="https://facebook.com/jmc-brand"><i class="fab fa-facebook"></i> Facebook</a>
                        <a href="https://instagram.com/jmc-brand"><i class="fab fa-instagram"></i> Instagram</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-row">
                <div class="footer-col">
                    <h4><i class="fas fa-info-circle"></i> Company Info</h4>
                    <ul>
                        <li><a href="aboutus.html"><i class="fas fa-building"></i> About Us</a></li>
                        <li><a href="careers.html"><i class="fas fa-briefcase"></i> Careers</a></li>
                        <li><a href="terms_of_service.html"><i class="fas fa-file-alt"></i> Terms of Service</a></li>
                        <li><a href="faq.html"><i class="fas fa-question-circle"></i> FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4><i class="fas fa-clock"></i> Opening Hours</h4>
                    <ul>
                        <li><span>Mon - Fri:</span> 9:00 AM - 8:00 PM</li>
                        <li><span>Sat - Sun:</span> 10:00 AM - 9:00 PM</li>
                    </ul>
                </div>
            </div>
    
            <h5 align="center">
                Copyright © 2025 Joy Music Corner. All Rights Reserved.
            </h5>
        </div>
    </footer>
    

</body>
</html>
