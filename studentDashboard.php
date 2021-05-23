<?php
session_start();
$name=$_SESSION['name'];
$id=$_SESSION['id'];
$host = "localhost";
$user = "root";
$password = "";
$db = "lms_db";
$con = mysqli_connect($host, $user, $password,$db);
$sql="select * from subject where subject_id in (Select subject_id from registration where student_id = $id)";
$result = mysqli_query($con,$sql);
$c=0;
$array=array();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <div class="container">
        <h1><?php
            echo "Welcome $name";
        ?></h1>
        <hr>
        
        <?php
            while($row = mysqli_fetch_array($result)){
        ?>
        <form action="classroom.php" method="post">
        <input type="hidden" name="subject_id" value="<?php echo "$row[0]"; ?>">
        <input type="submit" name="subjectName" value="<?php  echo"$row[1]"; ?>"><br><br>
        
        </form>
        <?php
            }
        ?>
        <button><a href="classes.php">Join Classes</a></button>
        
    </div>
</body>
</html>