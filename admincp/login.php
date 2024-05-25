<?php
include('./archive/config.php');
if (!$connect)
    exit(0);
if ($login)
    header('Location: index.php');
include('./archive/head.php');
?>
    <body>
        <script language="javascript" src="./JavaScript/jquery-2.0.0.min.js"></script>
        <script language="javascript">
            function login(){
                $.ajax({
                    url : "./archive/result.php",
                    type : "post",
                    dataType:"text",
                    data : {
                         uname : $('#uname').val(),
                         passw : $('#passw').val()
                    },
                    success : function (result){
                        switch(result) {
                            case 'success':
                                window.location="index.php";
                                break;
                            default:
                                box_nf(result, 2);
                                break;
                        }
                    }
                });
            }
        </script>
        <div class="box-nf" id="box-nf"></div>
        <script type="text/javascript" src="./JavaScript/box.js"></script>
        <div class="shadow">
            <div class="title">Đăng nhập vào quản lý</div>
            <div class="content">
                <table width="100%">
                    <tr>
                        <td width="30%">Tài khoản:</td>
                        <td><input type="text" class="box-text" id="uname" name="uname" placeholder="Tên tài khoản" /></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu:</td>
                        <td><input type="password" class="box-pass" id="passw" name="passw" placeholder="Mật khẩu" /></td>
                    </tr>
                </table>
                <div><input class="button" type="submit" value="Đăng Nhập" onclick="login();" /></div>
            </div>
            <div class="copyright">
                Thiết kế bởi <a href="https://m.facebook.com/nguyenan.362" class="vantu">Ann</a>
            </div>
        </div>
    </body>
</html>