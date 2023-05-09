<?php
include 'dbconn.php';
include('header.php');

// Check if the id parameter is present in the query string
if (isset($id)) {
  $id = $_GET['id'];

  // Fetch the user's data from the database
  $user_query = "SELECT * FROM admin_profile WHERE id='1'";
  $user_result = $mysqli->query($user_query);
  $user_data = $user_result->fetch_assoc();

  //profile
if ($user_data['profile_pic']) {
  $_filename = $user_data['profile_pic'];
} else {
  $_filename = "bahubali.jpeg";
}
}

// Process the form data

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $company = $_POST['company'];

  if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
    $filename = $_FILES['profile_pic']['name'];
    $tempname = $_FILES['profile_pic']['tmp_name'];
    $folder = "../images/";

    // Move the uploaded file to the designated folder
    move_uploaded_file($tempname, $folder . $filename);
  } else {
    // $user_data should contain the user's current profile data
    $filename = $_POST['old_image'];
  }
  // echo $filename;
  // die;
  $id = 1;
  // Update the user's profile
  $update_query = "UPDATE admin_profile SET name='$name',email='$email',phone='$phone',company='$company',profile_pic='$filename' WHERE id='$id'";
  
  $result = $mysqli->query($update_query);
  
  if ($result) {
    echo "<script>alert('Profile Updated Successfully!');
            window.location.href='Profile.php';</script>";
  }
}
?>

<!DOCTYPE php>
<php lang="en">

  <head>
   <style>


      .btnedit {
        color: white;
        background-color: #07103eee;
        margin-left: 364px;
      }

      .avatar {
        width: 200px;
        height: 200px;
      }

      @media (min-width: 1200px) {
        .container {
          width: 1118px;
        }
      }
    </style>

  </head>

  <body>


   

      <?php
      $sql = "SELECT * FROM admin_profile";
      $result = mysqli_query($mysqli, $sql);
      $admin_data = mysqli_fetch_assoc($result);
      if ($admin_data['profile_pic']) {
        $_filename = $admin_data['profile_pic'];
      } else {
        $_filename = "bahubali.jpeg";
      }
      ?>
      <div class="Profile">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top: 20px;">
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #07103e; color:white;">
                  <h2 class=" panel-title">Provider Profile</h2>
                </div>
                <div class="panel-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="profile_pic">Profile Picture</label>
                        <div class="row">
                          <div class="col-xs-9 col-md-6">
                            <a href="#" class="thumbnail">
                              <!-- <img src="images/profile.jpeg" class="img" alt="..." width="304"
                            height="236"  > -->
                              <img src="../images/<?php echo $_filename; ?>" class="img"
                                alt="<?php echo $_filename; ?>" width="304" height="236">
                            </a>
                          </div>
                          <div class="col-xs-6 col-md-9">
                            <input type="file" id="profile_pic" name="profile_pic">
                            <input type="hidden" id="old_image" name="old_image" value="<?php echo $_filename; ?>">

                            <p class="help-block">Upload a new profile picture.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                          value="<?php echo $admin_data['name'] ?>">
                      </div>

                      <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" readonly
                          value="<?php echo $admin_data['email'] ?>" name="email">
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                          value="<?php echo $admin_data['phone'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company"readonly
                          value="<?php echo $admin_data['company'] ?>">
                      </div>
                      <input type="submit" name="save" class="btn btn-default broom" value="Save">
                      <a href="change.php" class="btn btn-default broom">Change Password</a>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>




    </div>





    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</php>