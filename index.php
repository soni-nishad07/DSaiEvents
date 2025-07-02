

<?php
session_start();
include 'connect.php'; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $conn->real_escape_string($_POST['name']);
    $phone   = $conn->real_escape_string($_POST['phone']);
    $email   = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert query
    $sql = "INSERT INTO contact_form (name, phone, email, message) VALUES ('$name', '$phone', '$email', '$message')";

    if ($conn->query($sql) === true) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> D SAI EVENTS</title>

<?php
    include 'link.php';
?>

</head>



<body>


<?php
    include 'nav.php';
?>


    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1>
                Crafting Moments <br />
                Creating Memories
            </h1>
            <p>
                Bringing visions to life with seamless planning, creativity, and unforgettable experiences.
            </p>
            <a href="contact" class="btn btn-custom">Contact Us</a>
        </div>
    </div>

    <!-- About Us Section Start -->
    <!-- Home About Section Start -->
    <section class="home_about"  id="aboutus">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img src="images/home-sec2.png" alt="About Us" class="home_about-image img-fluid" />
                </div>
                <div class="col-md-7">
                    <div class="home_about-content">
                        <h2 class="home_about-title">About Us</h2>
                        <p class="home_about-description">
                            D SAI EVENTS is all about creating and delivering a memorable
                            experience live, blending discipline and process with passion.
                            Our team was formed by combining our passion for business and
                            events, bringing a fresh, unique approach to the event
                            management industry.
                        </p>
                    </div>
                    <div class="home_about-team">
                        <h2 class="home_about-title">Team</h2>
                        <p class="home_about-team-description">
                            We are a passionate and creative team with expertise in event
                            management and advertising. We produce tailor-made events that
                            meet client requirements, ensuring professionalism and on-ground
                            expertise. Our flexible and innovative solutions bring your
                            brand to life.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -------home sec3 card--- -->
    <!-- Home Section 3 - Event Cards -->
    <section class="home_sec3">
        <div class="container">
            <div class="home_sec_title">
                <h2>Events We Cover For You</h2>
                <p>
                    From corporate gatherings to grand celebrations, we specialize in
                    crafting seamless, memorable events tailored to your needs.
                </p>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <div class="col">
                    <div class="home_sec3-card card h-100">
                        <img src="images/Employee_Engagement_Events.png" class="home_sec3-img card-img-top"
                            alt="Employee Engagement Events" />
                        <div class="card-body home_sec3_card_body">
                            <h5 class="home_sec3-title card-title">
                                Employee Engagement Events
                            </h5>
                            <p class="home_sec3-text card-text">
                            Building strong relationships and boosting morale is key to a thriving workforce. We organize engaging events that foster team spirit, recognition, and company culture.
                            </p>
                            <a href="service" class="card-link">Learn More <i class="fa-solid fa-chevron-right"></i><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="home_sec3-card card h-100"  id="home_conferences">
                        <img src="images/Conferences.png" class="home_sec3-img card-img-top" alt="Conferences" />
                        <div class="card-body home_sec3_card_body">
                            <h5 class="home_sec3-title card-title">Conferences</h5>
                            <p class="home_sec3-text card-text">
                            Connect, learn, and grow with industry experts through insightful discussions, networking opportunities, and knowledge-sharing sessions.
                                                    </p>
                            <a href="service" class="card-link">Learn More <i class="fa-solid fa-chevron-right"></i><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="home_sec3-card card h-100">
                        <img src="images/Milestone_Events.png" class="home_sec3-img card-img-top"
                            alt="Festival & Milestone Events" />
                        <div class="card-body home_sec3_card_body">
                            <h5 class="home_sec3-title card-title">
                                Festival & Milestone Events
                            </h5>
                            <p class="home_sec3-text card-text">
                            Celebrate special moments with grand festivals and milestone events that bring communities together in joy and tradition.
                            </p>
                            <a href="service" class="card-link">Learn More <i class="fa-solid fa-chevron-right"></i><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="home_sec3-card card h-100">
                        <img src="images/Fashion_Show_Events.png" class="home_sec3-img card-img-top"
                            alt="Fashion Show Events" />
                        <div class="card-body home_sec3_card_body">
                            <h5 class="home_sec3-title card-title">Fashion Show Events</h5>
                            <p class="home_sec3-text card-text">
                            From runway designs to event choreography, we bring high-fashion moments to life. We handle all the details, from styling to lighting, to ensure your fashion show is a stunning and seamless production.
                            </p>
                            <a href="service" class="card-link">Learn More <i class="fa-solid fa-chevron-right"></i><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="home_sec3-card card h-100"  id="home_sport">
                        <img src="images/Sports_Event.png" class="home_sec3-img card-img-top" alt="Sports Event" />
                        <div class="card-body home_sec3_card_body">
                            <h5 class="home_sec3-title card-title">Sports Events</h5>
                            <p class="home_sec3-text card-text">
                            Whether it’s a tournament, a sports day, or a charity match, we have the expertise to organize engaging and well-executed sports events. We focus on the details to ensure a fun and competitive environment for participants and spectators alike.
                            </p>
                            <a href="service" class="card-link">Learn More <i class="fa-solid fa-chevron-right"></i><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="home_sec3-card card h-100"  id="home_music">
                        <img src="images/Film_Musical.png" class="home_sec3-img card-img-top"
                            alt="Film & Musical Events" />
                        <div class="card-body home_sec3_card_body">
                            <h5 class="home_sec3-title card-title">
                                Film & Musical Events
                            </h5>
                            <p class="home_sec3-text card-text">
                            Immerse yourself in the world of cinema and live music with exciting screenings, concerts, and artistic performances.
                            </p>
                            <a href="service" class="card-link">Learn More <i class="fa-solid fa-chevron-right"></i><i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- <div class="home_load_more">
                    <a href="service">Load More</a>
                </div> -->

            </div>
        </div>
    </section>



    <!-------event-sec------>
    <section class="event-hero">
        <div class="event-overlay">

            <div class="container">
                <div class="row">

                    <div class="col-md-7">
                        <div class="event-content">
                            <h1 class="event-heading">
                                Searching for Visionary Event Experts Who Turn Dreams Into Reality?
                            </h1>
                            <p class="event-description">
                                Our team of creative professionals brings passion, innovation, and
                                precision to every event. From concept to execution, we ensure every
                                detail is flawlessly planned, transforming your vision into an
                                unforgettable experience.
                            </p>
                            <p class="event-description">
                                Contact us today to bring your vision to life and create
                                unforgettable memories!
                            </p>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="event-form-container">
                            <form method="POST" action=""  id="event-contact-form">
                                <input type="text" id="event-name" name="name" placeholder="Enter your Full Name"
                                    required />
                                <input type="tel" id="event-phone" name="phone" placeholder="Enter your Phone Number"
                                    required />
                                <input type="email" id="event-email" name="email" placeholder="Enter your Email ID"
                                    required />
                                <textarea id="event-message" name="message" placeholder="Message" rows="4"></textarea>
                                <button type="submit" id="event-submit-btn">SUBMIT</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>



    <!-- ----------FAQ--- -->
    <!-- <div id="FAQ">

        <div class="accordian">
            <p class="title">Got Questions? Explore Our FAQs for Answers!</p>
            <div class="item">
                <div class="FAQ-title">
                    <p class="faqQuestion">1. What types of events do you manage?</p>
                    <span class="expandToggle">+</span>
                </div>
                <div class="FAQ-content">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni commodi esse, inventore,
                        exercitationem molestias, magnam nisi fugiat excepturi itaque placeat fugit quas corrupti?
                        Quidem quibusdam magnam fuga perferendis distinctio a at voluptatum itaque illum explicabo odio,
                        accusamus inventore! Harum, debitis!</p>
                </div>
            </div>
            <div class="item">
                <div class="FAQ-title">
                    <p class="faqQuestion">2. What types of events do you manage?</p>
                    <span class="expandToggle">+</span>
                </div>
                <div class="FAQ-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam animi doloremque quibusdam, ullam
                        atque soluta quisquam laudantium dicta minus, necessitatibus nihil tempora nobis rem, itaque
                        deleniti quae repudiandae quas facilis.</p>
                </div>
            </div>
            <div class="item">
                <div class="FAQ-title">
                    <p class="faqQuestion">3. What types of events do you manage?</p>
                    <span class="expandToggle">+</span>
                </div>
                <div class="FAQ-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis esse maiores enim iste! Libero unde
                        voluptates veritatis aperiam rem. Reprehenderit veritatis maiores cumque, quos itaque ab
                        exercitationem! Amet, quia reiciendis!</p>
                </div>
            </div>
        </div>

    </div> -->




    <div class="contact-right-section">
        <a href="mailto:dsaievents24@gmail.com" class="contact-item-box">
            
            <div class="icon-container email-icon-box">
                <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email Icon">
            </div>
        </a>
        <a href="tel:+9008296989" class="contact-item-box">
            
            <div class="icon-container phone-icon-box">
                <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" alt="Phone Icon">
            </div>
        </a>
    <a href="https://wa.me/919008296989" class="contact-item-box">
    
    <div class="icon-container whatsapp-icon-box">
        <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png" alt="WhatsApp Icon">
    </div>
</a>

    </div>


    <!-------footer ----- -->

    <?php
        include 'footer.php';
    ?>

</body>

</html>