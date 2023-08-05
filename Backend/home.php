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
    <p>This is the homepage</p>
    <?php

    $id = $_SESSION['id'];
    $query = mysqli_query($con, "SELECT*FROM users WHERE id=$id");

    while($result = mysqli_fetch_assoc($query)){
      $res_username = $result['username'];
      $res_email = $result['email'];
      $res_location = $result['location'];
      $res_id = $result['id'];

    }

    echo "<a href='edit.php?id=$res_id'>Change Profile</a>";
    ?>
    <a href="logout.php"><button class="btn">Log out</button></a>

    <div class="main-box top">
      <div class="top">
        <div class="box">
          <p>Hello <b>Dani</b>👋🏽, Welcome to TechMentorHer!🎉</p>
        </div>

        <div class="box">
          <p>Your location is <b>Riversands</b>, Welcome to TechMentorHer!🎉</p>
        </div>
      </div>
    </div>

  </body>
</html>
