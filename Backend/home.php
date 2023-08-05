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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>TechMentorHer</title>
  </head>
  <body>

   <?php

    $username = $_SESSION['idnumber'];
    $query = mysqli_query($con, "SELECT*FROM users WHERE idnumber=$idnumber");

    while($result = mysqli_fetch_assoc($query)){
      $res_uname = $result['username'];
      $res_email = $result['email'];
      $res_location = $result['location'];
      $res_IdNumber = $result['idnumber'];
    }

    echo "<a href='edit.php?username=$res_username'>Change Profile</a>";
    ?>
    <p>This is the homepage</p>
    <a href="logout.php"><button class="btn">Log out</button></a>

    <div class="main-box top">
      <div class="top">
        <div class="box">
          <p>Hello <b><?php echo $res_Uname; ?></b>👋🏽, Welcome to TechMentorHer!🎉</p>
        </div>

        <div class="box">
          <p>Your location is <b><?php echo $res_Location; ?></b>, Welcome to TechMentorHer!🎉</p>
        </div>
      </div>
    </div>

  </body>
</html>
