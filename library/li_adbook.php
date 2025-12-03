<?php
include 'connect.php'; // เชื่อมต่อกับฐานข้อมูล
if (isset($_POST["add_cat"]) && !empty($_POST)) {  // เช็คว่า POST ได้รับค่าจากฟอร์มหรือไม่
  $cat_name = $_POST["cat_name"]; 
  $sqlcat = "INSERT INTO catalogbook(cat_name)
          VALUES('$cat_name')";
  $resultcat = mysqli_query($conn, $sqlcat);
}

if (isset($_POST["add_book"]) && !empty($_POST)) {  // เช็คว่า POST ได้รับค่าจากฟอร์มหรือไม่
  $cat_id = $_POST["cat_id"]; 
  $b_name = $_POST["b_name"]; 
  $b_detail = $_POST["b_detail"]; 
  $author = $_POST["author"]; 

  $image_name = $_FILES["profile_image"]["name"];
  $image_tmp = $_FILES["profile_image"]["tmp_name"];
  $folder = "pic_book/";
  $image_location = $folder.$image_name;

  $sql1 = "INSERT INTO books(b_name,b_detail,author,b_picture)
  VALUE ('$b_name','$b_detail','$author','$image_name')";
  $result1 = mysqli_query($conn,$sql1);
  $b_id = mysqli_insert_id($conn);
  move_uploaded_file($image_tmp, $image_location);
  
  $sql2 = "INSERT INTO bookincat(b_id,cat_id)
  VALUE ('$b_id','$cat_id')";
  $result2 = mysqli_query($conn,$sql2);

}



$sql2 = "SELECT * FROM books";
$results2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_array($results2);
$num2 = mysqli_num_rows($results2);


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
<h2>catalog book</h2>
<div class="container mt-2 p-2 text-bg-secondary">
  <form method="post" action="">    
  <div class="row">
          <div class="col-6 mt-2 p-2">
              <input type="text" class="form-control"  name="cat_name">
          </div>
          <div class="col-6 mt-2 p-2">
             <button type="submit" class="btn btn-primary mb-3" name="add_cat">Confirm</button> 
          </div>
  </div>
  </form>
  <div class="row">
        <?php  $sqlshow = "SELECT * FROM catalogbook";
               $resultshow = mysqli_query($conn,$sqlshow);
               $rowshow = mysqli_fetch_array($resultshow);
               $numshow = mysqli_num_rows($resultshow);
               foreach($resultshow as $rowshow){
        ?>
        <div class="col-3 mt-2 p-2">
                <?php echo $rowshow["cat_name"]; ?>
        </div>
        <?php   }  ?>
  </div>
</div>


<h2>add book</h2>
<div class="container mt-2 p-2 text-bg-info">
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
          <div class="col-2 mt-2 p-2">ประเภทหนังสือ</div>
          <div class="col-10 mt-2 p-2">
                <?php $sqlshow = "SELECT * FROM catalogbook";
                      $resultshow = mysqli_query($conn,$sqlshow);
                      $rowshow = mysqli_fetch_array($resultshow);
                      $numshow = mysqli_num_rows($resultshow);
                ?>
                <select name="cat_id" class="form-control">
                    <?php foreach($resultshow as $rowshow){?>
                          <option value="<?php echo $rowshow["cat_id"]; ?>">
                              <?php echo $rowshow["cat_name"];?>
                          </option>
                     <?php } ?>
                </select>
          </div>
          <div class="col-2 mt-2 p-2">ชื่อหนังสือ</div>
          <div class="col-10 mt-2 p-2"><input type="text" class="form-control" name="b_name"></div>
          <div class="col-2 mt-2 p-2">รายละเอียด</div>
          <div class="col-10 mt-2 p-2">
            <textarea class="form-control" rows="3" name="b_detail"></textarea>
          </div>
          <div class="col-2 mt-2 p-2">ผู้แต่ง</div>
          <div class="col-10 mt-2 p-2"><input type="text" class="form-control" name="author"></div>
          <div class="col-2 mt-2 p-2">รูปภาพ</div>
          <div class="col-10 mt-2 p-2"><input type="file" class="form-control" name="profile_image"></div>
          <div class="col-6 mt-2 p-2 w-50">
              <button type="submit" class="btn btn-primary mb-3" name="add_book">Add Book</button> 
          </div>
    </div>
</form>
</div>



<h2>book</h2>
<div class="container mt-2 p-2 text-bg-info">
    <div class="row">
        <?php foreach($results2 as $row2){ ?>
        <div class="col-4 mt-2 p-2">
            <div class="card" style="width: 25rem;">
            <img src="pic_book/<?php echo $row2["b_picture"]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">หนังสือ : <?php echo $row2["b_name"]; ?></h5>
                      <p class="card-text">รายละเอียด : <?php echo $row2["b_detail"]; ?></p>
                      <p class="card-text">ผู้แต่ง : <?php echo $row2["author"]; ?></p>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>




</body>


</html>