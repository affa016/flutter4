<?php
include'connect.php'; 
if(isset($_POST) && !empty($_POST)){ //ฟังชั่น issetเช็คค่าpostจากform ฟังชั่นemptyเช็คค่าว่างเปล่า
   $username = $_POST["username"];
   $pass = $_POST["pass"];
   //echo $username;
   //echo $pass;
   $sqladmin = "SELECT * FROM adminsystem WHERE username='$username' 
                AND pass='$pass' AND admin_status='0' ";
   $resultadmin = mysqli_query($conn,$sqladmin); // mysqli_query รัน sql บนฐานข้อมูลที่กำหนด
   $rowadmin =  mysqli_fetch_array($resultadmin); // fetch_array จับฐานข้อมูลมาใช้งาน
   $numadmin = mysqli_num_rows($resultadmin); //num_rows นับจำนวนแถว
   if($numadmin > 0){
    echo "admin ระดับใหญ่";
   }else {
    echo "ติดต่อผู้ดูแลระบบ";
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
    <?php ?>
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
                <input type="password" class="form-control" placeholder="username" name="pass">

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