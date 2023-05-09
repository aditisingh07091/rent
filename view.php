<?php include 'dbconn.php';
include('header.php'); ?>
<!DOCTYPE php>
<php lang="en">

  <head>
    <style>


      .tbhead {
        width: 80px;
        font-size: 18px;

      }

      .view {


        padding-top: 80px;
        padding-right: 20px;

      }

      .btnedit {
        color: white;
        background-color: #07103eee;

      }

      @media (min-width: 1200px) {
        .container {
          width: 1120px;
        }
      }



      .table-bordered {
        border: 6px solid #a09db3;
      }
    </style>

  </head>

  <body>


   
      <?php
      if (isset($_GET['id'])) {
        $userid = $_GET['id'];
        $sql = "SELECT * FROM users WHERE user_id = $userid";
        $result = mysqli_query($mysqli, $sql);
        if (!$result) {
          die("Query failed: " . mysqli_error($mysqli));
        }

        $row = mysqli_fetch_assoc($result);
      ?>
        <div class="container view">
          <h1 class="text-center">Request Details</h1>
          <div class="row">
            <div class="col-md-12 ">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>User id</th>
                    <td><?php echo $row['user_id']; ?></td>
                  </tr>
                  <tr>
                    <th>User Type</th>
                    <td><?php echo $row['user_type']; ?></td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td><?php echo $row['name']; ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                    <th>Phone No</th>
                    <td><?php echo $row['phone_number']; ?></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td><?php echo $row['address']; ?></td>
                  </tr>
                  <tr>
                    <th>Verification Type</th>
                    <td><?php echo $row['doctype']; ?></td>
                  </tr>
                  <tr>
                    <th>Verification Document</th>
                    <td>
                      <a href="<?php echo $row['document']; ?>" target="_blank">View Document</a>
                    </td>
                  </tr>
                  <tr>
                    <th>Username</th>
                    <td><?php echo $row['username']; ?></td>
                  </tr>
                </tbody>
              </table>
            <?php
          }
            ?>

            <div class="text-center">
              <a href="request.php" class="btn btn-primary btnedit">Back</a>
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