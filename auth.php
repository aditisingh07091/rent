<?php    
if($_SESSION['is_login'] != true){
  header('Location: adminlogin.php');
}
?>