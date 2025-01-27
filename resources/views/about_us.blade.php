<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethiopian Traditional Medicine Directory</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/about_us.css')}}">
    <script>
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
        }

        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }
        document.addEventListener('DOMContentLoaded', () => {
            const teamMembers = document.querySelectorAll('.team-member img');
            teamMembers.forEach(member => {
                member.addEventListener('mouseenter', () => {
                    member.style.transform = 'scale(1.1)';
                    member.style.transition = 'transform 0.3s';
                });
                member.addEventListener('mouseleave', () => {
                    member.style.transform = 'scale(1)';
                });
            });
        });
        document.addEventListener("DOMContentLoaded", () => {
        const testimonials = document.querySelectorAll(".testimonial");
        const dots = document.querySelectorAll(".dot");
        const prevButton = document.querySelector(".prev");
        const nextButton = document.querySelector(".next");

        let currentIndex = 0;

        function showTestimonial(index) {
            testimonials.forEach((testimonial, i) => {
                testimonial.classList.toggle("active", i === index);
                dots[i].classList.toggle("active", i === index);
            });
        }

        function nextTestimonial() {
            currentIndex = (currentIndex + 1) % testimonials.length;
            showTestimonial(currentIndex);
        }

        function prevTestimonial() {
            currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
            showTestimonial(currentIndex);
        }

        dots.forEach((dot, index) => {
            dot.addEventListener("click", () => {
                currentIndex = index;
                showTestimonial(index);
            });
        });

        nextButton.addEventListener("click", nextTestimonial);
        prevButton.addEventListener("click", prevTestimonial);

        // Auto-slide every 5 seconds
        setInterval(nextTestimonial, 5000);
    });
    document.addEventListener("scroll", () => {
        const missionSection = document.querySelector(".mission");
        const position = missionSection.getBoundingClientRect();
        if (position.top < window.innerHeight && position.bottom >= 0) {
            missionSection.classList.add("animate");
        }
    });
    </script>
</head>
<body>

    <x-nav-bar />

    <header class="hero">
        <h1>Welcome to Ethiopian Traditional Medicine Directory</h1>
        <p>Preserving Ethiopia's rich herbal heritage and sharing its benefits with the world.</p>
        <button onclick="scrollToSection('about-us')">Learn More</button>
    </header>

    <section class="about-us" id="about-us">
        <div class="story">
            <h2>About Us</h2>
            <div class="about-grid">
                <div class="about-image">
                    <img src="/image/traditional.png" alt="Traditional Medicine" />
                </div>
                <div class="about-content">
                    <p>
                        Ethiopian traditional medicine has a history that dates back thousands of years. Rooted in indigenous
                        knowledge and practices, it has been a cornerstone of health and wellness for generations. Utilizing
                        a rich variety of medicinal plants native to Ethiopia, healers have provided holistic solutions to
                        countless ailments.
                    </p>
                    <p>
                        Our organization, MERIGETA, was founded in 2015 with the mission of preserving this ancient wisdom.
                        With a focus on research, documentation, and accessibility, we aim to connect modern audiences with
                        the invaluable heritage of Ethiopian traditional medicine.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mission" id="mission">
        <h2>Our Mission</h2>
        <div class="mission-grid">
            <div class="mission-text">
                <p>
                    <span class="first-letter">O</span>ur mission is to preserve and promote the use of Ethiopian traditional herbs by making their benefits
                    accessible to everyone while ensuring sustainable harvesting practices. We aim to empower communities
                    by fostering the knowledge of ancient remedies that have stood the test of time.
                </p>
            </div>
            <div class="mission-list">
                <ul>
                    <li>
                        <i class="fas fa-search"></i>
                        <span>Conducting comprehensive research to document traditional medicinal practices.</span>
                    </li>
                    <li>
                        <i class="fas fa-book-open"></i>
                        <span>Educating the public about the benefits and applications of Ethiopian herbs.</span>
                    </li>
                    <li>
                        <i class="fas fa-handshake"></i>
                        <span>Collaborating with local healers to preserve indigenous knowledge.</span>
                    </li>
                    <li>
                        <i class="fas fa-leaf"></i>
                        <span>Advocating for sustainable and ethical harvesting methods to protect biodiversity.</span>
                    </li>
                    <li>
                        <i class="fas fa-globe"></i>
                        <span>Developing accessible platforms for sharing information globally.</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team" id="team">
      <h2>Our Team</h2>
      <div class="team-grid">
          <div class="team-member">
              <img src="/image/dr.mekdes.jpeg" alt="Team Member 1" />
              <h3>Dr. Amina Bekele</h3>
              <p>Founder & Ethnobotanist</p>
          </div>
          <div class="team-member">
              <img src="/image/middleage.jpeg" alt="Team Member 2" />
              <h3>Mr. Tesfaye Alemu</h3>
              <p>Research Coordinator</p>
         </div>
          <div class="team-member">
              <img src="/image/hanna.jpeg" alt="Team Member 3" />
              <h3>Ms. Liya Mekonnen</h3>
              <p>Community Outreach Specialist</p>
          </div>
      </div>
  </section>

  <section class="values" id="values">
    <h2>Our Values</h2>
    <div class="values-content">
        <p>We are guided by a set of core values that shape our work and relationships:</p>
        <ul>
            <li><strong>Integrity:</strong> Upholding honesty and transparency in all our endeavors.</li>
            <li><strong>Respect:</strong> Valuing the traditions and knowledge of indigenous communities.</li>
            <li><strong>Sustainability:</strong> Promoting practices that protect our environment for future generations.</li>
            <li><strong>Collaboration:</strong> Working together with communities, researchers, and policymakers.</li>
            <li><strong>Innovation:</strong> Seeking creative solutions to share and preserve traditional medicine.</li>
        </ul>
    </div>
</section>
<!-- Feedback -->
<section class="testimonials" id="testimonials">
    <h2>What Our Customers Say</h2>
    <div class="testimonial-slider">
        <div class="testimonial active">
            <p>"MERIGETA has been a lifesaver! Their resources helped me rediscover the power of traditional Ethiopian herbs."</p>
            <h4>- Sarah T., Health Enthusiast</h4>
        </div>
        <div class="testimonial">
            <p>"The knowledge and dedication of the team are incredible. I feel more connected to my heritage than ever before."</p>
            <h4>- Tesfaye M., Community Leader</h4>
        </div>
        <div class="testimonial">
            <p>"Their sustainable practices and advocacy for traditional medicine are commendable. Highly recommend them!"</p>
            <h4>- Hannah G., Environmentalist</h4>
        </div>
    </div>
    <div class="testimonial-controls">
        <button class="prev">&#8249;</button>
        <button class="next">&#8250;</button>
    </div>
    <div class="testimonial-indicators">
        <span class="dot active" data-index="0"></span>
        <span class="dot" data-index="1"></span>
        <span class="dot" data-index="2"></span>
    </div>
</section>

    <footer class="footer">
        <p>&copy; 2024 Ethiopian Traditional Medicine Directory. All rights reserved.</p>
    </footer>
</body>
</html>
