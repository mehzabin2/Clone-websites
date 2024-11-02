<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $disease = $_POST['disease'];
    $doctorname = $_POST['doctorname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO patients (name, age, gender,disease,doctorname, contact, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$name, $age, $gender,$disease, $doctorname, $contact, $address])) {
        echo "Patient registered successfully! <a href='patients.php'>View Patients</a>";
    } else {
        echo "Error registering patient.";
    }
}
?>
