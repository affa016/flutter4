<?php //เปิดโครงสร้างภาษา php
       //echo "สวัสดี" ;
       //$n1 = 9;  //สร้างตัวแปร
       //$n2 = "computer";
       //echo "ตัวแปรที่1"."    "." =   ".$n1; // . ใช้ในการเชื่อมข้อความ
       $servername = "localhost:3307";
       $username = "root";
       $password = "";
       $mydb = "mydata";
       $conn = mysqli_connect($servername, $username, $password, $mydb);
       //echo "ok";
 ?>