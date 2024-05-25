<?php
include('../archive/config.php');
if (!$connect)
    exit(0);
if (!$login)
    header('Location: ../login.php.php');
include('../archive/head.php');
?>
    <body>
        <div class="box-nf" id="box-nf"></div>
        <script type="text/javascript" src="../JavaScript/box.js"></script>
        <script language="javascript" src="../JavaScript/jquery-2.0.0.min.js"></script>
        <script language="javascript">
            function createcode(){
                $.ajax({
                    url : "../archive/result.php",
                    type : "post",
                    dataType:"text",
                    data : {
                         giftcode : $('#giftcode').val(),
                         giftlimit : $('#limit').val(),
                         giftpublic : $('#public').val(),
                         gifttime : $('#time').val(),
                         giftitem : $('#item').val(),
                         type : 4
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
            }
        </script>
        <div class="shadow">
            <div class="title"><u><?php echo $_SESSION['user']; ?></u> tạo mã quà tặng</div>
            <div class="content">
                <li><a href="./index.php">Quay lại</a></li>
                <table width="100%">
                    <tr>
                        <td width="30%">Mã:</td>
                        <td><input type="text" class="box-text" id="giftcode" name="giftcode" placeholder="Tên mã quà tặng" /></td>
                    </tr>
                    <tr>
                        <td>Giới hạn:</td>
                        <td><input type="number" class="box-text" id="limit" name="limit" value="-1" placeholder="Giới hạn số lần nhập" /></td>
                    </tr>
                    <tr>
                        <td>Cộng đồng:</td>
                        <td><input type="number" class="box-text" id="public" value="1" name="public" /></td>
                    </tr>
                    <tr>
                        <td>Thời gian:</td>
                        <td><input type="text" class="box-text" id="time" name="time" value="2025-05-28 16:35:00" placeholder="Thời gian cho mã quà tặng" /></td>
                    </tr>
                    <tr>
                        <td>Vật phẩm:</td>
                        <td><input type="text" class="box-text" id="item" name="item" value="[]" placeholder="Vật phẩm" /></td>
                    </tr>
                </table>
                <div><input class="button" type="submit" value="Tạo" onclick="createcode();" /></div>
                <p onclick="box_nf('Văn Tú 0.1', 4)" align="right">Thông tin!</p>
            </div>
            <div class="copyright">
                Thiết kế bởi <a href="https://m.facebook.com/nguyenan.362" class="nguyenan.362">Ann</a>
            </div>
        </div>
    </body>
</html>