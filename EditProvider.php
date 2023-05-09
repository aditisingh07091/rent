<?php

$conn = mysqli_connect("localhost", "root", "", "everything");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $img = $_FILES['image']['name'];
        $images = "../profilePic/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $images);
    } else {
        $image = $_POST['old_image'];

    }
    // $document = $_POST['document'];
    // Check if the form has been submitted
    if (!empty($_FILES['new_document']['name'])) {
        // Process the form data
        // Get the file details
        $new_document = $_FILES['new_document']['name'];
        $fileTmpName = $_FILES['new_document']['tmp_name'];
        $fileSize = $_FILES['new_document']['size'];
        $fileError = $_FILES['new_document']['error'];

        // Perform validations
        if ($fileError === UPLOAD_ERR_OK) {
            // File uploaded successfully
            // Move the uploaded file to the desired location
            move_uploaded_file($fileTmpName, '../uploads/' . $fileName);
            echo 'File uploaded successfully!';
        } else {
            echo 'Error uploading file. Please try again.';
        }
    } else {
        // Display the form with the current document details
        $new_document = $_POST['old_document']; // Replace with your code to retrieve the current document from the database or file system
    }





    // Update provider information in the database
    $sql = "UPDATE users SET name = '$name', username = '$username', address = '$address', city = '$city', state = '$state', zip_code = ' $zip_code', profile_pic = '$image', document = '$new_document' WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql); // Replace 'mysqli' with your preferred database extension

    if ($result) {

        // Redirect to the edit page with a success message
        header("Location: Provider.php");
        // exit();
    } else {
        // Redirect to the edit page with an error message
        header("Location: EditProvider.php?message=error");
        exit();
    }
} else {
    // Fetch the provider details based on the ID parameter from the URL
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if provider is found in the database
    if (!$row) {
        // Redirect to the edit page with an error message
        header("Location: EditProvider.php?message=notfound");
        exit();
    }
}
?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <title>Rent Admin Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="custom.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

        <style>
            @media(min-width:768px) {
                body {
                    margin-top: 50px;
                }


            }

            #wrapper {
                padding-left: 0;
            }

            #page-wrapper {
                width: 100%;
                padding: 0;
                background-color: #fff;

            }

            @media(min-width:768px) {
                #wrapper {
                    padding-left: 225px;
                }

                #page-wrapper {
                    padding: 22px 10px;
                }
            }



            .top-nav {
                padding: 0 15px;
            }

            .top-nav>li {
                display: inline-block;

            }

            .top-nav>li>a {
                padding-top: 20px;
                padding-bottom: 20px;
                line-height: 20px;
                color: #fff;
            }

            .top-nav>li>a:hover,
            .top-nav>li>a:focus,
            .top-nav>.open>a,
            .top-nav>.open>a:hover,
            .top-nav>.open>a:focus {
                color: #fff;
                background-color: #ffffff;
            }

            .top-nav>.open>.dropdown-menu {
                float: left;
                position: absolute;
                margin-top: 0;
                /*border: 1px solid rgba(0,0,0,.15);*/
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                background-color: #fff;
                -webkit-box-shadow: 0 6px 12px #ffffff;
                box-shadow: 0 6px 12px white;
            }

            .top-nav>.open>.dropdown-menu>li>a {
                white-space: normal;
            }

            /* Side Navigation of admin*/

            @media(min-width:768px) {
                .side-nav {
                    position: fixed;
                    top: 60px;
                    left: 225px;
                    width: 225px;
                    margin-left: -225px;
                    border: none;
                    border-radius: 0;
                    border-top: 1px solid;
                    overflow-y: auto;
                    background-color: #07103eee;
                    /*background-color: #5A6B7D;*/
                    bottom: 0;
                    overflow-x: hidden;
                    padding-bottom: 40px;
                }

                .side-nav>li>a {
                    width: 225px;
                    border-bottom: 1px #07103eee solid;
                }

                .side-nav li a:hover,
                .side-nav li a:focus {
                    outline: none;
                    background-color: #07103eee !important;
                    color: #ffffff;
                }
            }

            .side-nav>li>ul {
                padding: 0;
                border-bottom: 1px rgba(121, 18, 18, 0.3) solid;
            }

            .side-nav>li>ul>li>a {
                display: block;
                padding: 10px 15px 10px 38px;
                text-decoration: none;
                /*color: #999;*/
                color: #ffffff;
            }

            .side-nav>li>ul>li>a:hover {
                color: #ffffff;
            }

            .navbar .nav>li>a>.label {
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                border-radius: 50%;
                position: absolute;
                top: 14px;
                right: 6px;
                font-size: 10px;
                font-weight: normal;
                min-width: 15px;
                min-height: 15px;
                line-height: 1.0em;
                text-align: center;
                padding: 2px;
            }

            .navbar .nav>li>a:hover>.label {
                top: 10px;

            }

            .navbar-default .navbar-nav>li>a:hover {
                color: white;
            }

            .navbar-logo {
                color: white;
                font-size: x-large;
            }

            .navbar {
                background-color: #07103eee;
                color: white;
                font-size: 16px;
            }


            .vis {
                text-align: center;
                height: 400px;
            }

            .vis1 {
                text-align: center;
                height: 400px;
            }

            .navbar-default .navbar-nav>li>a {
                color: currentColor;
            }

            .navbar-default .navbar-nav>.active>a,
            .navbar-default .navbar-nav>.active>a:focus,
            .navbar-default .navbar-nav>.active>a:hover {
                color: #ffffff;
                background-color: darkgray;
            }

            @media (min-width: 768px) {
                .navbar-nav>li>a {
                    padding-top: 25px;
                    padding-bottom: 15px;
                }
            }

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

            .navbar-default .navbar-nav>.open>a,
            .navbar-default .navbar-nav>.open>a:focus,
            .navbar-default .navbar-nav>.open>a:hover {
                color: white;
                background-color: #e7e7e7;
            }
        </style>

    </head>

    <body>


        <div id="throbber" style="display:none; min-height:120px;"></div>
        <div id="noty-holder"></div>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a style="padding-top: 20px;font-size:25px; color:white" class="navbar-logo" href="admin.php"></a>
                    <img src="logo.png" width="40">&nbsp;</a>Everything On Rent

                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="glyphicon glyphicon-th"></span> Info <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>

                            <li role="separator" class="divider"></li>

                            <li><a href="Adminlogin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="admin.php" class="active"><i
                                    class="glyphicon glyphicon-dashboard"></i>&nbsp;Dashboard</a>
                        </li>
                        <li>
                            <a href="request.php"><i class="glyphicon glyphicon-heart"></i>&nbsp; Requests</a>
                        </li>
                        <li>
                            <a href="Category.php"><i class="glyphicon glyphicon-th-list"></i>&nbsp; Add Category</a>
                        </li>
                        <li>

                        <li> <a href="Item.php"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Items</a></li>
                        <li> <a href="Ad.php"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp;Ads</a></li>
                        <li class="active"> <a href="Provider.php"><i
                                    class="glyphicon glyphicon-user"></i>&nbsp;Providers</a></li>
                        <li><a href="User.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Users(Renter)</a></li>
                        <li> <a href="Rented.php"><i class="glyphicon glyphicon-transfer"></i>&nbsp;rented Items</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div class="Profile">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #07103e; color:white;">
                                    <h2 class=" panel-title">Provider Profile</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="image">Image:</label><br>
                                                <img class="item-img img-fluid" width="60%"
                                                    src="../profilePic/<?php echo $row['profile_pic']; ?>"
                                                    alt="<?php echo $row['profile_pic']; ?>">
                                                <input type="file" class="form-control-file" id="image" name="image">
                                                <input type="hidden" name="old_image"
                                                    value="<?php echo $row['profile_pic']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="name"> Name</label>
                                                <input type="hidden" class="form-control" name="user_id"
                                                    value="<?php echo $row['user_id'] ?>">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="<?php echo $row['name'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="username">User Name</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    value="<?php echo $row['username'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control" id="email" readonly
                                                    value="<?php echo $row['email'] ?>" name="email">
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="tel" class="form-control" id="phone" readonly
                                                    value="<?php echo $row['phone_number'] ?>">
                                            </div>

                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="<?php echo $row['address'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="<?php echo $row['city'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" name="state"
                                                value="<?php echo $row['state'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="zip_code">Zip Code</label>
                                            <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                value="<?php echo $row['zip_code'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="doctype">Verificaton Type</label>
                                            <input type="text" class="form-control" id="doctype" name="doctype"
                                                value="<?php echo $row['doctype'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="new_document">Verification Proof</label>

                                            <a href="../uploads/<?php echo $row['document']; ?>" target="_blank"><?php echo $row['document']; ?></a><br><br>
                                            <label for="new_document">new Document:</label>
                                            <input type="file" class="form-control-file" id="new_document"
                                                name="new_document">
                                            <input type="hidden" class="form-control" id="old_document"
                                                name="old_document" value="<?php echo $row['document'] ?>">
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-default broom" value="Save">


                                        </form>
                                    </div>
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