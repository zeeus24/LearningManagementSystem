<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   session_start();
   $host = "localhost";
   $user = "root";
   $password = "";
   $db = "lms_db";
   $con = mysqli_connect($host, $user, $password,$db);
   $subject_id=$_POST['subject_id'];
   $subjectName=$_POST['subjectName'];
   echo "<h1>Welcome to $subjectName Classroom</h1>";

   
   ?>
   <hr>
</body>
</html>