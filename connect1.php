<?php
// session_start();

$conn = mysqli_connect("localhost","root","","dsai_events");

mysqli_select_db($conn,"dsai_events");

// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>