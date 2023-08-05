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
        <header>Change Your Profile</header>
        <form action="" method="post">
          <div class="field input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required />
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
            <input
              type="submit"
              name="submit"
              class="btn"
              value="Update"
              required
            />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
