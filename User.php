<?php
include 'dbconn.php';
include('header.php');

$sql = "SELECT * FROM users WHERE user_type = 'renter'";
$result = mysqli_query($mysqli, $sql);
?>




<!DOCTYPE php>
<php lang="en">

  <head>
   <style>
      #tabedit {
        overflow-y: scroll;
        height: 70%;
        margin-top: 15px;
        overflow-x: scroll;
      }


      .tbhead {
        width: 80px;
        font-size: 18px;

      }

      #main {


        padding-top: 50px;
        padding-right: 20px;

      }

      .btnedit {
        color: white;
        background-color: #07103eee;
        margin-left: 410px;
      }
    </style>

  </head>

  <body>


   

      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="row" id="main">
            <div class="col-md-6 col-sm-6 col-xs-6 coledit">
              <h3>User/Renter List</h3>
            </div>


           
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 coledit">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div id="tabedit" class="table-responsive">
            <table class="table table-bordered table-striped">
              <!-- Add the 'table-bordered' and 'table-striped' classes for styling -->
              <thead style="position:sticky;top: 0;background-color:#283866; color:white;">
                <tr>
                  <th>User Id</th>
                  <th>User Type</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Zip-Code</th>
                  <th>Verification Type</th>
                  <th>Verification Proof</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td>
                      <?php echo $row['user_id']; ?>
                    </td>
                    <td>
                      <?php echo $row['user_type']; ?>
                    </td>
                    <td>
                      <?php echo $row['name']; ?>
                    </td>
                    <td>
                      <?php echo $row['email']; ?>
                    </td>
                    <td>
                      <?php echo $row['phone_number']; ?>
                    </td>
                    <td>
                      <?php echo $row['address']; ?>
                    </td>
                    <td>
                      <?php echo $row['city']; ?>
                    </td>
                    <td>
                      <?php echo $row['state']; ?>
                    </td>
                    <td>
                      <?php echo $row['zip_code']; ?>
                    </td>
                    <td>
                      <?php echo $row['doctype']; ?>
                    </td>
                    <td>
                      <a href="/uploads/<?php echo $row['document']; ?>"><?php echo $row['document']; ?></a>
                    </td>
                    <td>
                      
                      <a href="#" class="text-info delete-row" data-toggle="modal" data-target="#deleteModal">
                        <i class="glyphicon glyphicon-trash"></i>
                      </a>
                    </td>

                  </tr>


                <?php } ?>
              </tbody>

            </table>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="deleteModalLabel">Delete Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete this item?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btnedit" data-dismiss="modal"></i> No</button>
                    <button type="button" class="btn btn-default btnedit"> Yes</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <script>
      $(document).ready(function () {
        $('#searchInput').keyup(function () {
          var searchText = $(this).val().toLowerCase();
          // Loop through all table rows
          $('tbody tr').each(function () {
            var rowData = $(this).text().toLowerCase();
            if (rowData.indexOf(searchText) == -1) {
              $(this).hide();
            } else {
              $(this).show();
            }
          });
        });
      });
    </script>




    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</php>