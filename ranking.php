
<?php 
  $title = "Xếp hạng - MobiArmy II by Ann"; 
  include './include/head.php';
  include './include/connect.php';
  $sql = "SELECT `user`.`user`, `armymem`.`id`, `armymem`.`xpMax`,`nvXPMax`, `luong`, `xu`, `dvong` FROM `armymem` INNER JOIN `user` ON `armymem`.`id` = `user`.`user_id` ORDER BY `armymem`.`xpMax` DESC LIMIT 10;";
  $top_xp = $game->query($sql);
  $sql = "SELECT `user`.`user`, `armymem`.`id`, `armymem`.`xu` FROM `armymem` INNER JOIN `user` ON `armymem`.`id` = `user`.`user_id` ORDER BY `armymem`.`xu` DESC LIMIT 10;";
  $top_xu = $game->query($sql);
  $sql = "SELECT `user`.`user`, `armymem`.`id`, `armymem`.`luong` FROM `armymem` INNER JOIN `user` ON `armymem`.`id` = `user`.`user_id` ORDER BY `armymem`.`luong` DESC LIMIT 10;";
  $top_luong = $game->query($sql);
  $sql = "SELECT `user`.`user`, `armymem`.`id`, `armymem`.`CSinh` FROM `armymem` INNER JOIN `user` ON `armymem`.`id` = `user`.`user_id` ORDER BY `armymem`.`CSinh` DESC LIMIT 10;";
  $top_CSinh = $game->query($sql);
   $sql = "SELECT `user`.`user`, `armymem`.`id`, `armymem`.`money` FROM `armymem` INNER JOIN `user` ON `armymem`.`id` = `user`.`user_id` ORDER BY `armymem`.`money` DESC LIMIT 10;";
  $top_money = $game->query($sql);
  $sql = "SELECT `user`.`user`, `armymem`.`id`, `armymem`.`dvong` FROM `armymem` INNER JOIN `user` ON `armymem`.`id` = `user`.`user_id` ORDER BY `armymem`.`dvong` DESC LIMIT 10;";
  $top_dvong = $game->query($sql);
  $sql = "SELECT `name`, `icon`, `xp`, `level`, `luong`, `xu`, `mem`, `cup` FROM `clan` ORDER BY `level` DESC LIMIT 10;";
  $top_clan = $game->query($sql);
?>
<div class="bg-content">
  <div class="title">
    <h4>Xếp Hạng Biệt Đội</h4>
  </div>
  <div class="content">
    <table border="0" cellpadding="1" cellspacing="1" style="width:100%">
	    <tbody>
		    <tr>
		       <td width="10%" style="text-align:center;background:#C0C0C0"><strong>Logo</strong></td>
			   <td width="15%" style="text-align:center;background:#C0C0C0"><strong>Thành viên</strong></td>
			    <td width="15%" style="text-align:center;background:#C0C0C0"><strong>Tên</strong></td>
			    <td width="23%" style="text-align:center;background:#C0C0C0"><strong>Kinh nghiệm</strong></td>
				<td width="23%" style="text-align:center;background:#C0C0C0"><strong>Lượng</strong></td>
				<td width="23%" style="text-align:center;background:#C0C0C0"><strong>Xu</strong></td>
				<td width="13%" style="text-align:center;background:#C0C0C0"><strong>Cấp</strong></td>
		    </tr>
		    <?php while ($clan = $top_clan->fetch_assoc()) { ?>
		    <tr>
		      <td style="text-align:center;background:white"><img src="/team/res/icon/<?php echo $clan['icon'] ?>.png"></td>
			  <td style="text-align:center;background:white"><?php echo $clan['mem'] ?></td>
		      <td style="text-align:center;background:white"><?php echo $clan['name'] ?></td>
		      <td style="text-align:center;background:white"><?php echo $clan['xp'] ?></td>
			  <td style="text-align:center;background:white"><?php echo $clan['luong'] ?></td>
			  <td style="text-align:center;background:white"><?php echo $clan['xu'] ?></td>
			  <td style="text-align:center;background:white"><?php echo $clan['level'] ?></td>
		    </tr>
		    <?php } ?>
		  </tbody>
    </table>
  </div>
