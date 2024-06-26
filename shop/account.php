<?php
if (!isset($_GET['user_id'])) {
  return;
}
$title = "Thông Tin - MobiArmy II by Ann";
include '../include/head.php';
include '../include/connect.php';
$id = $_GET['user_id'];
$mem = $game->query("SELECT * FROM `armymem` WHERE `id` = ".$id." LIMIT 1;");
$us = $game->query("SELECT * FROM `user` WHERE `user_id` = ".$id." LIMIT 1;");
if ($mem->num_rows == 1 && $us->num_rows == 1) {
  $createdCharacter = true;
  $mem = $mem->fetch_assoc();
  $us = $us->fetch_assoc();
} else {
  header('location: /profile.php');
}

if ($createdCharacter) {
  $nameCharacter = array("Gunner", "Miss 6", "Electrician", "King Kong", "Rocketer", "Granos", "Chicky" ,"Tarzan", "Apache", "Magenta");
  $nvstt = $mem['sttnhanvat'];
  $characterPurchased = array();
  $ruongTB = json_decode($mem['ruongTrangBi'], true);
  $len = count($ruongTB);
  $info = array();
  for ($i = 0; $i < 10; $i++) {
    $characterPurchased[$i] = ($nvstt & 1) > 0;
    $info[$i] = json_decode($mem['NV'.($i + 1)], true);
    $nvstt = $nvstt / 2;
  }
}
?>
<div class="bg-content content">
  <?php
    if (!$createdCharacter) {
      echo '<div class="bg-content" style="text-align:right">Tài khoản này chưa tạo nhân vật!</div>';
      include './include/end.php';
      exit();
    }
  ?>
  <h3 style="text-align: center"><b>THÔNG TIN TÀI KHOẢN</b></h3>
  <div class="title">
    <h4 style="font-size: 12px">THÔNG TIN CÁ NHÂN</h4>
  </div>
  <ul>
    <li><b>ID: </b> <?php echo $us['user_id'] ?></li>
    <li><b>Tài khoản: </b> <?php echo $us['user'] ?></li>
    <li><b>Xu: </b> <span style="color:red"><?php echo $mem['xu'] ?></span></li>
    <li><b>Lượng: </b> <span style="color:red"><?php echo $mem['luong'] ?></span></li>
    <li><b>Danh vọng: </b> <span style="color:red"><?php echo $mem['dvong'] ?></span></li>
    <li><b>Tiền: </b> <span style="color:red"><?php echo $mem['money'] ?></span></li>
  </ul>
  <?php for ($i = 0; $i < 10; $i++) { 
    if (!$characterPurchased[$i]) {
      continue;
    }
    $nextXP = 500 * $info[$i]['lever'] * ($info[$i]['lever'] + 1);
    $leverPercen = $info[$i]['xp'] * 100 / $nextXP;
    $ability = array(0,0,0,0,0);
    $invAdd = array(0,0,0,0,0);
    $percenAdd = array(0,0,0,0,0);
    $NVData = $game->query("SELECT `sat_thuong` FROM `nhanvat` WHERE `nhanvat_id` = ".($i + 1)." LIMIT 1;")->fetch_assoc();
    $nv_st = $NVData['sat_thuong'];
    $dataEquip = $info[$i]['data'];
    for ($c = 0; $c < 6; $c++) {
      if ($dataEquip[$c] < 0 || $dataEquip[$c] > $len) {
        continue;
      }
      $eq = $ruongTB[$dataEquip[$c]];
      for ($d = 0; $d < 5; $d++) {
        $invAdd[$d] += $eq['invAdd'][$d];
        $percenAdd[$d] += $eq['percenAdd'][$d];
      }
    }
    $ability[0] = 1000 + $info[$i]['pointAdd'][0] * 10 + $invAdd[0] * 10;
    $ability[0] += (1000 + $info[$i]['pointAdd'][0]) * $percenAdd[0] / 100;
    $ability[1] = $nv_st * (100 + ($invAdd[1] + $info[$i]['pointAdd'][1]) / 3 + $percenAdd[1]) / 100;
    $ability[2] = ($invAdd[2] + $info[$i]['pointAdd'][2]) * 10;
    $ability[2] += $ability[2] * $percenAdd[2] / 100;
    $ability[3] = ($invAdd[3] + $info[$i]['pointAdd'][3]) * 10;
    $ability[3] += $ability[3] * $percenAdd[3] / 100;
    $ability[4] = ($invAdd[4] + $info[$i]['pointAdd'][4]) * 10;
    $ability[4] += $ability[4] * $percenAdd[4] / 100;
  ?>
  <div class="title">
    <h4 style="font-size: 12px">THÔNG TIN NHÂN VẬT <? echo $nameCharacter[$i]. ' <a onclick="view('.$us['user_id'].', '.$i.')" style="color:red">[Trang bị]</a>' ?></h4>
  </div>
  <table width="100%">
    <tr>
      <td width="20%" style="text-align:center">
        <?php echo '<img src="/'.$us['user_id'].'/'.($i + 1).'.png" />' ?>
      </td>
      <td width="80%" >
        <li><b>Cấp: </b> <span style="color:red"><?php echo $info[$i]['lever'] ?></span></li>
        <li><b>Kinh nghiệm: </b> <span style="color:red"><?php echo $info[$i]['xp'].'/'.$nextXP.' ('.(int) $leverPercen.'%)'; ?></span></li>
        <li><b>Sinh lực: </b> <span style="color:red"><?php echo (int) $ability[0] ?></span></li>
        <li><b>Sức mạnh: </b> <span style="color:red"><?php echo (int) $ability[1] ?></span></li>
        <li><b>Phòng thủ: </b> <span style="color:red"><?php echo (int) $ability[2] ?></span></li>
        <li><b>May mắn: </b> <span style="color:red"><?php echo (int) $ability[3] ?></span></li>
        <li><b>Đồng đội: </b> <span style="color:red"><?php echo (int) $ability[4] ?></span></li>
      </td>
    </tr>
  </table>
  <?php } ?>
</div>
<?php
include '../include/end.php';
?>