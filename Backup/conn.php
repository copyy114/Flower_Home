<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flowerhome";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
$file = __DIR__ . '/data/pages.db';

try {
  $db = new PDO('sqlite:' . $file);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  exit;
}
?>