<?php
$host = 'localhost';// Specifies the host for the database, typically 'localhost' for local development.
$db = 'healthhub_db';// Defines the name of the database you're connecting to.
$user = 'root'; // Your database username
$pass = ''; // Your database password

try {
    // Creates a new PDO instance, which represents a connection to the specified database.
    // The DSN (Data Source Name) contains the database type (mysql), host, and database name.
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   // Sets the error mode attribute for the PDO object to throw exceptions when a database error occurs.
    // This helps with debugging by providing detailed error messages.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} // Catches any PDO exception that occurs during the database connection process.
    // If an exception is caught, it outputs a message indicating the connection failed, along with the error message.
     catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    

}
?>