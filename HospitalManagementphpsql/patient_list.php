<?php
require 'db.php';

// Initialize search term
$searchTerm = '';

// Check if the search term is set
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
}

// Prepare SQL query with optional search filter
$sql = "SELECT * FROM patients";
if ($searchTerm) {
    $sql .= " WHERE name LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['%' . $searchTerm . '%']);
} else {
    $stmt = $pdo->query($sql);
}

// Fetch all patients
$patients = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /*<!--footer style-->*/
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1; /* Allow content to grow and fill the space */
        }
        footer {
            background-color: rgb(4, 43, 114); /* Footer background color */
            color: white; /* Footer text color */
            text-align: center; /* Center the text */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(4, 43, 114);">
        <div class="container">
            <a class="navbar-brand pe-3 pb-md-1 text-white" href="#"><i class="fa-solid fa-staff-snake pe-1"></i>HealthHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="patientDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Patient Management
                        </a>
                        <ul class="dropdown-menu text-white" aria-labelledby="patientDropdown">
                            <li><a class="dropdown-item" href="register_patient.php">Register Patient</a></li>
                            <li><a class="dropdown-item" href="search.php">Patient Records</a></li>
                            <li><a class="dropdown-item" href="#">Appointments</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Billing & Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Help & Support</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!---patient table-->
    <div class="container text-center content">
        <h3 class="m-4">Registered Patients</h3>
        
        <div class="table-responsive">
            <table class="table table-bordered my-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Disease</th>
                        <th>Doctor's Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Update</th>
                        <th>Deletion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient): ?><!-- Loops through each patient in the $patients array. For each iteration, $patient represents an individual patient's data. -->
                    <tr>
                        <td><?= htmlspecialchars($patient['id']) ?></td> <!-- Outputs the patient's ID. htmlspecialchars() is used to prevent XSS attacks by escaping special HTML characters. -->
                        <td><?= htmlspecialchars($patient['name']) ?></td><!-- Outputs the patient's name, also sanitized with htmlspecialchars(). -->
                        <td><?= htmlspecialchars($patient['age']) ?></td><!-- Outputs the patient's gender, sanitized with htmlspecialchars(). -->
                        <td><?= htmlspecialchars($patient['gender']) ?></td>
                        <td><?= htmlspecialchars($patient['disease']) ?></td>
                        <td><?= htmlspecialchars($patient['doctorname']) ?></td>
                        <td><?= htmlspecialchars($patient['contact']) ?></td>
                        <td><?= htmlspecialchars($patient['address']) ?></td><!-- Outputs the patient's address, sanitized with htmlspecialchars(). -->
                        <td>
                           <a href="update_patient.php?id=<?= htmlspecialchars($patient['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                             <!-- Provides a link to edit the patient's information. The patient's ID is passed as a query parameter in the URL.htmlspecialchars() is used to prevent XSS by sanitizing the ID. -->
                        </td>
                        <td>
                            <a href="delete_patient.php?id=<?= htmlspecialchars($patient['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this patient?');">Delete</a>
                             <!-- Provides a link to delete the patient's information, passing the patient's ID in the URL.The onclick attribute triggers a confirmation prompt before proceeding with the delete action. -->
                       </td>
                        </td>
                    </tr>
                    <?php endforeach; ?><!--s a shorthand syntax for the more traditional way of writing the loop:-->
                </tbody>
            </table>
            <a href="register_patient.php" class="btn btn-primary text-center">register</a><!--link to go to Home-->
            
        </div>
    </div>
    <!---footer-->
    <footer class="text-center text-lg-start mt-5">
        <div class="text-center p-3 text-white" style="background-color: rgb(4, 43, 114);">
            © 2024 HealthHub. All Rights Reserved.
            <div>
                <a href="#" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
