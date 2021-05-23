<?php
    session_start();
    $name=$_SESSION['name'];
    $id=$_SESSION['id'];

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "lms_db";
    $con = mysqli_connect($host, $user, $password,$db);
    $day= date("l");
    $sql="SELECT * FROM subject WHERE subject_id IN
    (SELECT subject_id FROM tregistration where teacher_id='$id' AND subject_id IN(SELECT subject_id FROM classes WHERE day='Monday'))";
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
    <title>Take Classes</title>
</head>
<body>
    <div class="container">
        <h1><?php
            echo "Welcome $name";
        ?></h1>
        <hr>
        <form action="tclasses.php">
        <?php
            while($row = mysqli_fetch_array($result)){
                $link=$row[2];
                echo "<button><a href=$link>$row[1]</a></button><br><br>";
            }
        ?>
        </form>
    </div>
</body>
</html>