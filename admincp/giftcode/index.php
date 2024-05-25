<?php
include('../archive/config.php');
if (!$connect)
    exit(0);
if (!$login)
    header('Location: ../login.php.php');
include('../archive/head.php');
$result = $conn->query("SELECT * FROM `giftcode`; ");
?>
    <body>
        <div class="box-nf" id="box-nf"></div>
        <script type="text/javascript" src="../JavaScript/box.js"></script>
        <script language="javascript" src="../JavaScript/jquery-2.0.0.min.js"></script>
        <script language="javascript">
            function deletecode(idcode){
                $.ajax({
                    url : "../archive/result.php",
                    type : "post",
                    dataType:"text",
                    data : {
                         code_id : idcode,
                         type : 5
                    },
                    success : function (result){
                        switch(result) {
                            case 'success':
                                document.getElementById('code'+ idcode).style.display = 'none';
                                box_nf("Thành công", 2);
                                break;
                            default:
                                box_nf("Thất bại", 2);
                                break;
                        }
                    }
                });
            }
        </script>
        <div class="shadow">
            <div class="title"><u><?php echo $_SESSION['user']; ?></u> tạo mã quà tặng</div>
            <div class="content">
                <li>Tổng có: <?php echo number_format($result->num_rows);?></li>
                <li><a href="../">Quay lại</a></li>
                <li><a href="create.php">Tạo mới</a></li>
<?php
$i = 0;
while ($code = $result->fetch_assoc()) {
    echo '
                    <div class="list" id="code'. $code["id"] .'">
                        ID '. $code["id"] .'. Mã: <b style="color:bule">'. $code["code"] .'</b>
                        <br />Hạn Dùng: <b style="color:red">'. $code["time"] .'</b>
                        <br /><a href="./detail.php?id='. $code["id"] .'">Chi tiết</a> - <a onclick="deletecode('. $code["id"] .')">Xóa bỏ</a>
                    </div>
    ';
    $i++;
}
?>
                <p onclick="box_nf('Văn Tú 0.1', 4)" align="right">Thông tin!</p>
            </div>
            <div class="copyright">
                Thiết kế bởi <a href="https://m.facebook.com/nguyenan.362" class="nguyenan.362">Ann</a>
            </div>
        </div>
    </body>
</html>