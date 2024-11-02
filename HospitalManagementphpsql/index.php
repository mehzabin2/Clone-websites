<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"href="css\style.css">
    <link rel="stylesheet"href="\css\bootstrap.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
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
        .hero {
    background-image: url("picture/h-6.jpg");
    background-size: cover;
    background-position: center;
    height: 600px; 
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: rgb(10, 19, 20);
    text-align: center;
  }

</style>

  </head>
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
            <a class="nav-link active text-white" href="#">Home</a>
          </li>
          
          <!-- Patient Management Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="patientDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Patient Management
            </a>
            <ul class="dropdown-menu text-white" aria-labelledby="patientDropdown">
              <li><a class="dropdown-item" href="register_patient.php">Register Patient</a></li> <!--link to go to register_patient-->
              <li><a class="dropdown-item" href="patient_list.php">Patient Records</a></li><!--link to go to patient_list--->
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
  <div class="hero text-center content h-100" > 
  <div class="transparent-bg mx-auto">
      
      <h1>Welcome to HealthHub</h1>
    <h3>Feel better About Finding HealthCare</h3>
    <p>Delivering Quality Healthcare Services</p>
    <a href="register_patient.php" class="btn btn-primary text-dark mt-3">Register Patient</a><!--link to go to register_patient-->
        <a href="search.php" class="btn btn-info mt-3">View Patients</a><!--link to go to patient search list-->
  </div>
  </div>
  <footer class=" iconff  text-center text-lg-start  align-content-end">
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