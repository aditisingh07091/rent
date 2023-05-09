 
<?php
include 'dbconn.php';
include('header.php');
// create SQL query
$sql = "SELECT r.req_id, r.item_id, r.user_id, r.status, i.Item_name,r.startDate, r.endDate, u_r.name AS renter_name, u_p.name AS provider_name
FROM requests r
JOIN items i ON r.item_id = i.item_id
JOIN users u_r ON r.user_id = u_r.user_id AND u_r.user_type = 'renter'
JOIN users u_p ON i.user_id = u_p.user_id AND u_p.user_type = 'provider'
WHERE r.status = 1";


// execute query
$result = mysqli_query($mysqli, $sql);

// check if query was successful
if (!$result) {
    echo "Error: " . mysqli_error($mysqli);
    exit;
}



// close database connection
mysqli_close($mysqli);
?>


 <!DOCTYPE php>
 <php lang="en">
 <head>
  <style>
 
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
   
  
  padding-top: 120px;
  padding-right: 20px;

}

.btnedit{
  color:white ;
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
                    <h3>Rented/Booked Items List</h3>
                </div>
               
            </div>
            <div id="tabedit" class="table-responsive">
              <table class="table table-bordered table-striped">
                <!-- Add the 'table-bordered' and 'table-striped' classes for styling -->
                <thead style="position:sticky;top: 0;background-color:#283866; color:white;">
                  <tr>
                    <th>Item Id</th>
                    <th>User Id</th>
                    <th>Item Name</th>
                    <th>Renter Name</th>
                    <th>Provider Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                   
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>

                  <td><?php echo $row['item_id']; ?></td>
                  <td><?php echo $row['user_id']; ?></td>
                  <td><?php echo $row['Item_name']; ?></td>
                  <td><?php echo $row['renter_name']; ?></td>
                  <td><?php echo $row['provider_name']; ?></td>
                  <td><?php echo $row['startDate']; ?></td> 
                  <td><?php echo $row['endDate']; ?></td>


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

   