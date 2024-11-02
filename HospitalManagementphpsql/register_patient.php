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
 <nav class="navbar navbar-expand-lg" style="background-color:rgb(4, 43, 114);">
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
  <!--registration form-->
    <div class="container content ">
        <h2 class=" text-center registry mt-5 ">Register New Patient</h2>
        <form action="submit_patient.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div> 
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="disease" class="form-label">Disease</label>
                <input type="text" class="form-control" id="disease" name="disease" required>
            </div>
            <div class="mb-3">
                <label for="doctorname" class="form-label">Doctor's Name</label>
                <input type="text" class="form-control" id="doctorname" name="doctorname" required>
            </div>
            
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <button type="submit" class="text-center btn btn-primary">Register</button>
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
