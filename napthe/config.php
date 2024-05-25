<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

// kết nối database .
define("DATABASE", "dbarmy2"); // Data
define("USERNAME", "root"); // User
define("PASSWORD", "Anonymouszz"); // Pass
define("LOCALHOST", "localhost"); // Mặc định localhost
$ketnoi = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
mysqli_query($ketnoi,"set names 'utf8'");  
// config thông tin web
$domain = "http://wwww.army2.pw/";
$tieude = "Hệ Thống MOBIARMY COFFEE";
$name = "MOBIARMY II";
$fb ="fb.com/nguyenan.362.crypto";
$ATM= "63210000611879 - GIANG A LANH";
$sdt = "Null"; 
$gia1 = 400; // nap the uy tin tai army2.pw
$gia3 = 400; // nap the uy tin tai army2.pw
$gia4 = 400; // nap the uy tin tai army2.pw
$gia5 = 400; // nap the uy tin tai army2.pw
?>