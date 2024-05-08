


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sees Grouping</title>
    <link rel="stylesheet" href="seesCell.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="title">SEES cell grouping</div>
<center>
    <div class="container">
        <div class="top">Please Input Your Details</div>
        <form action="" method="post" class="form">
        <input type="text" class="name" placeholder="Enter your name" name="username">
        <input type="text" class="matric-no" placeholder="Enter your matric number" name="matric">
        <input type="submit" class="submit" value="Submit" name="submit"> 
        <div class="group">
            
            
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'database';

$conn = mysqli_connect($host, $user, $password, $dbname);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$matric = filter_input(INPUT_POST, 'matric', FILTER_SANITIZE_NUMBER_INT);

if(isset($_POST['submit'])){
    if(!empty($username) && !empty($matric)){
        $sql = "SELECT * FROM students WHERE matric = $matric";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $groupname = $row["groupname"];
            echo "You belong to group $groupname";
        }else{
            $randomgroup = rand(1,8);
            echo"You have been assigned to group $randomgroup";
            $add = "INSERT INTO students (username, matric, groupname) VALUES ('$username', '$matric', '$randomgroup')";

            mysqli_query($conn, $add);
        }
    }
    
}



mysqli_close($conn);
?>

</div>
</form>
</center>
</body>
</html>

