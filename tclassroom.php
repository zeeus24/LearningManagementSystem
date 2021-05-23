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
        
        $subjectName=$_POST['subjectName'];
        if(isset($_SESSION['subject_id'])){
            $subject_id=$_SESSION['subject_id'];
            }
        else{
                $_SESSION['subject_id']=$_POST['subject_id'];
            }
        $sql="select * from content where subject_id=$subject_id order by date desc";
        $result = mysqli_query($con,$sql);
    ?>
    <h1>Welcome to <?php echo $subjectName?> Classroom</h1>
    <hr>
    <table>
        <tr>
            <th>Content Name</th>
            <th>Date </th>
            <th>View</th>
        </tr>
        <?php while($row = mysqli_fetch_array($result)){
            echo "<tr>
                <td>$row[3]</td>
                <td>$row[2]</td>
                <td></td>
            </tr>";
            }?>
    </table>
    <a href="newContent.php"><button>Add New Content</button></a>
   
    
</body>
</html>