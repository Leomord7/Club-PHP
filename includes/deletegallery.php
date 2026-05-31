<?php
require('../config/database.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "DELETE FROM gallery WHERE id=$id";
    $run=mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='../admin/index.php?viewgallery=true';</script>";                    
      
          }
}
?>