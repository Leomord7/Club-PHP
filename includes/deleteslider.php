<?php
require('../config/database.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "DELETE FROM sliders WHERE id=$id";
    $run=mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='../admin/index.php?viewslider=true';</script>";                    
      
          }
}
?>