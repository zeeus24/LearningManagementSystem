<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "lms_db";
    $con = mysqli_connect($host, $user, $password,$db);
    
    $subject_id=$_SESSION['subject_id'];

    echo $subject_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Content</title>
</head>
<body>
    <h1>New Content</h1>
    <hr>
    <form action="newContent.php" method="post" enctype="multipart/form-data">
        <label for="fileinp">Choose a pdf file to add as a content:</label>
        <input type="file" id="fileinp" name="file" required><br><br>
        <label for="filename">Add a name for the content:</label>
        <input type="text" id="filename" name="cName"><br><br>
        <input type="submit" name="submit">
        <?php
            if(isset($_POST['submit']))
            {
                $contentName=$_POST['cName'];
                $file=$_FILES['file']['name'];
                $file_type=$_FILES['file']['type'];
                $file_size=$_FILES['file']['size'];
                $file_temp_loc=$_FILES['file']['tmp_name'];
                $file_store="storageContents/".$file;
                move_uploaded_file($file_temp_loc,$file_store);
                $date=date("Y-m-d");
                $sql="insert into content (subject_id,date,contentName,contentFile) values('$subject_id','$date','$contentName','$file')";
                $query=mysqli_query($con,$sql);
            }
        ?>
    </form>
</body>
</html>
