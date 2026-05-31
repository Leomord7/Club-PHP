<?php
require('../config/database.php');
if (isset($_POST['update-about'])) {


  $desc = mysqli_real_escape_string($conn, $_POST['description']);
 $id=$_POST['about_id'];
 $title = $_POST['title'];
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM about_us WHERE $id";
    $r = mysqli_query($conn, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['pic'];
  }


  move_uploaded_file($imgtemp, "../img/$imagename");

  $query = "UPDATE about_us SET ";

  $query .= "image='$imagename',";

  // $descrip1 = $_POST['descrip'];
  // $descrip = str_replace("'", "\'", $descrip1);
  

  $query .= "description='$desc', title='$title' WHERE id=$id";
echo $query;
  $run = mysqli_query($conn, $query);
  if ($run) {
    echo "<script>window.location.href='../admin/index.php?aboutsetting=true';</script>";
  }
}
?>


<?php

if (isset($_POST['update-info'])) {

   
//      print_r($_POST);
// }
    $id=$_POST['editid'];
$title = mysqli_real_escape_string($db, $_POST['titleEdit']);
  $desc = mysqli_real_escape_string($db, $_POST['descEdit']);

  
  
//   $sql= "UPDATE  home_info 
//   set 
//   title='$title', 
//   descr='$desc' 
  
//   where id='$id'
//   ";

//   $sql = "UPDATE home_info SET title='".$product_name."',product_category='".$product_category."',product_price='".$product_price."',product_description='".$product_description."',size_category='".$size_category."'";
// $query .= "pic='$imagename',";

//   $descrip1 = $_POST['descrip'];
//   $descrip = str_replace("'", "\'", $descrip1);

//   $query .= "description='$desc' WHERE id=1";
// echo $query;
  // $query1 = "UPDATE home_info SET ";

  // $query1 .= "title=$title',";
  // $descrip2 = $_POST['descri'];
  // $descri = str_replace("'", "\'", $descrip2);
 
  // $query1 .= "descr='$desc' WHERE id=$id";

  $query1 = "UPDATE home_info SET title='$title', descr='$desc' WHERE id=$id";

     
  $run = mysqli_query($conn, $query1);
  echo $query1;
  if ($run) {
    echo "<script>window.location.href='../admin/index.php?infosetting=true';</script>";
  }
}
?>

