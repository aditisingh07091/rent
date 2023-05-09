<?php
include('dbconn.php');
include('header.php');

?>
<!DOCTYPE php>
<php lang="en">

 <head>
<style>
      body {
        
     
        margin-top: 90px;
        
      }
    

    </style>

  </head>

  <body>


      <section class="main">

        <section class="tab-content">

          <section class="tab-pane active fade in content" id="dashboard">

            <div class="row">
              <div class="text-center">
                <div class="col-xs-6 col-sm-3">
                  <div class="panel panel-primary">
                    <a href="request.php" style="text-decoration:none;">
                      <div class="panel-body" style="background-color: #ffb0bfc4; ">


                        <h3>Requests: </h3>
                        <?php
                        $sql = "SELECT COUNT(*) as num_rows FROM requests";
                        $result = mysqli_query($mysqli, $sql);

                        // Check for errors
                        if (!$result) {
                          die("Error: " . mysqli_error($mysqli));
                        }

                        // Get the number of rows
                        $row = mysqli_fetch_assoc($result);
                        $num_rows = $row['num_rows'];

                        ?>
                        <p class="text-muted">Total Requests:
                          <?php echo $num_rows; ?>
                        <p>Find out Here</p>
                        </p>
                        <br><br><br><br>
                      </div>
                    </a>
                  </div>
                </div>


                <div class="col-xs-6 col-sm-3">
                  <div class="panel panel-success">
                  <a href="Provider.php" style="text-decoration:none;">
                    <div class="panel-body" style="background-color: #c5c6d2c4;">
                      <h3> Providers:</h3>
                      <?php
                      $sql = "SELECT COUNT(*) as num_rows FROM users WHERE user_type = 'provider'";
                      $result = mysqli_query($mysqli, $sql);

                      // Check for errors
                      if (!$result) {
                        die("Error: " . mysqli_error($mysqli));
                      }

                      // Get the number of rows
                      $row = mysqli_fetch_assoc($result);
                      $num_rows = $row['num_rows'];

                      ?>
                      <p class="text-muted">Total Providers:
                        <?php echo $num_rows; ?>
                      <p>Find out Here </p>
                      </p>

                      <br><br><br><br>
                    </div>
                    </a>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-3">
                  <div class="panel panel-danger">
                  <a href="User.php" style="text-decoration:none;">
                    <div class="panel-body" style="background-color: #beffb0c4;">
                      <h3> Renters:</h3>
                      <?php
                      $sql = "SELECT COUNT(*) as num_rows FROM users WHERE user_type = 'renter' ";

                      $result = mysqli_query($mysqli, $sql);

                      // Check for errors
                      if (!$result) {
                        die("Error: " . mysqli_error($mysqli));
                      }

                      // Get the number of rows
                      $row = mysqli_fetch_assoc($result);
                      $num_rows = $row['num_rows'];

                      ?>
                      <p class="text-muted">Total Renters:
                        <?php echo $num_rows; ?>
                      <p>Find out Here</p>
                      </p>
                      <br><br><br><br>
                    </div>
                    </a>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-3">
                  <div class="panel panel-warning">
                  <a href="Category.php" style="text-decoration:none;">
                    <div class="panel-body" style="background-color: #f8f68fc4;">
                      <h3> Categories:</h3>
                      <?php
                      $sql = "SELECT COUNT(*) as num_rows FROM admin_category_add";
                      $result = mysqli_query($mysqli, $sql);

                      // Check for errors
                      if (!$result) {
                        die("Error: " . mysqli_error($mysqli));
                      }

                      // Get the number of rows
                      $row = mysqli_fetch_assoc($result);
                      $num_rows = $row['num_rows'];

                      ?>
                      <p class="text-muted">Total Categories:
                        <?php echo $num_rows; ?>
                      <p>Find out Here</p>
                      </p>
                      <br><br><br><br>
                    </div>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-9">
                <div class="panel panel-primary">
                
                  <div class="panel-heading">
                    Overview section:
                  </div>
                  <div class="panel-body">
                    <div class="text-center">

                      <div class="col-md-6">
                        <h3>Total Rented/Booked Items</h3>
                        <?php
                        $sql = "SELECT COUNT(*) as num_rows FROM requests WHERE status = 1";
                        $result = mysqli_query($mysqli, $sql);

                        // Check for errors
                        if (!$result) {
                          die("Error: " . mysqli_error($mysqli));
                        }

                        // Get the number of rows
                        $row = mysqli_fetch_assoc($result);
                        $num_rows = $row['num_rows'];

                        ?>
                        <p class="text-muted">Total number of items booked or Rented:
                          <?php echo $num_rows; ?>
                        <p> <a href="Rented.php" target="_blank">Check Booked List Here </a></p>
                        </p>
                      </div>

                      <div class="col-md-6">
                        <h3>Total Products/Items</h3>
                        <?php
                        $sql = "SELECT COUNT(*) as num_rows FROM items";
                        $result = mysqli_query($mysqli, $sql);

                        // Check for errors
                        if (!$result) {
                          die("Error: " . mysqli_error($mysqli));
                        }

                        // Get the number of rows
                        $row = mysqli_fetch_assoc($result);
                        $num_rows = $row['num_rows'];

                        ?>
                        <p class="text-muted">Total number of items available for rent:
                          <?php echo $num_rows; ?>
                        <p> <a href="Item.php" target="_blank">Check Items List Here</a></p>
                        </p>
                      </div>

                    </div>
                    <br><br><br><br><br><br><br><br><br><br>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-3">
                <div class="panel panel-primary" style="height:273px;">
                  <div class="panel-heading">
                    Everything On Rent:
                  </div>
                  <div class="panel-body">
                    <strong>Note:</strong>
                    <p>Make sure to clear all pending requests from Providers and add Categories as per Provider and
                      Renter Conveniences!</p>
                  </div>
                </div>


              </div>

            </div>

          </section>

        </section>




      </section>

      

    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</php>