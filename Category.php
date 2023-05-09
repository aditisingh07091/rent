<?php
include('dbconn.php');
include('header.php');

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

      .navbar-default .navbar-nav>.open>a,
      .navbar-default .navbar-nav>.open>a:focus,
      .navbar-default .navbar-nav>.open>a:hover {
        color: white;
        background-color: #e7e7e7;
      }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <?php
  if (isset($_POST['add_category'])) {

    // Get the form data
    $category_name = $_POST['category_name'];
    $category = strtolower($category_name);

    // Check if the category name already exists in the database
    $sql = "SELECT category_name FROM admin_category_add";
    $result = mysqli_query($mysqli, $sql);

    $category_exists = false;
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['category_name'] == $category) {
        $category_exists = true;
        break;
      }
    }

    if ($category_exists) {
      // Display an error message to the user
      echo "<script>
                  swal({
                    title: 'Error!',
                    text: 'Category already exists!',
                    icon: 'error',
                    button: 'OK'
                  });
              </script>";
    } else {
      // Insert the form data into the database table
      $sql = "INSERT INTO admin_category_add (category_name) VALUES ('$category')";
      if (mysqli_query($mysqli, $sql)) {
        // Display a success message to the user
        echo "<script>
                  swal({
                    title: 'Success!',
                    text: 'Category Added!',
                    icon: 'success',
                    button: 'OK'
                  }).then(function() {
                    window.location.href='Category.php';
                  });
              </script>";
      } else {
        // Display an error message to the user
        echo "<script>
                  swal({
                    title: 'Error!',
                    text: 'Category not added!',
                    icon: 'error',
                    button: 'OK'
                  });
              </script>";
      }
    }
  }
  ?>


  <?php
  if (isset($_POST['edit_category'])) {
    // Get the form data
    $cate_id = $_POST['cat_id'];
    $category_name = $_POST['category_name'];
    $sql = "UPDATE admin_category_add SET  category_name = '$category_name' WHERE category_id='$cate_id'";

    if (mysqli_query($mysqli, $sql)) {
      echo "<script>
                swal({
                  title: 'Success!',
                  text: 'Category Updated!',
                  icon: 'success',
                  button: 'OK'
                }).then(function() {
                  window.location.href='Category.php';
                });
            </script>";
    } else {
      echo "<script>
                swal({
                  title: 'Error!',
                  text: 'Not Updated!',
                  icon: 'error',
                  button: 'OK'
                });
            </script>";
    }
  }

  if (isset($_POST['delete_category'])) {
    $catId = $_POST['cate_id'];

    $sql = "DELETE FROM admin_category_add WHERE category_id = '$catId' ";

    if (mysqli_query($mysqli, $sql)) {
      echo "<script>
              swal({
                title: 'Success!',
                text: 'Deleted Category Data!',
                icon: 'success',
                button: 'OK'
              }).then(function() {
                window.location.href='Category.php';
              });
            </script>";
    } else {
      echo "<script>
                swal({
                  title: 'Error!',
                  text: 'Not Not Deleted!',
                  icon: 'error',
                  button: 'OK'
                });
            </script>";
    }
  }
  ?>


  <body>
    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row" id="main">
          <div class="col-md-6 col-sm-6 col-xs-6 coledit">
            <h3>Category List</h3>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 coledit">
            <button type="button" class="btn btn-lg  btnedit" data-toggle="modal" data-target="#categoryModal">Add
              Category</button>
            <!-- Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                      <h4 class="modal-title" id="categoryModalLabel">Add Category</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <!-- Category form -->

                      <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Enter category name">
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <input type="submit" name="add_category" value="Save" class="btn btn-primary">

                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!--end::Button-->
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
                <th>S No.</th>
                <th>Category Id</th>
                <th>Category Name</th>
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM admin_category_add";
              $result = mysqli_query($mysqli, $sql);
              $serial = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                $serial++;
                ?>

                <tr>
                  <td>
                    <?php echo $serial; ?>
                  </td>
                  <td>
                    <?php echo $row['category_id']; ?>
                  </td>
                  <td>
                    <?php echo $row['category_name']; ?>
                  </td>
                  <td>
                    <a href="#" class="text-info" data-toggle="modal"
                      onclick="editCate('<?php echo $row['category_id']; ?>','<?php echo $row['category_name']; ?>')"
                      data-target="#editCategoryModal">
                      <i class="glyphicon glyphicon-edit"></i>
                    </a>&nbsp;

                    <a href="#" class="text-info delete-row" data-toggle="modal"
                      data-target="#deleteModal<?php echo $row['category_id']; ?>">
                      <i class="glyphicon glyphicon-trash"></i>
                    </a>
                  </td>
                </tr>

                <div class="modal fade" id="deleteModal<?php echo $row['category_id']; ?>" tabindex="-1" role="dialog"
                  aria-labelledby="deleteModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                          <h4 class="modal-title" id="deleteModalLabel">Delete Item</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                              aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="cate_id" value="<?php echo $row['category_id']; ?>">
                          <p>Are you sure you want to delete this item?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal"><i
                              class="glyphicon glyphicon-remove"></i> No</button>
                          <button type="submit" name="delete_category" value="1" class="btn btn-danger"><i
                              class="glyphicon glyphicon-trash"></i> Yes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <input type="hidden" id="cat_id" name="cat_id">
              <h4 class="modal-title" id="categoryModalLabel">Edit Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
              <!-- Category form -->

              <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name"
                  value="<?php echo $row['category_name'] ?>">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <input type="submit" name="edit_category" value="Save" class="btn btn-primary">

            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Delete Modal -->
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
    <script>
      function editCate(id, name) {
        $('#category_name').val(name);
        $('#cat_id').val(id);
      }
    </script>
    <script>
      $(document).on("click", ".delete-row", function () {
        var catId = $(this).data('catid');
        $("#cat_id").val(catId);
      });
    </script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>