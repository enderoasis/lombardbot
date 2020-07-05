<?php
use PDO;
    $user = 'lombardb_didar';
    $pass = '7likC9~2';
    $db = new PDO('mysql:host=srv-db-plesk01.ps.kz:3306;dbname=lombardb_telegrambot', $user, $pass);

    // Делаем выборку из таблицы лотов
    $stmt = $db->query("SELECT * FROM goods")->fetchAll(PDO::FETCH_ASSOC);

    foreach($stmt as $row) {
     
     $id=$row['id'];
     $tittle = $row['tittle'];
     $category = $row['category'];
     $description = $row['description'];
     $path = $row['location'];
     
     echo $row['tittle'] . "<br />";
     echo $row['category'] . $row['time'] . "<br />";
     echo $row['description'];
 
    }

?><section id="main-content">
<section class="wrapper site-min-height">
  <h3><i class="fa fa-angle-right"></i> Список лотов</h3>
  <hr>
  <?php foreach($stmt as $row): ?>
 
    <div style="padding:10px; margin-bottom:10px; border-bottom:#333 2px solid;">
        <strong><?php echo  $row['tittle']; ?></strong><br />
        <i>Автор: <?php echo $row['category']; ?></i> / 
        <i>Дата публикации: <?php $row['date']; ?></i><br /><br />
        <p><?php echo $row['description']; ?></p>
        <p style="text-align:right; text-decoration:underline;">
        <a class="fancybox" href="<?=$row['location']  ?>">
            <img class="img-responsive" src="<?=$row['location']  ?>">Подробнее</a>
        </p>
    </div>
 
<?php endforeach; ?>
    <!-- col-lg-4 -->
   
  <!-- /row -->
</section>
<!-- /wrapper -->
</section>