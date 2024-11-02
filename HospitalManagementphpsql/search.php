<?php
require 'db.php';// Includes the 'db.php' file, which establishes a database connection using PDO.

$searchTerm = '';// Initializes $searchTerm as an empty string to hold the search term, if provided.


// Check if the search term is set
if (isset($_GET['search'])) {// Checks if the 'search' parameter exists in the GET request (e.g., from a form submission).

    $searchTerm = $_GET['search']; // If it does, assigns the search term to $searchTerm.
}
// Prepare SQL query with optional search filter
$sql = "SELECT * FROM patients";// Initializes the SQL query to select all columns from the 'patients' table.
if ($searchTerm) {
    $sql .= " WHERE name LIKE ?";// If $searchTerm is not empty, modifies the SQL query to include a WHERE clause that filters by 'name' using a LIKE pattern.
    $stmt = $pdo->prepare($sql);// Prepares the SQL statement with placeholders for parameters to prevent SQL injection.
    $stmt->execute(['%' . $searchTerm . '%']);
    // Executes the prepared statement, passing an array with the search term wrapped in wildcards (%) 
    // to match any patient name containing the search term.

} else {
    $stmt = $pdo->query($sql);
    // If there's no search term, simply executes the SQL query without additional filtering.
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
    <link rel="stylesheet"href="\css\bootstrap.min.css">
    <link rel="stylesheet"href="\css\style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style> /*<!--footer style-->*/
    body{
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
             /* Padding for the footer */
        }

</style>

  </head>
<body>
     <!-- Navbar -->
 <nav class="navbar navbar-expand-lg" style="background-color: rgb(4, 43, 114);">
    <div class="container ">
      <a class="navbar-brand pe-3 pb-md-1 text-white" href="#"><i class="fa-solid fa-staff-snake pe-1"></i>HealthHub</a><!--logo-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link active text-white" href="index.php">Home</a>
          </li>
          
          <!-- Patient Management Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="patientDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Patient Management
            </a>
            <ul class="dropdown-menu text-white" aria-labelledby="patientDropdown">
              <li><a class="dropdown-item" href="register_patient.php">Register Patient</a></li>
              <li><a class="dropdown-item" href="patient_list.php">Patient Records</a></li>
             
              <li><a class="dropdown-item" href="#">Appointments</a></li>
            </ul>
          </li>    
         <!--nav- Links -->
          <li class="nav-item ">
            <a class="nav-link text-white" href="#">Billing & Payments</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white" href="#">Reports</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white" href="#">Help & Support</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container mt-4 content">
        <h3>Patient Search List</h3>
        <form action="patient_list.php" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search by name..." value="<?= htmlspecialchars($searchTerm) ?>" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Disease</th>
                    <th>Doctor's Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Update</th>
                    <th>Deletion</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($patients): ?>
                    <?php foreach ($patients as $patient): ?>
                    <tr>
                        <td><?= htmlspecialchars($patient['id']) ?></td>
                        <td><?= htmlspecialchars($patient['name']) ?></td>
                        <td><?= htmlspecialchars($patient['age']) ?></td>
                        <td><?= htmlspecialchars($patient['gender']) ?></td>
                        <td><?= htmlspecialchars($patient['disease']) ?></td>
                        <td><?= htmlspecialchars($patient['doctorname']) ?></td>
                        <td><?= htmlspecialchars($patient['contact']) ?></td>
                        <td><?= htmlspecialchars($patient['address']) ?></td>
                        <td>
                            <a href="update_patient.php?id=<?= htmlspecialchars($patient['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <a href="delete_patient.php?id=<?= htmlspecialchars($patient['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this patient?');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No patients found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <footer class=" iconff  text-center text-lg-start mt-5 align-content-end">
        <div class="text-center p-3 text-white" style="background-color: rgb(4, 43, 114);">
        © 2024 HealthHub. All Rights Reserved.
        <div>
            <a href="#" class="text-white me-4 "><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-4 "><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-4 "><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white "><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
    </footer> 
<script src="\js\bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
