<?php

  session_start();

  include("php/config.php");
  if(!isset($_SESSION['valid'])){
    header("Location: index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
<link rel="shortcut icon" href="./favicon_io/favicon.ico">
<link rel="stylesheet" href="styles.css">
    <title>TechMentorHer</title>
  </head>
  <body>

  <?php
// Assuming you have a database connection established and the session started.
// Replace 'your_db_host', 'your_db_name', 'your_db_user', and 'your_db_password' with your database credentials.
$host = 'localhost';
$dbname = 'techmentorher';
$username = 'root';
$password = '';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Assuming you have implemented password hashing when storing passwords in the database.
    // Check if the user with the provided username and password exists in the database.
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login successful. Set user session or handle authentication.
        // For example, you can set $_SESSION["user_id"] to the user's ID.
        session_start();
        $_SESSION["user_id"] = $user['id'];

        // Additional functionality, assuming this is for profile editing.
        echo "<a href='edit.php?username={$user['username']}'>Change Profile</a>";
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
    ?>
    <!-- paste -->
    <!--Nav-bar-->
<nav id="nav-bar" class="navbar nav-expand-lg bg-dark navbar-dark py-3 fixed-top"> 
  <div class="container">
    <a href="#" class="navbar-brand">TechMentorHER</a>

    <button class="navbar-toggler" type="button" 
    data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="#search" class="nav-link text-light">Search</a>
        </li>
        <li class="nav-item">
          <a href="#about" class="nav-link active text-light" aria-current="page">About</a>
        </li>
        <li class="nav-item">
          <a href="#pricing" class="nav-link text-light">Pricing</a>
        </li>
        <li class="nav-item">
          <a href="#mentors" class="nav-link text-light">Connect with Mentors</a>
        </li>
        <li class="nav-item">
          <a href="#profile" class="nav-link text-light">Profile</a>
        </li>
      </ul>  
    </div>    
  </div>     
</nav>

<!-- Card -->
<div
  class="bg-image card shadow-1-strong d-flex justify-content-center align-items-center d-none d-sm-block p-5"
  style="background-image: url(./images/software-development-g6af3722a8_1920.jpg);"
>
  <div class="container card-body text-white p-5 m-5" id="titles">
    <h1 class="card-title">Struggling with your work? <br> Can't seem to cope by yourself?</h1>
    <h2 class="card-text">
      Sign up with our mentorship program!
    </h2>
    <a href="#!" class="btn info">Learn More!</a>
  </div>
</div>
<!-- Card -->

<!-- Team Section -->
<div class="container-fluid p-5" id="team">
  <div class="container pb-5">
    <h1 class="text-center">THE TEAM</h1>
  <p class="text-center lead">The ones who runs this company</p>
  </div>  
  
  <div class="row d-flex justify-content-between align-items-center g-5 pb-5">
    <div class="col p-1">
      <div class="card text-dark" style="width: 18rem;" id="box">
        <div class="card-body text-center">
          <div>
            <img src="./images/sipho.jpg" alt="" class="card-img img-fluid" style="width: 18rem;">
          </div>
          <h5 class="card-title">Siphokazi Z Mbatha</h5>
          <h6>Data analytics</h6>
          <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque earum totam dolores quis odit perferendis nihil doloremque quibusdam excepturi consectetur.
          </p>
          <a href="#" class="btn btn-dark"><i class="fa fa-envelope"></i> Contact</a>
        </div>
      </div>
    </div>
    
    <div class="col p-1">
      <div class="card text-dark" style="width: 18rem;" id="box">
        <div class="card-body text-center">
          <div>
            <img src="./images/selfie.jpg" alt="" class="card-img img-fluid" style="width: 18rem;">
          </div>
          <h5 class="card-title">Danielle Jae Ormerod</h5>
          <h6>Software developer</h6>
          <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque earum totam dolores quis odit perferendis nihil doloremque quibusdam excepturi consectetur.
          </p>
          <a href="#" class="btn btn-dark"><i class="fa fa-envelope"></i> Contact</a>
        </div>
      </div>
    </div>

    <div class="col p-1">
      <div class="card text-dark" style="width: 18rem;" id="box">
        <div class="card-body text-center">
          <div>
            <img src="./images/stacey.jpg" alt="" class="card-img img-fluid" style="width: 18rem;">
          </div>
          <h5 class="card-title">Stacey Beseni</h5>
          <h6>Cyber security</h6>
          <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque earum totam dolores quis odit perferendis nihil doloremque quibusdam excepturi consectetur.
          </p>
          <a href="#" class="btn btn-dark"><i class="fa fa-envelope"></i> Contact</a>
        </div>
      </div>
    </div>

    <div class="col p-1">
      <div class="card text-dark" style="width: 18rem;" id="box">
        <div class="card-body text-center">
          <div>
            <img src="./images/deen.jpg" alt="" class="card-img img-fluid" style="width: 18rem;">
          </div>
          <h5 class="card-title">Geraldine Gerald</h5>
          <h6>Software engineering</h6>
          <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque earum totam dolores quis odit perferendis nihil doloremque quibusdam excepturi consectetur.
          </p>
          <a href="#" class="btn btn-dark"><i class="fa fa-envelope"></i> Contact</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pricing Section -->
<section class="container-fluid p-5" id="pricing">
  <div class="container text-center">
    <h1>PRICING</h1>
    <p class="lead">Choose a pricing plan that fits your needs.</p>
  </div>
  
  <div class="row d-sm-flex justify-content-between align-items-center g-4 pb-5">
    <div class="col-md">
      <div class="card text-dark" style="width: 20rem; height: 450px;" id="box">
        <div class="card-body text-center">
          <h2 class="card-title text-light p-2" id="card-1">Free Trial</h2>
          <h3 class="card-text bg-light text-dark p-2">Use all the premium features for 7 days and then cancel anytime<br></h3>
          <p class="card-text lead p-2">
            Unlimited inquiries
          </p>
          <p class="card-text lead p-2">
            1 Free Consult with a Mentor
          </p>
          <button class="btn btn-lg" id="sign-up">Sign up</button>
        </div>
      </div>
    </div>


    <div class="col-md">
      <div class="card text-dark" style="width: 20rem; height: 500px;" id="box">
        <div class="card-body text-center">
          <h2 class="card-title text-light p-2" id="card-3">Premium</h2>
          <p class="card-text lead p-2">
            Unlimited inquiries
          </p>
          <p class="card-text lead p-2">
            Unlimited consults
          </p>
          <p class="card-text h1 p-2">
            R250
          </p>
          <p class="card-text lead p-2">
            per month
          </p>
          <button class="btn btn-lg" id="sign-up">Sign up</button>
        </div>
      </div>
    </div>

    <div class="col-md">
      <div class="card text-dark" style="width: 20rem; height: 450px;" id="box">
        <div class="card-body text-center">
          <h2 class="card-title text-light p-2" id="card-2">Basic Plan</h2>
          <p class="card-text lead p-2">
            Unlimited inquiries
          </p>
          <p class="card-text lead p-2">
            20 Consults a month
          </p>
          <p class="card-text h1 p-2">
            R100
          </p>
          <p class="card-text lead p-2">
            per month
          </p>
          <button class="btn btn-lg" id="sign-up">Sign up</button>
        </div>
      </div>
    </div>
</div>
</section>

<!--Contact-->
<section class="contact container-fluid text-light" id="mentors">
  <div class="container">
    <div class="subtitles text-center p-5">
      <h1>Contact one of our mentors!</h1>
      <h2>Leave them a message:</h2>

    </div>

    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Your First Name" required>
    </div>
    <div class="mb-3">
      <label for="last-name" class="form-label">Last Name:</label>
      <input type="text" class="form-control" id="last-name" placeholder="Your Last Name" required>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Email Address</label>
      <input type="email" class="form-control" id="email" placeholder="Your Email-address" required>
    </div>
    <div class="mb-3">
      <label for="text-area" class="form-label">Message:</label>
      <textarea id="text-area" rows="3" class="form-control" placeholder="Write something..."></textarea>
    </div>
    <div class="mb-3">
      <button class="submit" type="submit"><span>Submit 👀 </span></button>
    </div>
  </div>
</section>

<!--Profile-->
<div class="container mt-5" id="profile">  
  <h1 class="text-center text-light">Profile</h1>  
  <div class="row d-flex justify-content-center">    
      <div class="col-md-7">         
          <div class="card p-3 py-4"> 
                     
              <div class="text-center">
                  <img src="images/undraw_engineering_team_a7n2 (1).svg" width="400" class="rounded-circle">
              </div>
              
              <div class="text-center mt-3">
                  <span class="p-1 px-4 rounded text-white" id="card-3">Premium</span>
                  <h3 class="mt-2 mb-0">Jane Doe</h3>
                  <h4>UI/UX Designer</h4>
                  
                  <div class="px-4 mt-1">
                      <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                      <h4>Things I need help with:</h4>
                      <p>JavaScript</p>
                      <p>Python</p>
                      <p>CSS animations</p>
                      <h4>Email address:</h4>
                      <p>janedoe@gmail.com</p>
                      <h4>Location:</h4>
                      <p>Riversrand</p>
                      <h4>Date of birth</h4>
                      <p>00/00/00</p>
                  </div>
                  
                   <ul class="social-list">
                      <li><i class="fa fa-facebook"></i></li>
                      <li><i class="fa fa-dribbble"></i></li>
                      <li><i class="fa fa-instagram"></i></li>
                      <li><i class="fa fa-linkedin"></i></li>
                      <li><i class="fa fa-google"></i></li>
                  </ul>
                  
                  <div class="buttons">
                      <button class="btn btn-outline-primary px-4">Change</button>
                      <button class="btn btn-primary px-4 ms-3">Delete</button>
                  </div>
              </div>
          </div> 
      </div> 
  </div>
</div>

<!-- Footer -->
<footer class="text-center text-light bg-dark text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-linkedin"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>TechMentorHER
          </h6>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore molestias beatae minima voluptate illum alias!
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#about" class="text-reset">About</a>
          </p>
          <p>
            <a href="#work" class="text-reset">Our Work</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#pricing" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#contact" class="text-reset">Mentors</a>
          </p>
          <p>
            <a href="#contact" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fa fa-home me-3"></i> South Africa</p>
          <p>
            <i class="fa fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fa fa-phone me-3"></i> + 27 234 567 88</p>
          <p><i class="fa fa-print me-3"></i> + 27 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">TechMentorHER</a>
  </div>
  <!-- Copyright -->
</footer>
 
<script src="./script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js">
</script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js">
</script>

  </body>
</html>
