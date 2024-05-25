<?php
session_start();
include('config.php');
include('head.php');
?>
<h4 style="margin: 10px 20px 0 32%;"><span class="label label-success"> MobiArmy 2 by Ann </span></h4>
<div style="margin: 0 auto; width: 500px;">
<table class="table table-responsive">
<tbody>
<tr>
<td colspan="2">
<div id="msg_napthe"></div>
  <form action='nhan.php' method="get"> 
<table class="table table-responsive">
<tbody>
<tr>
<td colspan="2">
<div id="msg_napthe"></div>
</td>
</tr>
<tr>
<td>Tên TK game:</td>
<td><input type="text" value="<?php echo $_SESSION['username']; ?>" name="tentaikhoan" class="form-control"></td>
</tr>
<tr>
<td>Loại thẻ:</td>
<td>
   <select id="name" name="loai-the" class="form-control"> <option value="">Chọn loại thẻ</option>
    <option name="viettel">Viettel</option>	
     <option name="mobile">Mobifone</option> 
       <option name="vina">Vinaphone</option> 	
         <option name="gate">GATE</option>

</select>
</td>
</tr>
<tr>
<td><label for="user_name">Mệnh Giá:</label></td>
<td>
<select name="menhgia" class="form-control">
<option value="">Chọn sai mất thẻ</option>
<option value="10k">10.000</option>
<option value="20k">20.000</option>
<option value="30k">30.000</option>
<option value="50k">50.000</option>
<option value="100k">100.000</option>
<option value="200k">200.000</option>
<option value="300k=">300.000</option>
<option value="500k">500.000</option>
</select>
</td>
</tr>
<tr>
<td>Máy chủ:</td>
<td>
<select name="maychu" class="form-control">
<option value="">Chọn Server</option>
<option value="coffee">MobiArmy Coffee</option>
</select>
</td>
</tr>
<tr>
<td>Chọn nạp:</td>
<td>
<select name="loai_nap" class="form-control">
<option value="luong">Lượng</option>
<option value="xu">Xu</option>
</select>
</td>
</tr>
<tr>
<td>Mã thẻ:</td>
<td><input type="number" name="mathe" class="form-control" placeholder="Nhập mã pin trên thẻ..."></td>
</tr>
<tr>
<td>Seri:</td>
<td><input type="number" name="seri" class="form-control" placeholder="Nhập số seri trên thẻ..."></td>
</tr>
</td>
</tr>
<tr>
<td></td>
<td>
<button id="submit" type="submit" class="btn btn-info">Gửi yêu cầu nạp thẻ</button>
</div>
</td>
</tr>
</tbody>
</table>
</form>
    
    
    <center><p><strong><font color="red">Lưu ý:</font> <font color="green">Lưu ý gửi thẻ chính xác và đợi trạng thái xử lý</font></strong></p></center>
	<div class="col-md-offset-1 col-md-5">
	
	<button onclick="window.location.href='/napthe/card.php'">Xem Bảng Giá Nạp Tiền</button>