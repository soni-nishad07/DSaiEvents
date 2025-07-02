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
    <title>DSai Events</title>

    <?php
    include 'link.php';
    ?>

</head>



<body style="background-color:#EFBB8D24;">


    <?php
    include 'nav.php';
    ?>


    <section class="about-section" style="background: url('images/contact_pg.png') no-repeat center center/cover;">
        <div class="about-overlay"></div>
        <div class="about-content">
            <h2 class="about-title">Contact Us</h2>
            <p class="about-text">Need help planning your next event? Look no further than our expert event management team!
                We provide everything you need to make your event a seamless success.</p>
        </div>
    </section>



    <div class="contact-section">
        <div class="contact-info">
            <h2>Want to Work with Us?</h2>
            <p>
                <i class="fa-solid fa-phone-volume"></i> Talk to Our Client Support Team <br>
                <a href="tel:+919008296989" class="con-phn">+91-9008296989</a>
                <a href="tel:+919986329917" class="con-phn">+91-9986329917</a>
            </p>
            <p>
                <i class="fa-solid fa-envelope"></i> Write to us about your needs <br>
                <a href="mailto:dsaievents24@gmail.com" class="con-phn">dsaievents24@gmail.com</a>
            </p>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
        </div>
        <div class="contact-form"  id="enquiry">
            <form method="POST" action="">
                <input type="text" name="name" placeholder="Enter your Full Name" required>
                <input type="number" name="phone" placeholder="Enter your Phone Number" required>
                <input type="email" name="email" placeholder="Enter your Email ID" required>
                <textarea name="message" placeholder="Message" rows="4" required></textarea>
                <button type="submit">SUBMIT</button>
            </form>
        </div>
    </div>




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


</body>

</html>