<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
$stmt->execute([$id]);
$patient = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $disease = $_POST['disease'];
    $doctorname = $_POST['doctorname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "UPDATE patients SET name=?, age=?, gender=?,disease=?,doctorname=?, contact=?, address=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $age, $gender,$disease,  $doctorname, $contact, $address,$id]);

    header("Location: patient_list.php");
    exit;
}
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
 <body>
        <!-- Navbar -->
 <nav class="navbar navbar-expand-lg   " style="background-color:rgb(4, 43, 114);">
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
              <li><a class="dropdown-item" href="search.php">Patient Records</a></li>
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
  <!--updated form-->
  <div class="container contant">
    <h2 class="mt-5 text-center">Update Patient</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($patient['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?= htmlspecialchars($patient['age']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="Male" <?= $patient['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $patient['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
            </select>
        </div>
        <!--`value="<<?= htmlspecialchars($patient['disease']) ?>"` sets the initial value of the input to the disease name stored in `$patient['disease']`.
           The `htmlspecialchars()` function is used here to prevent XSS (cross-site scripting) attacks by escaping special HTML characters.
         - `required` ensures that this field must be filled in before form submission.-->
        <div class="mb-3">
            <label for="disease" class="form-label">Disease</label>
            <input type="text" class="form-control" id="disease" name="disease" value="<?= htmlspecialchars($patient['disease']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="doctorname" class="form-label">Doctor's Name</label>
            <input type="text" class="form-control" id="doctorname" name="doctorname" value="<?= htmlspecialchars($patient['doctorname']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact" name="contact" value="<?= htmlspecialchars($patient['contact']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required><?= htmlspecialchars($patient['address']) ?></textarea>
        </div>
        <button type="text-center submit " class="btn btn-primary">Update</button>
    </form>
</div>
<!--footer-->
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
</body>
</html>