<?php
session_start();
if (isset($_SESSION["success"])) {
    echo "<div id='successContainer'>
            <div class='successBox'>
                <dotlottie-player 
                    id='lottieAnimation'
                    src='https://lottie.host/39e2d42c-1cbc-4ab3-ac71-a28064ff260a/Ff2BIIUOlw.lottie'
                    background='transparent' 
                    speed='1' 
                    style='width: 80px; height: 80px; margin: 0 auto 20px;'
                    loop 
                    autoplay>
                </dotlottie-player>
                <p>".$_SESSION["success"]."</p>
            </div>
          </div>
          <script>
            setTimeout(() => {
                document.getElementById('lottieAnimation').stop(); // Stop Lottie after 1s
            }, 3000);

            setTimeout(() => {
                document.getElementById('successContainer').classList.add('fadeOut'); // Add fade-out effect
                setTimeout(() => {
                    document.getElementById('successContainer').style.display = 'none'; // Hide after fade-out
                }, 3000); // Extra 0.5s for smooth transition
            }, 3000);
          </script>";
    unset($_SESSION["success"]); // Clear session after displaying
}
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Joy Music Corner</title>

        <script src="https://lottie.host/39e2d42c-1cbc-4ab3-ac71-a28064ff260a/Ff2BIIUOlw.lottie"></script>
        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
        type="module"></script>


        <link rel="stylesheet" href="styles/tester.css">
        <link rel="stylesheet" href="styles/home.css">
        <!-- Font Awesome CDN for Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script defer src="script.js"></script>

        

    </head>
    
<body>


    
    <?php include("./views/includes/header.php") ?>

    <section class="home section" id="home">
        <div class="container">
            <div class="content">
                <h2>Welcome! to Joy Music Corner</h2>
                <p>Discover the rhythm of life with our premium music collection!</p>
            </div>
        </div>
    </section>

    <section class="slider-container">
        <div class="slider">
            <img class="slide" src="images/sl1.webp" alt="Music Slider 1">
            
            <img class="slide" src="images/sl2.png" alt="Music Slider 2">
            
            <img class="slide" src="images/sl6.png" alt="Music Slider 3">

            <img class="slide" src="images/sl4.jpg" alt="Music Slider 4">
            <img class="slide" src="images/22.png" alt="Music Slider 1">
            <img class="slide" src="images/sl3.png" alt="Music Slider 4">
            
            <img class="slide" src="images/sl7.jpg" alt="Music Slider 4">
            <img class="slide" src="images/25.png" alt="Music Slider 1">
        </div>
        <div class="slider-buttons">
            <button class="circle-btn" onclick="prevSlide()">❮</button>
            <button class="circle-btn" onclick="nextSlide()">❯</button>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');

        function showSlide(n) {
            slides.forEach(slide => slide.style.display = 'none');
            slides[currentSlide].style.display = 'block';
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 5000); // Change slide every 2 seconds
    </script>

    <section class="products section" id="products">
        <h2 class="heading">New Arrivals</h2>
        <div class="box-container">
            <div class="box">
                <img src="images/g4.jpg" alt="Guitar">
                <h3>Acoustic Guitar</h3>
                <p><b>High-quality acoustic guitar for music enthusiasts!</b></p>
                <p class="price">250,000 LKR</p>
                 <form action="add_to_cart.php" method="POST">
  <input type="hidden" name="product_id" value="123">
  <button type="submit">Add to Cart</button>
</form>

            </div>
            <div class="box">
                <img src="images/k3.png" alt="Keyboard">
                <h3>Electronic Keyboard</h3>
                <p><b>Compact and versatile keyboard with amazing sound!</b></p>
                <p class="price">180,000 LKR</p>
                 <form action="add_to_cart.php" method="POST">
  <input type="hidden" name="product_id" value="123">
  <button type="submit">Add to Cart</button>
</form>

            </div>
            <div class="box">
                <img src="images/w1.avif" alt="Headphones">
                <h3>Wireless Headphones</h3>
                <p><b>Experience immersive sound with our latest headphones!</b></p>
                <p class="price">8,000 LKR</p>
                 <form action="add_to_cart.php" method="POST">
  <input type="hidden" name="product_id" value="123">
  <button type="submit">Add to Cart</button>
