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
        $sql = "SELECT * FROM items WHERE user_id = $userid";
        $result = mysqli_query($mysqli, $sql);
        if (!$result) {
          die("Query failed: " . mysqli_error($mysqli));
        }

        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container view">
          <h1 class="text-center">Item Details</h1>
          <div class="row">
            <div class="col-md-12 ">
              <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Item Image</th>
                    <td><img width="200" src="../ads/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_img']; ?>"></td>
                  </tr>
                  <tr>
                    <th>Owner id</th>
                    <td>
                      <?php echo $row['user_id']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Item id</th>
                    <td>
                      <?php echo $row['item_id']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Item Type</th>
                    <td>
                      <?php echo $row['item_type']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Item Name</th>
                    <td>
                      <?php echo $row['Item_name']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Item Description</th>
                    <td>
                      <?php echo $row['item_description']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th> Item Details</th>
                    <td>
                      <?php echo $row['item_details']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Terms and Conditions</th>
                    <td>
                      <?php echo $row['terms']; ?>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
              <?php
      }
      ?>

            <div class="text-center">
              <a href="item.php" class="btn btn-primary btnedit">Back</a>
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