
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index">
                <img src="images/logo.png" alt="" />
            <span class="text-white"> D SAI EVENTS</span>    
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about">About Us</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="service">Our Services</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="event">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery">Gallery</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact Us</a>
                    </li>
                
                    <!-- home btns -->
                    <!-- <li class="nav-item">
                        <a class="btn btn-light mx-2" href="#">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="#">Sign Up</a>
                    </li> -->

                </ul>

                <div class="home_bhtns">
                    <a class="btn btn-light mx-2  login" href="admin/index">Log In</a>
                    <a class="btn btn-primary  signin" href="contact#enquiry">Enquiry Now</a>
                </div>

            </div>
        </div>
    </nav>

    
    <script>
        $(document).ready(function () {
            $('.navbar-toggler').click(function () {
                $('#navbarNav').collapse('toggle');
            });
        });
    </script>
    