</form>

            </div>
        </div>
    </section>




    <section class="services-section">
        <h2 class="heading">Services We Offer</h2>
        
       
      
        <div class="services-container">
      
          
          <!-- Example service boxes -->
          <div class="service-box" style="background-image: url('https://kaizenaire.com/wp-content/uploads/2024/01/Speaker-Repair-Service-Singapore-Get-Your-Speakers-Fixed-Today.jpg');">
            <div class="service-overlay">
              <h3>Instrument Repairing</h3>
              <p>We provide top-notch repairing services for all your musical instruments.</p>
            </div>
          </div>
          <div class="service-box" style="background-image: url('https://www.careersinmusic.com/wp-content/uploads/2014/11/music-store-salesperson.jpg');">
            <div class="service-overlay">
              <h3>Customer Services</h3>
              <p>Friendly and efficient customer service for all your needs.</p>
            </div>
          </div>
          <div class="service-box" style="background-image: url('https://www.retailnews.asia/wp-content/uploads/2019/03/eDelivery.jpg');">
            <div class="service-overlay">
              <h3>Door Delivery</h3>
              <p>Fast and reliable delivery service to your doorstep.</p>
            </div>
          </div>
          <div class="service-box" style="background-image: url('https://www.namm.org/sites/default/files/2024-10/introductiontothemusicproductsindustry_namm.jpg');">
            <div class="service-overlay">
              <h3>Import from Foreign</h3>
              <p>High-quality imported instruments delivered to your hands.</p>
            </div>
          </div>
      
        
      </section>


    <section class="about section" id="about">
        <div class="container">
            <h2 class="heading">About Us</h2>
            <div class="content">
                <p><b>Joy Music Corner brings you a curated selection of musical instruments and accessories.</b></p>
                <p><b>Our mission is to inspire creativity and enrich lives through the power of music.</b></p>

                <p>
                    Joy Music Corner is your one-stop destination for all things music. We specialize in offering a wide range of high-quality musical instruments, accessories, and services tailored to meet the needs of musicians at all levels. From budding enthusiasts to seasoned professionals, our curated selection caters to a variety of tastes and genres. 
                  </p>
                  <p>
                    Our mission is to inspire creativity and bring people closer to the universal language of music. Beyond selling instruments, we are deeply passionate about fostering a vibrant musical community. Whether you’re learning your first instrument, repairing a cherished one, or searching for the perfect gear, Joy Music Corner is here to provide expert guidance, reliable support, and a memorable experience that empowers you to achieve your musical dreams.
                  </p>
                  



            </div>
        </div>
    </section>
    <h2 class="heading" >Our Partners</h2>
    <section class="curved-logo-slider">
       
        <!-- Scrolling track for logos -->
        <div class="logo-slider-track">
            <img src="images/l1.webp" alt="Brand 1">
            <img src="images/l2.png" alt="Brand 2">
            <img src="images/l3.webp" alt="Brand 3">
            <img src="images/daraz.png" alt="Brand 3">
            <img src="images/l4.webp" alt="Brand 4">
            <img src="images/l5.webp" alt="Brand 5">
            <img src="images/l6.webp" alt="Brand 6">
            <img src="images/l7.png" alt="Brand 7">
            <img src="images/l8.webp" alt="Brand 8">
            <!-- Clone logos for seamless effect -->
            <img src="images/l9.png" alt="Brand 1 Clone">
            <img src="images/l10.webp" alt="Brand 2 Clone">
            <img src="images/l11.png" alt="Brand 3 Clone">
            <img src="images/l12.png" alt="Brand 4 Clone">
            <img src="images/l13.png" alt="Brand 4 Clone">
            <img src="images/l15.png" alt="Brand 4 Clone">
            <img src="images/l16.png" alt="Brand 4 Clone">
            <img src="images/l17.png" alt="Brand 4 Clone">
            <img src="images/l19.png" alt="Brand 4 Clone">
            <img src="images/l20.png" alt="Brand 4 Clone">


                  
            
        </div>
    </section>

    <script>
        




        
        // Highlight middle logo effect
        function highlightMiddleLogo() {
            const middleLogoIndex = Math.floor(logos.length / 2);
            logos.forEach((logo, index) => {
                logo.classList.toggle('highlight-middle', index === middleLogoIndex);
            });
        }

        // Infinite looping animation
        function autoScroll() {
            if (offset <= -trackWidth / 2) {
                offset = 0; // Reset to start when end is reached
            }
            offset -= 2; // Gradual movement for smooth scrolling
            track.style.transform = `translateX(${offset}px)`;

            // Periodically check for middle logo to highlight
            if (Math.abs(offset) % 200 === 0) highlightMiddleLogo();

            requestAnimationFrame(autoScroll); // Continuously call autoScroll
        }

        autoScroll(); // Start auto-scrolling
    </script>
   

    <section class="contact section" id="contact">
        <div class="container">
            <h2 class="heading">Get in Touch</h2>
            <div class="t-container">
                <div class="t">
                    <h3>Contact Info</h3>
                    <p><i class="fas fa-phone"></i> +94 (72) 2559277</p>
                    <p><i class="fas fa-envelope"></i> info@joymusiccorner.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> 456 Harmony Road, Batticaloa, Sri Lanka</p>
                </div>
                <div class="t">
                    <h3>Opening Hours</h3>
                    <p><span>Monday - Friday:</span> 9:00 AM - 8:00 PM</p>
                    <p><span>Saturday - Sunday:</span> 10:00 AM - 9:00 PM</p>
                </div>
                <div class="t">
                    <h3>Newsletter</h3>
                    <p>Subscribe for the latest updates</p>
                    <input type="email" placeholder="Your email" class="email">
                    <button>Subscribe</button>
                </div>
            </div>
        </div>
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
    



    
    <script>
    const toggleBtn = document.getElementById("modeToggle");
    const body = document.body;

    toggleBtn.addEventListener("click", () => {
        body.classList.toggle("dark-mode");

        // Toggle icon between moon/sun
        const icon = toggleBtn.querySelector("i");
        if (body.classList.contains("dark-mode")) {
            icon.classList.remove("fa-sun");
            icon.classList.add("fa-moon");
        } else {
            icon.classList.remove("fa-moon");
            icon.classList.add("fa-sun");
        }

        // Optional: save preference
        localStorage.setItem("theme", body.classList.contains("dark-mode") ? "dark" : "light");
    });

    // Load saved preference
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark-mode");
        toggleBtn.querySelector("i").classList.replace("fa-sun", "fa-moon");
    }
</script>

</body>
</html>
