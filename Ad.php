 
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
  background-color:#07103eee;
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
      border-top: 1px  solid;
      overflow-y: auto;
      background-color:#07103eee;
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

.navbar-logo{
  color: white;
  font-size:x-large;
  }
    .navbar {
  background-color:#07103eee;
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
.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
  color: #ffffff;
  background-color: darkgray;
}
@media (min-width: 768px){
.navbar-nav>li>a {
    padding-top: 25px;
    padding-bottom: 15px;
}}
#tabedit
{
     overflow-y:scroll ;
     height:380px;
     margin-top: 15px;
     overflow-x:scroll ;
}


.tbhead
{
  width:80px;
  font-size:18px;
  
}

#main{
   
  
  padding-top: 50px;
  padding-right: 20px;

}

.btnedit{
  color:white ;
  background-color: #07103eee;
  margin-left: 410px;
}

.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
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
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a style="padding-top: 20px;font-size:25px; color:white"class="navbar-logo" href="admin.php"></a>
               <img src="logo.png" width="40">&nbsp;</a>Everything On Rent
 
           </div>
           <!-- Top Menu Items -->
           <ul class="nav navbar-nav navbar-right">
             <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                     <span class="glyphicon glyphicon-th"></span> Info <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                     <li><a href="Profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
              
                   <li role="separator" class="divider"></li>
                   
                   <li><a href="Adminlogin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                 </ul>
               </li>
           </ul>
           <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
              <li>
                <a href="admin.php" class="active"><i class="glyphicon glyphicon-dashboard"></i>&nbsp;Dashboard</a>
              </li>
              <li >
                <a href="request.php"><i class="glyphicon glyphicon-heart"></i>&nbsp; Requests</a>
              </li>
              <li>
                <a href="Category.php"><i class="glyphicon glyphicon-th-list"></i>&nbsp; Add Category</a>
              </li>
              <li>
             
              <li> <a href="Item.php"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Items</a></li>
              <li class="active"> <a href="Ad.php"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp;Ads</a></li>
              <li> <a href="Provider.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Providers</a></li>
              <li><a href="User.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Users</a></li>
              <li> <a href="Rented.php"><i class="glyphicon glyphicon-transfer"></i>&nbsp;rented Items</a></li>
             </ul>
           </div>
           <!-- /.navbar-collapse -->
       </nav>

       <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">
                <div class="col-md-6 col-sm-6 col-xs-6 coledit">
                    <h4>Ads List</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 coledit">
                    <a href="#"><button type="button" class="btn btn-lg  btnedit">Add 
                            details</button></a>
                    </a>
                    <!--end::Button-->
                </div>
            </div>
            <div id="tabedit" class="table-responsive">
              <table class="table table-bordered table-striped">
                <!-- Add the 'table-bordered' and 'table-striped' classes for styling -->
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Category</th>
                    
                    <th>Brand Name</th>
                    <th>Payment</th>
                    <th>Time period</th>
                    <th>Actions</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Category1</td>
                    
                    <td>Name</td>
            <td>8000</td>
            <td>2023-03-22</td>
            <td>
            <a href="EditAd.php" class="text-info">
              <i class="glyphicon glyphicon-edit"></i>
              </a>&nbsp;
              <a href="#" class="text-info delete-row" data-toggle="modal" data-target="#deleteModal">
              <i class="glyphicon glyphicon-trash"></i>
              </a>
            </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Category2</td>
                    
                    <td>Name</td>
                     <td>8000</td>
            <td>2023-03-22</td>
            <td>
            <a href="EditAd.php" class="text-info" >
              <i class="glyphicon glyphicon-edit"></i>
              </a>&nbsp;
              <a href="#" class="text-info delete-row" data-toggle="modal" data-target="#deleteModal">
              <i class="glyphicon glyphicon-trash"></i>
              </a>
            </td>
                  </tr>
                  <tr>
                    <td>1</td>
                      <td>Category3</td>
                     
                      <td>Name</td>
                      <td>8000</td>
            <td>2023-03-20</td>
            <td>
            <a href="EditAd.php" class="text-info">
              <i class="glyphicon glyphicon-edit"></i>
              </a>&nbsp;
              <a href="#" class="text-info delete-row" data-toggle="modal" data-target="#deleteModal">
              <i class="glyphicon glyphicon-trash"></i>
              </a>
            </td>
            
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Category4</td>
                      
                      <td>Name</td>
                       <td>8000</td>
            <td>2023-03-22</td>
            <td>
            <a href="EditAd.php" class="text-info">
              <i class="glyphicon glyphicon-edit"></i>
              </a>&nbsp;
              <a href="#" class="text-info delete-row" data-toggle="modal" data-target="#deleteModal">
              <i class="glyphicon glyphicon-trash"></i>
              </a>
            </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Category5</td>
                      
                      <td>Name</td>
                       <td>8000</td>
            <td>2023-03-22</td>
            <td>
            <a href="EditAd.php" class="text-info" >
              <i class="glyphicon glyphicon-edit"></i>
              </a>&nbsp;
              <a href="#" class="text-info delete-row" data-toggle="modal" data-target="#deleteModal">
              <i class="glyphicon glyphicon-trash"></i>
              </a>
            </td>
                    </tr>
                    
                   
                  
                </tbody>
              </table>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="deleteModalLabel">Delete Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
 
   

 
     <!-- jQuery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- Bootstrap JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </body>
   </php>  
   
  