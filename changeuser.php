<?php
$title = "Đổi Tên Nhân Vật - MobiArmy 2 by Ann";
include './include/head.php';
include './include/connect.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: /login.php');
  exit;
}
$error   = '';
$success = '';
$isError = false;
if (isset($_POST['change'])) {
    $old_user              = $_POST['old_user'];
    $user             = $_POST['user'];
    $user_confirmation = $_POST['user_confirmation'];
    if ($old_user == null) {
        $isError = true;
        $error .= '<span class="invalid-feedback" role="alert" style="color:red"><strong>Không được để trống tên cũ!</strong></span><br>';
    }
    if ($user == null) {
        $isError = true;
        $error .= '<span class="invalid-feedback" role="alert" style="color:red"><strong>Không được để trống tên!</strong></span><br>';
    }
    if ($user_confirmation == null) {
        $isError = true;
        $error .= '<span class="invalid-feedback" role="alert" style="color:red"><strong>Không được để trống tên xác nhận!</strong></span><br>';
    }
    if ($user != null && $user_confirmation != null && $user != $user_confirmation) {
        $isError = true;
        $error .= '<span class="invalid-feedback" role="alert" style="color:red"><strong>Tên xác nhận không khớp!</strong></span><br>';
    }
    if (!$isError) {
      $sql = "UPDATE `user` SET `user` = '".$game->real_escape_string($user)."' WHERE `user_id` = ".$user_id." AND `user` = '".$old_user."';";
      $game->query($sql);
      if ($game->affected_rows > 0) {
        $success = '<span class="invalid-feedback" role="alert" style="color:green"><strong>Đổi Tên thành công!</strong></span><br>';
      } else {
        $error = '<span class="invalid-feedback" role="alert" style="color:red"><strong>Tên cũ không chính xác!</strong></span><br>';
      }
    }
}
?>
<div class="bg-content">
  <div class="content">
    <div class="title">
      <h4>Đổi Tên Nhân Vật</h4>
    </div>
    <div class="content" style="text-align:center">
      <form action="/changeuser.php" method="post">
        <span style="margin-left:-35px; font-family: AVO, Arial !important;">Tên cũ của nhân vật</span><br>
        <input name="old_user" style="margin-top:3px; margin-bottom:5px"><br>
        <span  style="margin-left:-105px;font-family: AVO, Arial !important;"> Tên mới </span><br>
        <input name="user" type="user" style="margin-top:3px; margin-bottom:5px"><br>
        <span  style="margin-left:-52px;font-family: AVO, Arial !important;"> Nhập lại Tên mới </span><br>
        <input name="user_confirmation" type="user" style="margin-top:3px; margin-bottom:5px"><br>
        <?php echo $error; echo $success; ?>
        <button name="change">Đổi</button><br><br>
      <form>
    </div>
  </div>
</div>
	
<?php
include './include/end.php';
?>