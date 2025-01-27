<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/contact_us.css')}}">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
  <x-nav-bar />

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-bg">
            <h3>Get in Touch with Us</h3>
            <h2>Contact Us</h2>
            <div class="line">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p class="text">We value your interest in Ethiopian traditional medicine and appreciate your feedback, inquiries, or contributions. Here's how you can reach us:</p>
        </div>

        <div class="contact-body">
            <div class="contact-info">
                <div>
                    <span><i class="fas fa-mobile-alt"></i></span>
                    <span>Phone No.</span>
                    <span class="text">+251911121314</span>
                </div>
                <div>
                    <span><i class="fas fa-envelope-open"></i></span>
                    <span>E-mail</span>
                    <span class="text">etm@gmail.com</span>
                </div>
                <div>
                    <span><i class="fas fa-map-marker-alt"></i></span>
                    <span>Address</span>
                    <span class="text">Menlik Avenue II, Kazanchis Addis Ababa, Ethiopia</span>
                </div>
                <div>
                    <span><i class="fas fa-clock"></i></span>
                    <span>Opening Hours</span>
                    <span class="text">Monday - Friday (8:00 AM to 5:00 PM)</span>
                </div>
            </div>

            <div class="contact-form">
                <form method="POST" action="contact.php">
                    <div>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                    </div>
                    <textarea name="message" rows="5" placeholder="Message" class="form-control" required></textarea>
                    <input type="submit" class="send-btn" value="Send Message">
                </form>

                <div>
                    <img src="{{ asset('image/contact-png.jpg')}}" alt="">
                </div>
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15762.051347316128!2d38.77843275!3d9.016893550000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b859e260e7aa5%3A0xc3f851c8a4166767!2sKazanchis%2C%20Addis%20Ababa!5e0!3m2!1sen!2set!4v1735366600793!5m2!1sen!2set" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        <div class="contact-footer">
            <h3>Follow Us</h3>
            <div class="social-links">
              <a href = "https://web.facebook.com/" class = "fab fa-facebook-f"></a>
              <a href = "https://x.com/" class = "fab fa-twitter"></a>
              <a href = "https://www.instagram.com/" class = "fab fa-instagram"></a>
              <a href = "https://www.linkedin.com/" class = "fab fa-linkedin"></a>
              <a href = "https://www.youtube.com/" class = "fab fa-youtube"></a>
            </div>
        </div>
    </section>

    <script>
        // Toggle the visibility of the menu on smaller screens
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');

        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('nav-visible');
        });
    </script>
</body>
</html>
