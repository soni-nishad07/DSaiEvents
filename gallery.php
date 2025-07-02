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


    <section class="about-section" style="background: url('images/gallery_pg.png') no-repeat center center/cover;">
        <div class="about-overlay"></div>
        <div class="about-content">
            <h2 class="about-title">Photos Gallery of DSaiEvents</h2>
        </div>
    </section>



    <section class="gallry">
        <div class="container">
            <div class="row">

                <div class="gallery-wrapper">
                    <h1 class="gallery-title"> Gallery</h1>
                    <p>Step into a world of unforgettable moments with our event gallery. From elegant corporate gatherings to vibrant social celebrations, our curated collection showcases the creativity, precision, and passion we bring to every event. Browse through stunning visuals of beautifully designed venues, lively performances, and happy guests, all captured in their best light. Let our past events inspire your next big occasion!</p>


                    <div class="gallery-container">
                        <?php
                        include 'connect.php'; // Ensure connection is included

                        $query  = "SELECT * FROM gallery ORDER BY id DESC"; // Fetch images from database
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="gallery-item">';
                                echo '<img src="uploads/' . $row['image_path'] . '" alt="' . htmlspecialchars($row['alt_text']) . '">';
                                echo '</div>';
                            }
                        } else {
                            echo "<p>No images available</p>";
                        }
                        ?>
                    </div>

                    <div class="gallery-container">
                    <video width="100%" controls>
                        <source src="images/vedio1.mp4" type="video/mp4"  style="height: 100%;width:100%;">
                        Your browser does not support the video tag.
                    </video>

                    <video width="100%" controls>
                        <source src="images/vedio2.mp4" type="video/mp4"  style="height: 100%;width:100%;">
                        Your browser does not support the video tag.
                    </video>

                    <video width="100%" controls>
                        <source src="images/vedio3.mp4" type="video/mp4"  style="height: 100%;width:100%;">
                        Your browser does not support the video tag.
                    </video>

                </div>


                </div>

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


</body>

</html>