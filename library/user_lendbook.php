<?php
    include 'connect.php'; // เชื่อมต่อกับฐานข้อมูล
    session_start();
    $sqlshow = "SELECT * FROM books";
    $resultshow = mysqli_query($conn, $sqlshow);
    $rowshow = mysqli_fetch_array($resultshow);
    $numshow = mysqli_num_rows($resultshow);
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
<h2>user</h2>
<div class="container mt-2 p-2 text-bg-info">
    <p>ชื่อ : <?php echo$_SESSION["u_name"];?></p>
    <p>ระดับ : <?php echo$_SESSION["class"];?></p>
    <p>แผนก : <?php echo$_SESSION["department"];?></p>
</div>



<h2>lend book</h2>
<div class="container mt-2 p-2 text-bg-info">
    <div class="row">
        <?php foreach($resultshow as $rowshow){ ?>
        <div class="col-4 mt-2 p-2">
           <div class="card" style="width: 20rem;">
           <img src="pic_book/<?php echo $rowshow["b_picture"]; ?>" class="card-img-top" alt="...">
             <div class="card-body">
               <h5 class="card-title">หนังสือ : <?php echo $rowshow["b_name"]; ?></h5>
                 <p class="card-text">รายละเอียด : <?php echo $rowshow["b_detail"]; ?></p>
                 <p class="card-text">ผู้แต่ง: <?php echo $rowshow["author"]; ?></p>
             <form method = "post" action="user_card.php?u_id=<?php echo$_SESSION["u_id"]; ?>">
                 <div class = "pt-1 pb-2">
                    <b>- จำนวน +</b>
                 <input type = "number" name = "num_book" value = "1" min ="1" class = "form-control">
        </div>
        <button type ="submit" name="book_card" class="btn btn-warning w-100">ยืมหนังสือ</button>
        </form> 
          </div>
        </div>
    </div>
<?php } ?>
</div>
</div>
</body>
</html>