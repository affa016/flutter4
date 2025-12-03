<?php
include 'connect.php'; // เชื่อมต่อกับฐานข้อมูล
if (isset($_POST) && !empty($_POST)) {  // เช็คว่า POST ได้รับค่าจากฟอร์มหรือไม่
  $u_username = $_POST["u_username"];
  $u_pass = $_POST["u_pass"];
  $u_name = $_POST["u_name"];
  $class = $_POST["class"];
  $department = $_POST["department"];
  $u_status = $_POST["u_status"];
  //echo $u_status;
  $sqlcheck = "SELECT * FROM user WHERE u_username = '$u_username'";
  $resultcheck = mysqli_query($conn, $sqlcheck);
  $numcheck = mysqli_num_rows($resultcheck);
  if($numcheck > 0){
    $msg = "มีชื่อผู้ใช้งานแล้ว";
    echo "<script type = 'text/javascript'>alert('$msg')</script>";
  }else{
    $sql = "INSERT INTO user(u_username,u_pass,u_name,class,department,u_status)
            VALUES('$u_username','$u_pass','$u_name','$class','$department','$u_status')";
    $result = mysqli_query($conn, $sql);
    $msg = "เพิ่มผู้ใช้งานเรียบร้อย";
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
    <form method="post" action="">
    <div class="container mt-2 p-2">
        <div class="row">
            <div class="col-6 mt-2 p-2">
            <input type="password" class="form-control" placeholder="username" name="u_username">
            </div>
            <div class="col-6 mt-2 p-2">
            <input type="password" class="form-control" placeholder="password" name="u_pass">
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-2 p-2">
            <input type="password" class="form-control" placeholder="name" name="u_name">
            </div>
            <div class="col-6 mt-2 p-2">
                <select class="form-select" name="class">
                    <option selected>Class</option>
                    <option value="ปวช.1">ปวช.1</option>
                    <option value="ปวช.2">ปวช.2</option>
                    <option value="ปวช.3">ปวช.3</option>
                    <option value="ปวส.1">ปวส.1</option>
                    <option value="ปวส.2">ปวส.2</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-2 p-2">
            <input type="text" class="form-control" placeholder="Department" name="department">
            </div>
            <div class="col-6 mt-2 p-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="u_status" value="1">
                    <label class="form-check-label">
                        Teacher
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="u_status" value="0">
                    <label class="form-check-label">
                        student
                    </label>
                </div>    
<button type="submit" class="btn btn-primary mb-3">Confirm</button>
            </div>
        </div>
    </div>
    </form>
    
    <?php
     $sqlshow = "SELECT * FROM user";
     $resultshow = mysqli_query($conn, $sqlshow);
     $rowshow = mysqli_fetch_array($resultshow);
     $numshow = mysqli_num_rows($resultshow);
?>
<div class="container mt-2 p-2">
    STUDENT
    <div class="row">
        <?php
        // Loop through the resultshow array to display students (u_status == 0)
        foreach($resultshow as $rowshow) {
            $u_status1 = $rowshow["u_status"];
            if($u_status1 == "0") {
        ?>
            <div class="col-6 mt-2 p-2">
                <?php echo $rowshow["u_name"]; ?>
            </div>
        <?php
            }
        }
        ?>
    </div>
    TEACHER
    <div class="row">
        <?php
        // Loop through the resultshow array to display teachers (u_status == 1)
        foreach($resultshow as $rowshow) {
            $u_status1 = $rowshow["u_status"];
            if($u_status1 == "1") {
        ?>
            <div class="col-6 mt-2 p-2">
                <?php echo $rowshow["u_name"]; ?>
            </div>
        <?php
            }
        }
        ?>
    </div>
</div>


</body>
</html>