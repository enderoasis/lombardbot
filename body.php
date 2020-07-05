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
  <div class="row mt">
   
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">

      <div class="project-wrapper">
        <div class="project">
          <div class="photo-wrapper">
            <div class="photo">
              <a class="fancybox" href="<?=$path?>"><img class="img-responsive" src="<?=$path?>" alt=""></a>
            </div>
            <div class="overlay"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- col-lg-4 -->
   
  <!-- /row -->
</section>
<!-- /wrapper -->
</section>