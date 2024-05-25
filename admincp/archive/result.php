<?php
if ($_POST){
    include('config.php');
    if (!$connect)
        exit(0);
    switch($_POST['type']) {
        case 0:
            include('account.php');
            $uname = $_POST['uname'];
            $passw = $_POST['passw'];
            if ($uname == NULL || $passw == NULL)
                die('Vui lòng điền đầy thông tin!');
            if ($account[$uname] != $passw)
                die('Tài khoản hoặc mật khẩu sai!');
            $_SESSION['user'] = $uname;
            die('success');
            break;
        case 3:
            if (!$login)
                die('cần đăng nhập');
             //GET post user
            $user_id = $_POST['user_id'];
            $uname = $_POST['uname'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $lock = $_POST['lock'];
			
            //GET post xu luong ruong ...
            $CSinh = $_POST['CSinh'];
            $NVCSinh = $_POST['NVCSinh'];
            $xu = $_POST['xu'];
            $luong = $_POST['luong'];
            $XPMax = $_POST['XPMax'];
            $dvong = $_POST['dvong'];
            $item = $_POST['item'];
            $ruongItem = $_POST['ruongItem'];
            $ruongTB = $_POST['ruongTB'];
            //GET post NV
            for ($i = 0; $i < 10; $i++) {
                $NV[($i+1)] = $_POST['NV'. ($i + 1)];
            }
            //SETUP user
            $isuser = $conn->query("UPDATE `user` SET `user` = '". $uname ."', `password` = '". $password ."', `password2` = '". $password2 ."', `lock` = '". $lock ."' WHERE `user_id` = '". $conn->real_escape_string($user_id) ."'; ");
            //SETUP xu luong ruong ...
            $isarmy = $conn->query("UPDATE `armymem` SET `CSinh` = '". $CSinh ."', `nvCSinh` ='". $NVCSinh ."',`xu` = '". $xu ."', `luong` = '". $luong ."', `XPMax` = '". $XPMax ."', `dvong` = '". $dvong ."', `item` = '". $item ."', `ruongItem` = '". $ruongItem ."', `ruongTrangBi` = '". $ruongTB ."' WHERE `id` = '". $conn->real_escape_string($user_id) ."'; ");
             //SETUP NV
             for ($i = 0; $i < 10; $i++) {
                 $conn->query("UPDATE `armymem` SET `NV". ($i + 1) ."` = '". $NV[($i + 1)] ."' WHERE `id` = '". $conn->real_escape_string($user_id) ."'; ");
             }
             //kiem tra xem co hoan thanh khong
             if ($isuser && $isarmy)
                die('success');
            break;
        case 4:
            if (!$login)
                die('cần đăng nhập');
            $giftcode = $conn->real_escape_string($_POST['giftcode']);
            $giftlimit = $conn->real_escape_string($_POST['giftlimit']);
            $giftpublic = $conn->real_escape_string($_POST['giftpublic']);
            $gifttime = $conn->real_escape_string($_POST['gifttime']);
            $giftitem = $conn->real_escape_string($_POST['giftitem']);
            
            $sql = "INSERT INTO `giftcode` (`code`, `limit`, `public`, `time`, `Item`) VALUES ('". $giftcode ."', '". $giftlimit ."', '". $giftpublic ."', '". $gifttime ."', '". $giftitem ."')";
            if ($conn->query($sql))
                die('success');
            echo $giftcode .' '. $giftlimit .' '. $giftpublic .' '. $gifttime .' '. $giftitem;
            break;
        case 5:
            if (!$login)
                die('cần đăng nhập');
            $idcode = $_POST['code_id'];
            if ($conn->query("DELETE FROM `giftcode` WHERE `id` = '". $conn->real_escape_string($idcode) ."'; "))
                die('success');
            die('Thất bại');
            break;
        case 6:
            if (!$login)
                die('cần đăng nhập');
            $idcode = $conn->real_escape_string($_POST['code_id']);
            $giftcode = $conn->real_escape_string($_POST['giftcode']);
            $giftlimit = $conn->real_escape_string($_POST['giftlimit']);
            $giftiddblist = $conn->real_escape_string($_POST['giftiddblist']);
            $giftpublic = $conn->real_escape_string($_POST['giftpublic']);
            $gifttime = $conn->real_escape_string($_POST['gifttime']);
            $giftitem = $conn->real_escape_string($_POST['giftitem']);
            
            if ($conn->query("UPDATE `giftcode` SET `code` = '". $giftcode ."', `limit` = '". $giftlimit ."', `iddblist` = '". $giftiddblist ."', `public` = '". $giftpublic ."', `time` = '". $gifttime ."', `Item` = '". $giftitem ."' WHERE `id` = '". $idcode ."'; "))
                die('success');
            die('Thất bại');
            break;

    }
}