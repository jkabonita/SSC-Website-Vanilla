<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>PHP OK — version " . phpversion() . "</h2>";

// Test DB connection
require_once "config/database.php";
if ($conn) {
    echo "<p style='color:green'>&#10003; DB connected to " . DB_SERVER . "</p>";
    $r = mysqli_query($conn, "SHOW TABLES");
    echo "<p>Tables: ";
    while ($row = mysqli_fetch_row($r)) echo $row[0] . "  ";
    echo "</p>";
} else {
    echo "<p style='color:red'>&#10007; DB failed: " . mysqli_connect_error() . "</p>";
}

// Test session
session_start();
echo "<p style='color:green'>&#10003; session_start OK</p>";

echo "<p>All good.</p>";
