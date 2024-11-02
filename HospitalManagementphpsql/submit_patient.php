<?php
require 'db.php';// Includes the 'db.php' file to establish a connection to the database using PDO.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Checks if the request method is POST. This ensures the code inside this block only runs when form data is submitted via POST.
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $disease = $_POST['disease'];
    $doctorname = $_POST['doctorname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    // Retrieves form data from the POST request and stores each field in a variable.
    $sql = "INSERT INTO patients (name, age, gender,disease,doctorname, contact, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    // Defines an SQL query to insert a new row into the `patients` table with placeholders (?) for each field.
    $stmt = $pdo->prepare($sql);
    // Prepares the SQL statement with placeholders, preventing SQL injection by binding actual values later.
    $stmt->execute([$name, $age, $gender,$disease,  $doctorname, $contact, $address]);

    header("Location: patient_list.php");
    // Redirects the user to the 'patient_list.php' page after the insertion is successful.

    exit;
}
?>
