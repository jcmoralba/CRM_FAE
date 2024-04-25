<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Settings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      overflow: hidden;
      margin-bottom: 20px;
      background-color: #ccc;
      /* gray background */
    }

    /* Capitalize the first letter of each word in textboxes excluding email address */
    input[type="text"]:not(#email),
    textarea {
      text-transform: capitalize;
    }
  </style>
</head>
<?php include "sidebar.php" ?>

<body>
  <div class="container mt-5">

    <h1 class="mb-4">Profile Settings</h1>
    <form>
      <div class="row">
        <div class="col-md-4">
          <div class="profile-picture mx-auto">
            <img src="path_to_default_image.jpg" class="img-fluid" alt="">
          </div>
          <div class="mb-3">
            <label for="profilepicture" class="form-label">Change Profile Picture</label>
            <input type="file" class="form-control" id="profilepicture" name="profilepicture">
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" id="contact" name="contact">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>