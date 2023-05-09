<?php include 'auth.php';?>
<?php
// Get the current page name or identifier
$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$pageName = end($parts);
// You can update this logic to determine the current page name or identifier as needed

// Initialize the $currentPage variable
$currentPage = '';

// Set the $currentPage variable based on the current page name or identifier
if ($pageName == 'admin.php') {
  $currentPage = 'admin';
} elseif ($pageName == 'request.php') {
  $currentPage = 'request';
} elseif ($pageName == 'request2.php') {
  $currentPage = 'request2';
} elseif ($pageName == 'Provider.php') {
  $currentPage = 'Provider';
} elseif ($pageName == 'User.php') {
  $currentPage = 'User';
} elseif ($pageName == 'Rented.php') {
  $currentPage = 'Rented';
} elseif ($pageName == 'Category.php') {
  $currentPage = 'Category';
} elseif ($pageName == 'Item.php') {
  $currentPage = 'Item';
}
// Add more conditions to set $currentPage for other pages as needed
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

      .main {
        padding-top: 25px;
        padding-right: 30px;
        padding-left: 10px;
      }
    </style>

  </head>

  <body>


    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="top: 0;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
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
              <span class="glyphicon glyphicon-th"></span>
              <?php echo $_SESSION['email'] ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              
              <li><a href="Profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>

              <li role="separator" class="divider"></li>

              <li><a href="Category_data.php?adminlogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          
            <ul class="nav navbar-nav side-nav">
            <li <?php if ($currentPage == 'admin') { echo 'class="active"';} ?>><a href="admin.php"><i class="glyphicon glyphicon-dashboard"></i>&nbsp;Dashboard</a></li>
            <li <?php if ($currentPage == 'request') { echo 'class="active"';} ?>><a href="request.php"><i class="glyphicon glyphicon-heart"></i>&nbsp; Provider Requests</a></li>
            <li <?php if ($currentPage == 'request2') { echo 'class="active"';} ?>><a href="request2.php"><i class="glyphicon glyphicon-heart"></i>&nbsp; Item Requests</a></li>
            <li <?php if ($currentPage == 'Category') { echo 'class="active"';} ?>><a href="Category.php"><i class="glyphicon glyphicon-th-list"></i>&nbsp; Add Category</a></li>
            <li <?php if ($currentPage == 'Item') { echo 'class="active"';} ?>> <a href="Item.php"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Items</a></li>
            <li <?php if ($currentPage == 'Provider') { echo 'class="active"';} ?>> <a href="Provider.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Providers</a></li>
            <li <?php if ($currentPage == 'User') { echo 'class="active"';} ?>><a href="User.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Users(Renter)</a></li>
            <li <?php if ($currentPage == 'Rented') { echo 'class="active"';} ?>> <a href="Rented.php"><i class="glyphicon glyphicon-transfer"></i>&nbsp;rented Items</a></li>
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->
      </nav>