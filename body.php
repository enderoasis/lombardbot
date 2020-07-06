<?php
use PDO;
    $user = 'lombardb_didar';
    $pass = '7likC9~2';
    $db = new PDO('mysql:host=srv-db-plesk01.ps.kz:3306;dbname=lombardb_telegrambot', $user, $pass);

    // Делаем выборку из таблицы лотов
    $stmt = $db->query("SELECT * FROM goods")->fetchAll(PDO::FETCH_ASSOC);

  

?>
<section id="main-content">
<section class="wrapper site-min-height">
  <h3><i class="fa fa-angle-right"></i> Список лотов</h3>
  <hr>
  <?php foreach($stmt as $row): ?>
 
  
        <h2><strong><?php echo  $row['tittle']; ?></strong></h2><br />
        <i>Категория: <?php echo $row['category']; ?></i> / 
        <i>Дата публикации: <?php echo $row['date']; ?></i><br /><br />
        <p><?php echo $row['description']; ?></p>
        <p style="text-align:right; text-decoration:underline;">
         <a class="fancybox" href="<?=$row['location']  ?>">
          <center>  <img class="img-responsive"  src="<?=$row['location']  ?>"></a> </center>
        </p>
 
 
<?php endforeach; ?>
    <!-- col-lg-4 -->
   
  <!-- /row -->
</section>
<!-- /wrapper -->
</section>