</div>
<div class="bg-content">
  <div class="title">
    <h4>Xếp Hạng Cao Thủ</h4>
  </div>
  <div class="content">
    <table border="0" cellpadding="1" cellspacing="1" style="width:100%">
	    <tbody>
		    <tr>
			    <td width="25%" style="text-align:center;background:#C0C0C0"><strong>Tên</strong></td>
			    <td style="text-align:center;background:#C0C0C0"><strong>Kinh nghiệm</strong></td>
				<td style="text-align:center;background:#C0C0C0"><strong>Lượng</strong></td>
				<td style="text-align:center;background:#C0C0C0"><strong>Xu</strong></td>
				<td style="text-align:center;background:#C0C0C0"><strong>Cup</strong></td>
				<td style="text-align:center;background:#C0C0C0"><strong>Nv</strong></td>
		    </tr>
		    <?php while ($mem = $top_xp->fetch_assoc()) { ?>
		    <tr>
		      <td style="text-align:center;background:white"><?php echo $mem['user'] ?></td>
		      <td style="text-align:center;background:white"><?php echo $mem['xpMax'] ?></td>
			  <td style="text-align:center;background:white"><?php echo $mem['luong'] ?></td>
			  <td style="text-align:center;background:white"><?php echo $mem['xu'] ?></td>
			  <td style="text-align:center;background:white"><?php echo $mem['dvong'] ?></td>
			  <td style="text-align:center;background:white"><?php echo $mem['nvXPMax'] ?></td>
		    </tr>
		    <?php } ?>
		  </tbody>
    </table>
  </div>
</div>
<div class="bg-content">
  <div class="title">
    <h4>Xếp Hạng Xu</h4>
  </div>
  <div class="content">
    <table border="0" cellpadding="1" cellspacing="1" style="width:100%">
	    <tbody>
		    <tr>
			    <td width="30%" style="text-align:center;background:#C0C0C0"><strong>Tên</strong></td>
			    <td style="text-align:center;background:#C0C0C0"><strong>Xu</strong></td>
		    </tr>
		    <?php while ($mem = $top_xu->fetch_assoc()) { ?>
		    <tr>
		      <td style="text-align:center;background:white"><?php echo $mem['user'] ?></td>
		      <td style="text-align:center;background:white"><?php echo $mem['xu'] ?></td>
		    </tr>
		    <?php } ?>
		  </tbody>
    </table>
  </div>
</div>
<div class="bg-content">
  <div class="title">
    <h4>Xếp Hạng Lượng</h4>
  </div>
  <div class="content">
    <table border="0" cellpadding="1" cellspacing="1" style="width:100%">
    	    <tbody>
    		    <tr>
    			    <td width="30%" style="text-align:center;background:#C0C0C0"><strong>Tên</strong></td>
    			    <td style="text-align:center;background:#C0C0C0"><strong>Lượng</strong></td>
    		    </tr>
    		    <?php while ($mem = $top_luong->fetch_assoc()) { ?>
    		    <tr>
    		      <td style="text-align:center;background:white"><?php echo $mem['user'] ?></td>
    		    	<td style="text-align:center;background:white"><?php echo $mem['luong'] ?></td>
    		    </tr>
    		    <?php } ?>
    		  </tbody>
        </table>
  </div>
</div>
<div class="bg-content">
  <div class="title">
<h4>Xếp Hạng Chuyển sinh</h4>
  </div>
  <div class="content">
    <table border="0" cellpadding="1" cellspacing="1" style="width:100%">
    	    <tbody>
    		    <tr>
    			    <td width="30%" style="text-align:center;background:#C0C0C0"><strong>Tên</strong></td>
    			    <td style="text-align:center;background:#C0C0C0"><strong>Chuyển sinh</strong></td>
    		    </tr>
    		    <?php while ($mem = $top_CSinh->fetch_assoc()) { ?>
    		    <tr>
    		      <td style="text-align:center;background:white"><?php echo $mem['user'] ?></td>
    		      <td style="text-align:center;background:white"><?php echo $mem['CSinh'] ?></td>
    		    </tr>
    		    <?php } ?>
    		  </tbody>
        </table>
  </div>
</div>


<!--footer-->
	</div>
                            <br>
                        </div>
                        <br>

                    </div>
                </div>
            </div>
            <div class="bg_tree"></div>
            
<?php include './include/end.php'; ?>