<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"
    /> -->
    <title>TechMentorHer</title>
  </head>
  <body>
    <div class="container">
      <div class="box form-box">
        <?php

          include("php/config.php");
          if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'") or die('query failed');
            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
              $_SESSION['valid'] = $row['email'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['location'] = $row['location'];
              $_SESSION['idnumber'] = $row['idnumber'];
              $_SESSION['id'] = $row['id'];
            }else {
              echo "<div class='message'>
                    <p>Wrong Username or Password</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Go Back</button>";
            }
            if(isset($_SESSION['valid'])){
              header("Location: home.php");
            }
          }else{

        ?>
        <header>Login</header>
        <form action="" method="post">
          <div class="field input">
            <label for="email">Email</label>
            <input type="text" name="email" autocomplete="off" id="email" required />
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" autocomplete="off" id="password" required />
          </div>

          <div class="field input">
            <input
              type="submit"
              name="submit"
              class="btn"
              value="Login"
              required
            />
          </div>

          <div class="links">
            Don't have an account? <a href="register.php">Sign Up Now</a>
          </div>
        </form>
      </div>
      <?php
          }
      ?>
    </div>
  </body>
</html>
