<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>TechMentorHer</title>
  </head>
  <body>
    <div class="container">
      <div class="box form-box">

      <?php
        include("php/config.php");
        if(isset($_POST["submit"])){
          $username = $_POST['username'];
          $email = $_POST['email'];
          $location = $_POST['location'];
          $idnumber = $_POST['idnumber'];
          $password = $_POST['password'];

          //verifying the unique email
          $verify_query = mysqli_query($con, "SELECT email from `users` WHERE email='$email'");

          if(mysqli_num_rows($verify_query) !=0){
            echo "<div class='message'>
                    <p>This email has been used, Try another one please.</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
          }
          else {
            mysqli_query($con, "INSERT INTO users(username, email, location, idnumber, password) VALUES('$username', '$email', '$location', '$idnumber', '$password')") or die('query failed');

            echo "<div class='message'>
                    <p>Registration Successful!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
          }
        } else {
      ?>

        <header>Create Your Account</header>
        <form action="" method="post">
          <div class="field input">
            <label for="username">Username</label>
            <input
              type="text"
              name="username"
              autocomplete="off"
              id="username"
              required
            />
          </div>

          <div class="field input">
            <label for="email">Email Address</label>
            <input
              type="text"
              name="email"
              id="email"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="location">Location</label>
            <input
              type="text"
              name="location"
              id="location"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="idnumber">ID Number</label>
            <input
              type="text"
              name="idnumber"
              id="idnumber"
              autocomplete="off"
              onclick="determineGender(idnumber)"
              required
            />
          </div>

          <div class="field input">
            <label for="username">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <input
              type="submit"
              name="submit"
              class="btn"
              value="Register"
              required
            />
          </div>

          <div class="links">
            Already have an account? <a href="index.php">Sign In</a>
          </div>
        </form>
      </div>
      <?php
        }
      ?>
    </div>
    <script>
      function determineGender(idnumber) {
        // Extract the 7th to 10th characters from the ID number
        const genderDigits = idNumber.substring(6, 10);

        // Convert the genderDigits to a number for comparison
        const genderCode = parseInt(genderDigits);

        // Check if the genderCode falls within the female range (0000-4999)
        if (genderCode >= 0 && genderCode <= 4999) {
          alert("Female");
        }
        // Check if the genderCode falls within the male range (5000-9999)
        else if (genderCode >= 5000 && genderCode <= 9999) {
          alert("Male");
        } else {
          alert("Gender not determined");
        }
      }

      // Example usage:
      //const idNumber = "1234567890"; // Replace with the user's ID number
      const idNumber = document.getElementById("idNumber");
      const gender = determineGender(idNumber);
      console.log("Gender:", gender);
    </script>
  </body>
</html>
