<?php
$servername = "ec2-52-207-74-100.compute-1.amazonaws.com";
$usernameDB = "eelbfijcrpipng";
$password = "f9598d15b631ab09a368034c39b94a88113e11c6ae0000e31b4a927eb132ee64";
$db = "d1ss7frioqij2v";
$uri = 'postgres://eelbfijcrpipng:f9598d15b631ab09a368034c39b94a88113e11c6ae0000e31b4a927eb132ee64@ec2-52-207-74-100.compute-1.amazonaws.com:5432/d1ss7frioqij2v';
// Create connection
$conn = pg_connect($uri);
session_start(); 
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

