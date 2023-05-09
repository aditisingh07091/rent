<?php
include 'dbconn.php';
include('header.php');
?>

<!DOCTYPE php>
<php lang="en">

  <head>
   <style>

      #tabedit {
        overflow-y: scroll;
        height: 80%;
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
  <?php
  if (isset($_POST['approve_user'])) {
    $user_id = $_POST['approved_id'];

    $permission = '1';
    $sql = "UPDATE users SET user_verif = $permission WHERE user_id = $user_id and user_type='provider'";
    $result = mysqli_query($mysqli, $sql);
    if ($result) {
      echo "<script>
    swal({
      title: 'Success!',
      text: 'Request Accepted as Provider!',
      icon: 'success',
      button: 'OK'
    }).then(function() {
      window.location.href='request.php';
    });
</script>";
    } else {
      echo "<script>
    swal({
      title: 'Error!',
      text: 'Not accepted!',
      icon: 'error',
      button: 'OK'
    });
</script>";
    }
  }

  if (isset($_POST['reject_user'])) {
  }
  ?>

  <body>


    
      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="row" id="main">
            <div class="col-md-6 col-sm-6 col-xs-6 coledit">
              <h3>Provider Requests</h3>
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
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>Address</th>
                 
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $sql = "SELECT * FROM users WHERE user_verif = '0' AND user_type = 'provider'";
                $result = mysqli_query($mysqli, $sql);

                $serial = 0;
                while ($row = $result->fetch_assoc()) {
                  $serial++;
                ?>
                  <tr>
                    <td><?php echo $serial ?></td>

                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                   
                    <form method="post" enctype="multipart/form-data">
                      <td>
                        <!-- Modal for approval -->
                        <div class="modal fade" id="approveModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel<?php echo $row['user_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="approveModalLabel<?php echo $row['user_id'] ?>">Confirm Approval</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="approved_id" value="<?php echo $row['user_id'] ?>">
                                Are you sure you want to approve this provider?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button name="approve_user" class="btn btn-primary">Yes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal for rejection -->
                        <div class="modal fade" id="rejectModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel<?php echo $row['user_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="rejectModalLabel<?php echo $row['user_id'] ?>">Confirm Rejection</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="rejected_id" value="<?php echo $row['user_id'] ?>">
                                Are you sure you want to reject this provider?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="reject_user" class="btn btn-danger">Yes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <a href="#" class="text-info" data-toggle="modal" data-target="#approveModal<?php echo $row['user_id'] ?>"><i class="glyphicon glyphicon-ok">Approve</i></a>&nbsp;<br>
                        <a href="#" class="text-info" data-toggle="modal" data-target="#rejectModal<?php echo $row['user_id'] ?>"><i class="glyphicon glyphicon-remove">Reject</i></a>&nbsp;<br>
                        <a href="view.php?id=<?php echo $row['user_id'] ?>" class="text-info"><i class="glyphicon glyphicon-eye-open">View</i></a>
                      </td>
                    </form>
                  </tr>
                <?php } ?>
              </tbody>


            </table>







          </div>
        </div>
      </div>

    </div>

    <script>
			$(document).ready(function() {
				$('#searchInput').keyup(function() {
					var searchText = $(this).val().toLowerCase();
					// Loop through all table rows
					$('tbody tr').each(function() {
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