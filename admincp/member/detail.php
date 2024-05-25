<?php
include('../archive/config.php');
if (!$connect)
    exit(0);
if (!$login)
    header('Location: ../login.php.php');
$user_id = $_GET['id'];
$result = $conn->query("SELECT * FROM `user` WHERE `user_id` = '". $conn->real_escape_string($user_id) ."'; ");
$user = $result->fetch_assoc();
$nameNV = array('Guner','Miss 6','Proton','King Kong','Rocket','Cano','Chicky','Tarzan','Apache','Magenta');
$search = $_GET['search'];
include('../archive/head.php');
?>
    <body>
        <div class="box-nf" id="box-nf"></div>
        <script type="text/javascript" src="../JavaScript/box.js"></script>
        <script language="javascript" src="../JavaScript/jquery-2.0.0.min.js"></script>
        <script language="javascript">
            function usersave(type){
                switch(type) {
                    case 0:
                        $.ajax({
                            url : "../archive/result.php",
                            type : "post",
                            dataType:"text",
                            data : {
                                 user_id : <?php echo $user['user_id'];?>,
                                 uname : $('#user').val(),
                                 password : $('#password').val(),
                                 password2 : $('#password2').val(),
                                 lock : $('#lock').val(),
                                 CSinh : $('#CSinh').val(),						 								 
		                              NVCSinh : $('#NVCSinh').val(),
                                 xu : $('#xu').val(),		 
                                 luong : $('#luong').val(),
                                 XPMax : $('#XPMax').val(),
                                 dvong : $('#dvong').val(),
                                 item : $('#item').val(),
                                 ruongItem : $('#ruongItem').val(),
                                 ruongTB : $('#ruongTB').val(),
<?php
for ($i = 0; $i < 10; $i++) {
    echo "
                                 NV". ($i + 1) ." : $('#NV". ($i + 1) ."').val(), ";
}
?>
                                 type : 3
                            },
                            success : function (result){
                                switch(result) {
                                    case 'success':
                                        box_nf("Thành công", 2);
                                        break;
                                    default:
                                        box_nf("Thất bại: "+ result, 2);
                                        break;
                                }
                            }
                        });
                        break;
                    case 1:
                        break;
                }
            }
        </script>
        <div class="shadow">
            <div class="title"><u><?php echo $_SESSION['user']; ?></u> sửa thành viên</div>
            <div class="content">
                <li><a href="./index.php?search=<?php echo $search;?>">Quay lại</a></li>
<?php
if ($result->num_rows == 0) {
?>
               <p>Tài khoản không tồn tại</p>
<?php
} else {
    $result = $conn->query("SELECT * FROM `armymem` WHERE `id` = ". $user['user_id'] ."; ");
    if ($result->num_rows == 0) {
?>
               <p>Tài khoản chưa kích hoạt</p>
<?php
    } else {
        $army = $result->fetch_assoc();
        if ($army['online'] != 0)
            echo '<p style="color:green">Tài khoản có đăng nhập nếu sửa chữa dữ liệu có thể không có tác dụng</p>';
?>
                <table width="100%">
                    <tr>
                        <td width="30%">Tài khoản:</td>
                        <td><input type="text" class="box-text" id="user" name="user" placeholder="Tên tài khoản" value="<?php echo $user['user'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu:</td>
                        <td><input type="text" class="box-text" id="password" name="password" value="<?php echo $user['password'];?>" placeholder="Mật khẩu" /></td>
                    </tr>
                    <tr>
                        <td>Chữ ký:</td>
                        <td><input type="text" class="box-text" id="password2" placeholder="Chữ ký" value="<?php echo $user['password2'];?>" name="password2" /></td>
                    </tr>
                    <tr>					
                        <td>Khoá tài khoản:</td>
                        <td><input type="text" class="box-text" id="lock" placeholder="Khoá tài khoản" value="<?php echo $user['lock'];?>" name="lock" /></td>
                    </tr>
                    <tr>	
                       <td>Số lần chuyển sinh:</td>
                        <td><input type="number" class="box-text" id="CSinh" placeholder="Lần" value="<?php echo $army['CSinh'];?>" name="CSinh" /></td>
                    </tr>
                    <tr>					
                      <td>Nhân vật chuyển sinh:</td>
                        <td><textarea class="box-text" id="NVCSinh" placeholder="Chuyên sinh" name="NVCSinh"><?php echo $army['nvCSinh']; ?></textarea></td>
                    </tr>
                    <tr>					
                        <td>Xu:</td>
                        <td><input type="number" class="box-text" id="xu" placeholder="Xu" value="<?php echo $army['xu'];?>" name="xu" /></td>
                    </tr>
                    <tr>					
                        <td>Lượng:</td>
                        <td><input type="number" class="box-text" id="luong" placeholder="Lượng" value="<?php echo $army['luong'];?>" name="luong" /></td>
                    </tr>
                    <tr>
                       <td>XPmax:</td>
                        <td><input type="number" class="box-text" id="XPMax" placeholder="Exp max" value="<?php echo $army['xpMax'];?>" name="XPMax" /></td>
                    </tr>
                    <tr>					
                        <td>Danh dự:</td>
                        <td><input type="number" class="box-text" id="dvong" placeholder="Danh dự" value="<?php echo $army['dvong'];?>" name="dvong" /></td>
                    </tr>
                        <td>Item:</td>
                        <td><input type="text" class="box-text" id="item" placeholder="Item" value="<?php echo $army['item'];?>" name="item" /></td>
                    </tr>
                    <tr>
                        <td>Rương Item:</td>
                        <td><textarea class="box-text" id="ruongItem" placeholder="Rương Item" name="ruongItem"><?php echo $army['ruongItem']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Rương trang bị:</td>
                        <td><textarea class="box-text" id="ruongTB" placeholder="Rương trang bị" name="ruongTB"><?php echo $army['ruongTrangBi']; ?></textarea></td>
                    </tr>
<?php
        for ($i = 0; $i < 10; $i++) {
            echo '
                    <tr>
                        <td>'. $nameNV[$i] .':</td>
                        <td><input type="text" class="box-text" id="NV'. ($i + 1) .'" placeholder="Nhân vật '. $nameNV[$i] .'" value="'. htmlspecialchars($army["NV". ($i +1)]) .'" name="NV'. ($i + 1) .'" /></td>
                    </tr>
            ';
        }
?>
                </table>
                <div><input class="button" type="submit" value="Lưu lại" onclick="usersave(0);" /></div>
<?php
    }
}
?>
                <p onclick="box_nf('Văn Tú 0.1', 4)" align="right">Thông tin!</p>
            </div>
            <div class="copyright">
                Thiết kế bởi <a href="https://m.facebook.com/danielyang.crypto" class="vantu">Daniel Yang</a>
            </div>
        </div>
    </body>
</html>