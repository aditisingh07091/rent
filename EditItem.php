<?php include 'dbconn.php'; 
include('header.php');?>
<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Get the form data
    $item_id = $_POST['item_id'];

    $item_type = $_POST['item_type'];
    $item_name = $_POST['Item_name'];
    $item_description = $_POST['item_description'];
    $item_details = $_POST['item_details'];
    $terms = $_POST['terms'];

    if (!empty($_FILES['imag']['name'])) {
        $imag = $_FILES['imag']['name'];
        $img = $_FILES['imag']['name'];
        $images = "../uploads/" . basename($imag);
        move_uploaded_file($_FILES['imag']['tmp_name'], $images);
    } else {
        $imag = $_POST['old_image'];
    }


    // Update provider information in the database
    $sql = "UPDATE items SET item_type = '$item_type', Item_name = '$item_name', item_description = '$item_description', item_details = '$item_details', terms= '$terms', item_img = '$imag' WHERE item_id = '$item_id'";
    $result = mysqli_query($mysqli, $sql);



    if ($result) {

        // Redirect to the edit page with a success message
        header("Location: Item.php");
        // exit();
    } else {
        // Redirect to the edit page with an error message
        header("Location: EditItem.php?message=error");
        exit();
    }
} else {
    // Fetch the table details based on the ID parameter from the URL
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE item_id='$id'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);


    if (!$row) {
        // Redirect to the edit page with an error message
        header("Location: EditItem.php?message=notfound");
        exit();
    }
}

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


                padding-top: 60px;
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

            .broom {
                background-color: #07103e;
                border-color: white;
                color: white;
                width: 50%;
            }

            .broom:hover {
                background-color: white;
                border-color: #07103e;
                color: #07103e;
            }
        </style>

    </head>

    <body>


       
            <div class="Profile">
                <div class="container" style = "width:1100px;">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1" style="padding-top: 40px;">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #07103e; color:white;">
                                    <h2 class=" panel-title">Edit Item</h2>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="imag">Image:</label><br>
                                                <img class="item-img img-fluid" width="60%" src="../ads/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_img']; ?>">
                                                <input type="file" class="form-control-file" id="imag" name="imag">
                                                <input type="hidden" name="old_image" value="<?php echo $row['item_img']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="item_name">Item Name</label>
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $row['item_id'] ?>">
                                                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['Item_name'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="item-type">Item Type :</label>
                                                <?php
                                                $query = "SELECT * FROM admin_category_add";
                                                $result = mysqli_query($mysqli, $query);
                                                ?>
                                                <select class="form-control" id="item_type" name="item_type">
                                                    <?php
                                                    while ($rows = $result->fetch_assoc()) { ?>
                                                        <option value="<?php echo $rows['category_name']; ?>" 
                                                        <?php if ($rows['category_name'] == $row['item_type']) {
                                                                echo 'selected';
                                                            } ?>>
                                                        <?php echo $rows['category_name']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="item_description">Item Description</label>
                                                <textarea type="text" class="form-control" id="item_description" rows="4" value="<?php echo $row['item_description'] ?>" name="item_description"><?php echo $row['item_description'] ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="item_etails">Item Details</label>
                                                <textarea type="text" class="form-control" id="item_details" name="item_details" rows="4" value="<?php echo $row['item_details'] ?>"><?php echo $row['item_details'] ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="terms">Terms And Conditions</label>
                                                <textarea type="text" class="form-control" id="terms" rows="4" name="terms" value="<?php echo $row['terms'] ?>"><?php echo $row['terms'] ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                
                                                <input type="submit" name="save" class="btn btn-default broom" value="Save">
                                            </div>

                                        </div>
                                    </form>
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