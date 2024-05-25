<?php
include('../archive/config.php');
if (!$connect)
    exit(0);
if (!$login)
    header('Location: ../login.php.php');
$idgiftcode = $_GET['id'];
$result = $conn->query("SELECT * FROM `giftcode` WHERE `id` = ". $idgiftcode ."; ");
$giftcode = $result->fetch_assoc();
include('../archive/head.php');
?>
    <body>
        <div class="box-nf" id="box-nf"></div>
        <script type="text/javascript" src="../JavaScript/box.js"></script>
        <script language="javascript" src="../JavaScript/jquery-2.0.0.min.js"></script>
        <script language="javascript">
            function editcode(type){
                switch(type) {
                    case 0:
                        $.ajax({
                            url : "../archive/result.php",
                            type : "post",
                            dataType:"text",
                            data : {
                                 code_id : <?php echo $giftcode['id'];?>,
                                 giftcode : $('#giftcode').val(),
                                 giftlimit : $('#limit').val(),
                                 giftiddblist : $('#iddblist').val(),
                                 giftpublic : $('#public').val(),
                                 gifttime : $('#time').val(),
                                 giftitem : $('#item').val(),
                                 type : 6
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
            <div class="title"><u><?php echo $_SESSION['user']; ?></u> sửa mã quà tặng</div>
            <div class="content">
                <li><a href="./index.php">Quay lại</a></li>
                <table width="100%">
                    <tr>
                        <td width="30%">Mã:</td>
                        <td><input type="text" class="box-text" id="giftcode" name="giftcode" placeholder="Tên mã quà tặng" value="<?php echo $giftcode['code'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Giới hạn:</td>
                        <td><input type="number" class="box-text" id="limit" name="limit" value="<?php echo $giftcode['limit'];?>" placeholder="Giới hạn số lần nhập" /></td>
                    </tr>
                    <tr>
                        <td>Danh sách iddb:</td>
                        <td><textarea class="box-text" id="iddblist" name="iddblist" placeholder="Danh sách thành viên nhập mã quà tặng"><?php echo $giftcode['iddblist'];?></textarea></td>
                    </tr>
                    <tr>
                        <td>Cộng đồng:</td>
                        <td><input type="number" class="box-text" id="public" value="<?php echo $giftcode['public'];?>" name="public" /></td>
                    </tr>
                    <tr>
                        <td>Thời gian:</td>
                        <td><input type="text" class="box-text" id="time" name="time" value="<?php echo $giftcode['time'];?>" placeholder="Thời gian cho mã quà tặng" /></td>
                    </tr>
                    <tr>
                        <td>Vật phẩm:</td>
                        <td><input type="text" class="box-text" id="item" name="item" value="<?php echo htmlspecialchars($giftcode['Item']);?>" placeholder="Vật phẩm" /></td>
                    </tr>
                </table>
                <div><input class="button" type="submit" value="Lưu lại" onclick="editcode(0);" /></div>
                <p onclick="box_nf('Văn Tú 0.1', 4)" align="right">Thông tin!</p>
            </div>
            <div class="copyright">
                Thiết kế bởi <a href="https://m.facebook.com/nguyenan.362" class="nguyenan.362">Ann</a>
            </div>
        </div>
    </body>
</html>