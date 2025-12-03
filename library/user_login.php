<?php
include 'connect.php'; // เชื่อมต่อกับฐานข้อมูล
session_start();
if (isset($_POST) && !empty($_POST)) {  
    $username = $_POST["username"];  
    $pass = $_POST["pass"]; 
    $sql = "SELECT * FROM user WHERE u_username='$username' 
                 AND u_pass='$pass' AND u_status='0' ";
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_array($result); 
    $num = mysqli_num_rows($result); 
    if ($num > 0) {
        $_SESSION["u_id"]=$row["u_id"];   
        $_SESSION["u_name"]=$row["u_name"];   
        $_SESSION["class"]=$row["class"];
        $_SESSION["department"]=$row["department"];      
        header("Location: user_lendbook.php"); 
        exit();  
    } else {
        $msg = "กรุณาติดต่อ admin";
        echo "<script type = 'text/javascript'>alert('$msg')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>admin login</title>
</head>
<body>
      <div class="container mt-2 p-2">
          <form method="post" action="">
          <div class="row">
                  <div class="col-2 mt-2 p-2">กรุณาใส่ username</div>
                  <div class="col-6 mt-2 p-2">
                  <input type="text" class="form-control" placeholder="username" name="username">
                  </div>
          </div>
          <div class="row">
                  <div class="col-2 mt-2 p-2">กรุณาใส่ password</div>
                  <div class="col-6 mt-2 p-2">
                  <input type="password" class="form-control" placeholder="password" name="pass">
                  </div>
          </div>
          <div class="row">
                  <div class="col-4 mt-2 p-2">
                      <button type="submit" class="btn btn-primary mb-3">Confirm</button>
                  </div>
          </div>
          </form>
      </div>
</body>
</html>