<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DSai Events</title>

<?php
    include 'link.php';
?>

</head>



<body>


<?php
    include 'nav.php';
?>


<section class="about-section" style="background: url('images/event-sec.jpeg') no-repeat center center/cover;">
        <div class="about-overlay"></div>
        <div class="evntpg-content">
            <h2 class="evt-title">From Corporate Galas to Social Celebrations, We Bring Your Vision to Life!</h2>
            <a href="contact" class="btn btn-primary  service_cont">Contact Us</a>
            </div>
    </section>





    <section class="evntpage-container">
        <h2 class="evntpage-title">Social Event</h2>
        <p class="evntpage-description">
            Celebrate life's special moments with style and perfection! From intimate gatherings to grand celebrations,
            we design and execute unforgettable social events tailored to your vision. With creative concepts, seamless
            planning, and a keen eye for detail, we ensure every occasion is a memorable experience. Let us bring your
            dream event to life!
        </p>

        <div class="evntpage-card-container">
            <!-- Sports Events Card -->
            <div class="evntpage-card">
                <img src="images/sport.png" alt="Sports Event">
                <div class="evntpage-card-content">
                    <h3>Sports Events</h3>
                    <p>Whether it’s a tournament, a sports day, or a charity match, we have the expertise to organize engaging and well-executed sports events.</p>
                    <a href="contact">
                        <button class="evntpage-btn">Contact Us</button>
                    </a>
                </div>
            </div>

            <!-- Fashion Show Events Card -->
            <div class="evntpage-card">
                <img src="images/fashion.png" alt="Fashion Show Event">
                <div class="evntpage-card-content">
                    <h3>Fashion Show Events</h3>
                    <p>From runway designs to event choreography, we bring high-fashion moments to life.</p>
                    <a href="contact">
                        <button class="evntpage-btn">Contact Us</button>
                    </a>
                </div>
            </div>

            <!-- Film & Musical Events Card -->
            <div class="evntpage-card">
                <img src="images/film.png" alt="Film & Musical Event">
                <div class="evntpage-card-content">
                    <h3>Film & Musical Events</h3>
                    <p>Immerse yourself in the world of cinema and live music with exciting screenings, concerts, and artistic performances.
                </p>
                <a href="contact">
                    <button class="evntpage-btn">Contact Us</button>
                </a>
                </div>
            </div>
        </div>
    </section>





<!-- evnet section -->
<section class="event1-container"   id="corporate-event">
        <h1 class="event1-title">Corporate event</h1>
        <p class="event1-description">
            Elevate your corporate gatherings with professionalism and precision! From conferences and product launches to team-building events and award ceremonies, we design and execute seamless experiences that align with your brand’s vision. With innovative concepts, meticulous planning, and flawless execution, we ensure your event leaves a lasting impact. Let us make your next corporate event a success!
        </p>
        <div class="event1-content">
            <button class="event1-prev">&#8592;</button>
            <img src="images/corporate-evnt.png" alt="Corporate event1" class="event1-image">
            <div class="event1-card">
                <h2 class="event1-card-title">Conferences</h2>
                <p class="event1-card-description">
                Our conferences offer a platform for attendees to stay ahead of the curve, explore the latest trends, and engage with experts shaping the future of tech. At DSAIEvents, we ensure every event is meticulously crafted to provide valuable insights and memorable experiences for all participants.
                </p>
                <a href="contact">
                    <button class="event1-button">Contact Us</button>
                </a>
            </div>
            <button class="event1-next">&#8594;</button>
        </div>
    </section>



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


    

    <?php
        include 'footer.php';
    ?>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    const images = [
        "images/abut2.png",
        "images/corporate-evnt.png",
        "images/corporate-evnt.png"
    ]; // Add more images if needed

    let currentIndex = 0;
    const imgElement = document.querySelector(".event1-image");

    document.querySelector(".event1-prev").addEventListener("click", function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        imgElement.src = images[currentIndex];
    });

    document.querySelector(".event1-next").addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % images.length;
        imgElement.src = images[currentIndex];
    });
});

  </script>

</body>
</html>
