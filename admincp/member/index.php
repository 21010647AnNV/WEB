<?php
include('../archive/config.php');
if (!$connect)
    exit(0);
if (!$login)
    header('Location: ../login.php.php');
include('../archive/head.php');
$search = isset($_POST['search']) ? $_POST['search'] : $_GET['search'];
?>
    <body>
        <div class="box-nf" id="box-nf"></div>
        <script type="text/javascript" src="../JavaScript/box.js"></script>
        <script language="javascript" src="../JavaScript/jquery-2.0.0.min.js"></script>
        <script language="javascript">
            function deletealluser(){
                box_nf("Quá trình đang thực vui lòng chờ trong giây lát", 2);
                $.ajax({
                    url : "../archive/result.php",
                    type : "post",
                    dataType:"text",
                    data : {
                         type : 2
                    },
                    success : function (result){
                        box_nf(result, 3);
                    }
                });
            }
        </script>
        <div class="shadow">
            <div class="title"><u><?php echo $_SESSION['user']; ?></u> Thành viên</div>
            <div class="content">
                <li><a href="../">Quay lại</a></li>
                <form action="" method="post">
                    <input type="text" name="search" placeholder="Tên tài khoản" value="<?php echo $search ?>">
                    <input type="submit" name="submit" value="Tìm kiếm">
                </form>
<?php
if (isset($search)) {
    
    $page     = isset($_GET['p']) ? ( !preg_match('/^[0-9]+$/',$_GET['p']) ? 1 : ($_GET['p'] > 0 ? $_GET['p'] : 1 ) ) : 1;
    $limit       = $conn->real_escape_string(isset($_GET['limit']) ? $_GET['limit'] : 20);
    $order     = $conn->real_escape_string(isset($_GET[order]) ? $_GET[order] : 'user_id');
    $type       = $conn->real_escape_string(isset($_GET[type]) ? $_GET[type] : 'DESC');
    $start       = ($page - 1) * $limit;
    
    $result = $conn->query("SELECT * FROM `user` WHERE `user` LIKE '%". $conn->real_escape_string($search) ."%' ORDER BY `$order` $type LIMIT $start, $limit");
    $i = $start;
    while ($user = $result->fetch_assoc()) {
        $i++;
        $army = $conn->query("SELECT `id` FROM `armymem` WHERE `id` = ". $user['user_id'] ."; ");
        echo '
                <div class="list" id="user_id'. $user["user_id"] .'">
                    '. $i .'. ID: '. $user["user_id"] .'. Tài khoản: <b style="color:bule">'. $user["user"] .'</b>
                    <br />Mật khẩu: <b style="color:red">'. $user["password"] .'</b>
                    <br />Chữ ký: <b style="color:red">'. $user["password2"] .'</b>
                    <br />'. ($army->num_rows != 0 ? '<a href="./detail.php?id='. $user["user_id"] .'&search='. $search .'">Chi tiết</a>' : 'Chưa xác nhận') .'
                </div>
        ';
    }
   print('
        <a href="?search='. $search .'&p='. ($page - 1) .'">&lt; Trước</a> • 
        <a href="?search='. $search .'&p='. ($page + 1) .'">Sau &gt;</a>
   ');
}
?>
                <p onclick="box_nf('Văn Tú 0.1', 4)" align="right">Thông tin!</p>
            </div>
            <div class="copyright">
                Thiết kế bởi <a href="https://m.facebook.com/nguyenan.362" class="vantu">Ann</a>
            </div>
        </div>
    </body>
</html>