<?php
$servername = "ec2-54-158-232-223.compute-1.amazonaws.com";
$usernameDB = "asoizwbkhphdio";
$password = "1c8315ab52b394b1e548ad9faf496e2d4a1e3a59a9bc6bda0d527564a07da84f";
$db = "d7pp5calcap4mh";
$uri = 'postgres://asoizwbkhphdio:1c8315ab52b394b1e548ad9faf496e2d4a1e3a59a9bc6bda0d527564a07da84f@ec2-54-158-232-223.compute-1.amazonaws.com:5432/d7pp5calcap4mh';
// Create connection
$conn = pg_connect($uri);

/* $conn_string = "ec2-3-216-221-31.compute-1.amazonaws.com";
         " port=5432 dbname=dr4viqhane5dt";
         " user=anmvhqifhrelof";
         " password=b1c5b9de4ada863333da4e0df19ad62adb8ece194da1d01fb74075ef19b6da04";
$conn = pg_connect($conn_string); */

// Check connection
if (!$conn) {
  die('Error: Could not connect: ' . pg_last_error());
}
?>

