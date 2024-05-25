<?php
session_start();
if(empty($_SESSION['username'])){
	session_destroy();
	header('location: /');
	die();
}
include('config.php');
include('head.php');
?>
<div class="col-lg-12"> 
<div class="panel panel-info"> 
<div class="panel-heading">
    <b style="color:black;">Nạp Thẻ - Duyệt trong vòng 3 giờ làm việc</b>
    </div> 
<div class="panel-body"> 
<div class="form-group"> 
  <form action='nhan.php' method="get"> 
    <label for="user_name" class="col-sm-3 control-label" style="color:black;">Loại thẻ :</label> 
    <div class="col-sm-8"> <div class="form-group has-error has-feedback"> 
    <select id="name" name="loai-the" class="form-control"> 
    <option name="viettel">Viettel</option> 
     <option name="mobile">Mobifone</option> 
       <option name="vina">Vinaphone</option> 		 
      </select> </div> </div>
      <label for="user_name" class="col-sm-3 control-label" style="color:black;">Mệnh giá thẻ :</label>
      <div class="col-sm-8">
           <div class="form-group has-error has-feedback"> 
           <select name="menhgia" class="form-control"> <option name="10k">10.000VND</option>
      <option name="20k">20.000VND</option> 
      <option name="50k">50.000VND</option>
      <option name="100k">100.000VND</option> 
      <option name="200k">200.000VND</option> 
      </select> </div> </div> </div> 
        <label class="col-sm-3 control-label"style="color:black;">Seri :</label> 
        <!-- div sm8--> <div class="col-sm-8">
             <input type="number" name="seri" class="form-control" placeholder="Nhập số seri trên thẻ...">
             <br> </div>
             <label class="col-sm-3 control-label"style="color:black;">Mã thẻ :</label>
             <!-- div sm8--> <div class="col-sm-8"> <input type="number" name="mathe" class="form-control" placeholder="Nhập mã pin trên thẻ..."><br> </div> 
             <label style="display:none" class="col-sm-3 control-label"style="color:black;">Tên tài khoản cần nạp :</label>
             <!-- div sm8--> <input style="display:none" name="tentaikhoan" type="text" class="form-control" placeholder="Tên tài khoản" value="<?php echo $_SESSION['username']; ?>"><br>
             <div class="text-center"> 
             <button id="submit" type="submit" class="btn btn-info">Gửi yêu cầu nạp thẻ</button></div> </div></form> <!-- end --> </div>