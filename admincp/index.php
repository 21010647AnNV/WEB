<?php
include('./archive/config.php');
if (!$connect)
    exit(0);
if (!$login)
    header('Location: login.php');
include('./archive/head.php');
$user = $conn->query("SELECT `user_id` FROM `user`; ");
$armymem = $conn->query("SELECT `id` FROM `armymem`; ");
$online = $conn->query("SELECT `id` FROM `armymem` WHERE `online` > 0; ")->num_rows;
?>
    <body>
        <div class="box-nf" id="box-nf"></div>
        <script type="text/javascript" src="./JavaScript/box.js"></script>
        <div class="shadow">
            <div class="title"><u><?php echo $_SESSION['user']; ?></u> đang vào quản ý</div>
            <div class="content">
                <li>THỐNG KÊ MÁY CHỦ</li>
                <ul>Số tài khoản: <?php echo number_format($armymem->num_rows).'/'.number_format($user->num_rows);?></ul>
                <ul>Đang chơi: <?php echo number_format($online);?></ul>
                <li>CHỨC NĂNG</li>
                <ul><a href="member" class="button">Chỉnh sửa  thành viên</a></ul>
                <ul><a href="giftcode" class="button">Mã quà tặng</a></ul>
                <ul><a href="?c=logout" class="button">Đăng xuất</a></ul>
                <p onclick="box_nf('Văn Tú 0.1', 4)" align="right">Thông tin!</p>
            </div>
            <div class="copyright">
                Thiết kế bởi <a href="https://m.facebook.com/danielyang.crypto" class="vantu">Daniel Yang</a>
            </div>
        </div>
    </body>
</html>