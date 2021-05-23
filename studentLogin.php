<?php
  session_start();
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "lms_db";
  $con = mysqli_connect($host, $user, $password,$db);
  
  if(isset($_POST['username'])){
    $uname = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from studentLogin where userId='$uname' AND password='$password' limit 1";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1){
      //echo "You Have Succesfully Logged In";
      $data=mysqli_fetch_array($result);
      $_SESSION['name']=$data[3];
      $_SESSION['id']=$data[0];
      $_SESSION['yd_id']=$data[4];
      header('location:studentDashboard.php');
      
    }
    else{
      echo "You Have Entered Incorrect Password";
      exit();
    }
  }
 ?>