<?php
if (isset($_POST['add-gallery'])) {
    //  print_r($_FILES);
    //  print_r($_POST);



  $type = $_POST['type'];
 
  $project_image = time() .($_FILES['gpic']['name']);
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($project_image, PATHINFO_EXTENSION);

  
  if ($_FILES["gpic"]["size"] > 1000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {

  move_uploaded_file($_FILES['gpic']['tmp_name'], "../img/gallery/$project_image");








  $query = "INSERT INTO gallery (image) VALUES('$project_image')";

  $run = mysqli_query($conn, $query);
  if ($run) {
    echo "<script>window.location.href='../admin/index.php?viewgallery=true';</script>";
  }
}
}

?>
<?php
if (isset($_POST['update-gallery'])) {
//   print_r($_FILES);
//    print_r($_POST);
// }

  $editid = $_POST['editid'];
  $type = $_POST['type'];
  $npi = time() . $_FILES['npicEdit']['name'];
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($npi, PATHINFO_EXTENSION);

  
  if ($_FILES["npicEdit"]["size"] > 1000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR Invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {
  
  move_uploaded_file($_FILES['npicEdit']['tmp_name'], "../img/gallery/$npi");
  $sql = "UPDATE gallery SET image = '$npi' where id = '$editid' ";
 
  $result = mysqli_query($conn, $sql);

  if ($result) {

    echo "<script>window.location.href='../admin/index.php?viewgallery=true';</script>";
  }
}
}

?>

<?php
if (isset($_POST['add-event'])) {
  //    print_r($_FILES);
  //    print_r($_POST);

 
 
 
 
  $project_name = $_POST['edesc'];

  $project_image = time() . $_FILES['epic']['name'];
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($project_image, PATHINFO_EXTENSION);

  $file_tmp = $_FILES['epic']['tmp_name'];
  if ($_FILES["epic"]["size"] > 1000000) {
    echo "Sorry, your file is too large, exceeds 1 MB";
   
  }
 


  else if(in_array($ext, $allowed)) {
    move_uploaded_file($file_tmp, "../assets/documents/work/$project_image");  
  

  // function compressImage($source, $destination, $quality) {  
  //   $info = getimagesize($source);
  //   if ($info['mime'] == 'image/jpeg') 
  //     $image = imagecreatefromjpeg($source);  
  //   elseif ($info['mime'] == 'image/gif') 
  //     $image = imagecreatefromgif($source);  
  //   elseif ($info['mime'] == 'image/png') 
  //     $image = imagecreatefrompng($source);  
  //   imagejpeg($image, $destination, $quality);    
  

    


// else {
//   move_uploaded_file($_FILES['epic']['tmp_name'], "../assets/documents/work/$project_image");
// }

  $query = "INSERT INTO work_event (edesc,epic) VALUES('$project_name','$project_image')";

  $run = mysqli_query($conn, $query);
  if ($run) {
    echo "<script>window.location.href='../admin/index.php?viewevent=true';</script>";
  }
}
}

?>
<?php
if (isset($_POST['update-event'])) {
//   print_r($_FILES);
//    print_r($_POST);
// }

  $editid = $_POST['editid'];
  $desc = $_POST['edescEdit'];
  $npi = time() . $_FILES['epicEdit']['name'];
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($npi, PATHINFO_EXTENSION);

  
  if ($_FILES["epicEdit"]["size"] > 1000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR Invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {
  
  
  move_uploaded_file($_FILES['epicEdit']['tmp_name'], "../assets/documents/work/$npi");
  $sql = "UPDATE work_event SET epic = '$npi', edesc = '$desc' where id = '$editid' ";
 
  $result = mysqli_query($conn, $sql);

  if ($result) {

    echo "<script>window.location.href='../admin/index.php?viewevent=true';</script>";
  }
}
}

?>

<?php
if (isset($_POST['update-news'])) {
//   print_r($_FILES);
//    print_r($_POST);
// }

  $editid = $_POST['editid'];
  $npi = time() . $_FILES['npicEdit']['name'];
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($npi, PATHINFO_EXTENSION);

  
  if ($_FILES["npicEdit"]["size"] > 1000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR Invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {
  
  
  move_uploaded_file($_FILES['npicEdit']['tmp_name'], "../assets/documents/news/$npi");
  $sql = "UPDATE work_news SET npic = '$npi' where id = '$editid' ";
 
  $result = mysqli_query($conn, $sql);

  if ($result) {

    echo "<script>window.location.href='../admin/index.php?viewnews=true';</script>";
  }
}
}
?>
<?php
if (isset($_POST['add-news'])) {
    //  print_r($_FILES);
    //  print_r($_POST);
     




  $project_image = time() . $_FILES['npic']['name'];
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($project_image, PATHINFO_EXTENSION);

  
  if ($_FILES["npic"]["size"] > 1000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR Invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {

  move_uploaded_file($_FILES['npic']['tmp_name'], "../assets/documents/news/$project_image");



  $query = "INSERT INTO work_news (npic) VALUES('$project_image')";

  $run = mysqli_query($conn, $query);
  if ($run) {
    echo "<script>window.location.href='../admin/index.php?viewnews=true';</script>";
  }
}
}
?>

<?php
if (isset($_POST['add-work'])) {
    //  print_r($_FILES);
    //  print_r($_POST);



  $type = $_POST['type'];
 
  $project_image = time() .($_FILES['wpic']['name']);
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($project_image, PATHINFO_EXTENSION);

  
  if ($_FILES["wpic"]["size"] > 1000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR Invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {

  move_uploaded_file($_FILES['wpic']['tmp_name'], "../assets/documents/before/$project_image");








  $query = "INSERT INTO work_ba (wpic,type) VALUES('$project_image','$type')";

  $run = mysqli_query($conn, $query);
  if ($run) {
    echo "<script>window.location.href='../admin/index.php?viewba=true';</script>";
  }
}
}

?>
<?php
if (isset($_POST['update-work'])) {
//   print_r($_FILES);
//    print_r($_POST);
// }

  $editid = $_POST['editid'];
  $type = $_POST['type'];
  $npi = time() . $_FILES['npicEdit']['name'];
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($npi, PATHINFO_EXTENSION);

  
  if ($_FILES["npicEdit"]["size"] > 1000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR Invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {
  
  move_uploaded_file($_FILES['npicEdit']['tmp_name'], "../assets/documents/before/$npi");
  $sql = "UPDATE work_ba SET wpic = '$npi', type = '$type' where id = '$editid' ";
 
  $result = mysqli_query($conn, $sql);

  if ($result) {

    echo "<script>window.location.href='../admin/index.php?viewba=true';</script>";
  }
}
}

?>
<?php
if(isset($_POST['update-contact'])){
    
  $address = mysqli_real_escape_string($db,$_POST['address']);
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];

  


  $query = "UPDATE contact SET ";
  $query.="address='$address',";
  $query.="email='$email',";
  $query.="mobile='$mobile' WHERE id=1";

  $run = mysqli_query($conn,$query);
  if($run){
echo "<script>window.location.href='../admin/index.php?contactsetting=true';</script>";                    

  }



}     

?>
<?php
if(isset($_POST['update-account'])){
    // print_r($_FILES);
   
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
   
    

    

    // if($imgtemp==''){
    //     $q = "SELECT * FROM admin WHERE 1";
    //     $r = mysqli_query($conn,$q);
    //     $d = mysqli_fetch_array($r);
    //     $imagename = $d['admin_profile'];
    // }


    // move_uploaded_file($imgtemp,"../images/$imagename");

    $query = "UPDATE admin SET ";
    $query.="name='$fullname',";
    $query.="email='$email',";
    $query.="password='$password' WHERE id=1";

    

    $run = mysqli_query($conn,$query);
    if($run){
  echo "<script>window.location.href='../admin/index.php?accountsetting=true';</script>";                    

    }






}

?>

    

  <?php
if(isset($_POST['add-staff'])){

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile   = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    // 🧠 Check if email already exists (optional but recommended)
    $check = "SELECT id FROM admin WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Email already exists!');window.history.back();</script>";
        exit;
    }

    // 🟢 INSERT QUERY (ADD STAFF)
    $query = "INSERT INTO admin (name, email, mobile, password)
              VALUES ('$fullname', '$email', '$mobile', '$password')";

    $run = mysqli_query($conn, $query);

    if($run){
        echo "<script>
                alert('Staff added successfully');
                window.location.href='../admin/index.php?stafflist=true';
              </script>";
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<?php
if(isset($_POST['update-siteSetting'])){
    // print_r($_FILES);
   
    $name = mysqli_real_escape_string($conn,$_POST['siteName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $facebook = mysqli_real_escape_string($conn,$_POST['facebook']);
    $twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
    $linkedin = mysqli_real_escape_string($conn,$_POST['linkedin']);
    $instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    // $imagename = time().$_FILES['profilepic']['name'];
    // $imgtemp = $_FILES['profilepic']['tmp_name'];
    

    

    // if($imgtemp==''){
    //     $q = "SELECT * FROM settings WHERE 1";
    //     $r = mysqli_query($conn,$q);
    //     $d = mysqli_fetch_array($r);
    //     $imagename = $d['admin_profile'];
    // }


    // move_uploaded_file($imgtemp,"../images/$imagename");

    $query = "UPDATE settings SET ";
    $query.="site_name='$name',";
    $query.="email='$email',";
    $query.="phone='$phone',";
    $query.="facebook='$facebook',";
    $query.="instagram='$instagram',";
    $query.="linkedin='$linkedin',";
$query.="twitter='$twitter',";
    $query.="address='$address' WHERE id=1";

   

    $run = mysqli_query($conn,$query);
    if($run){
  echo "<script>window.location.href='../admin/index.php?sitesetting=true';</script>";                    

    }






}

?>

<?php
if (isset($_POST['add-slider'])) {
    //  print_r($_FILES);
    //  print_r($_POST);
     




  $project_image = time() . $_FILES['banner_image']['name'];
  $allowed = array('gif', 'png', 'jpg');
  $ext = pathinfo($project_image, PATHINFO_EXTENSION);

  
  if ($_FILES["banner_image"]["size"] > 5000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR Invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {

  move_uploaded_file($_FILES['banner_image']['tmp_name'], "../img/slider/$project_image");



  $query = "INSERT INTO sliders (image) VALUES('$project_image')";

  $run = mysqli_query($conn, $query);
  if ($run) {
    echo "<script>window.location.href='../admin/index.php?viewslider=true';</script>";
  }
}
}
?>


<?php
if (isset($_POST['update-slider'])) {
  print_r($_FILES);
   print_r($_POST);


  $editid = $_POST['editid'];
  $npi = time() . $_FILES['npicEdit']['name'];
  $allowed = array('gif', 'png', 'jpg','jpeg');
  $ext = pathinfo($npi, PATHINFO_EXTENSION);

  
  if ($_FILES["npicEdit"]["size"] > 5000000) {
    echo "Sorry, your file is too large, exceeds 1 Mb OR Invalid file";
   
  }
 


  else if(in_array($ext, $allowed)) {
  
  
  move_uploaded_file($_FILES['npicEdit']['tmp_name'], "../img/slider/$npi");
  $sql = "UPDATE sliders SET image = '$npi' where id = '$editid' ";
 
  $result = mysqli_query($conn, $sql);

  if ($result) {

    echo "<script>window.location.href='../admin/index.php?viewslider=true';</script>";
  }
}
}
?>

<?php
if (isset($_POST['add-video'])) {
    //  print_r($_FILES);
    //  print_r($_POST);
     




    $desc = mysqli_real_escape_string($db, $_POST['url']);



  $query = "INSERT INTO home_video (url) VALUES('$desc')";

  $run = mysqli_query($conn, $query);
  if ($run) {
    echo "<script>window.location.href='../admin/index.php?videosetting=true';</script>";
  }
}

?>


<?php
if (isset($_POST['update-video'])) {
//   print_r($_FILES);
//    print_r($_POST);
// }

  $editid = $_POST['editid'];
  $npi = mysqli_real_escape_string($db, $_POST['npicEdit']);
 

  
  
  
  $sql = "UPDATE home_video SET url = '$npi' where id = '$editid' ";
 
  $result = mysqli_query($conn, $sql);

  if ($result) {

    echo "<script>window.location.href='../admin/index.php?viewvideo=true';</script>";
  }
}

?>
<?php

if(isset($_POST['update-member'])){

    $id = $_POST['editid'];

    $query = "UPDATE membership_registrations SET
                package_name='{$_POST['package_name']}',
                member_name='{$_POST['member_name']}',
                email='{$_POST['email']}',
                contact_no='{$_POST['contact_no']}',
                address='{$_POST['address']}',
                membership_type='{$_POST['membership_type']}',
                start_date='{$_POST['start_date']}',
                end_date='{$_POST['end_date']}',
                transaction_id='{$_POST['transaction_id']}'
              WHERE id='$id'";

    mysqli_query($conn,$query);

    header("Location: ../admin/index.php?viewmember");
}
?>
<?php

if(isset($_POST['update-associate'])){

    $id             = mysqli_real_escape_string($conn, $_POST['editid']);
    $member_name    = mysqli_real_escape_string($conn, $_POST['member_name']);
    $email          = mysqli_real_escape_string($conn, $_POST['email']);
    $contact_no     = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $amount         = mysqli_real_escape_string($conn, $_POST['amount']);
    $address        = mysqli_real_escape_string($conn, $_POST['address']);
    $transaction_id = mysqli_real_escape_string($conn, $_POST['transaction_id']);

    $query = "UPDATE associate_registrations SET
                member_name    = '$member_name',
                email          = '$email',
                contact_no     = '$contact_no',
                amount         = '$amount',
                address        = '$address',
                transaction_id = '$transaction_id'
              WHERE id = '$id'";

    if(mysqli_query($conn, $query)){

        echo "<script>
                alert('Associate Updated Successfully');
                window.location='../admin/index.php?viewassociate';
              </script>";

    }else{

        echo mysqli_error($conn);

    }
}
?>
