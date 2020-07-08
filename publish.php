<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Lombardbot</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
<script> <script>
13
window.addEventListener("DOMContentLoaded", function() {
14
function setCursorPosition(pos, elem) {
15
    elem.focus();
16
    if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
17
    else if (elem.createTextRange) {
18
        var range = elem.createTextRange();
19
        range.collapse(true);
20
        range.moveEnd("character", pos);
21
        range.moveStart("character", pos);
22
        range.select()
23
    }
24
}
25
 
26
function mask(event) {
27
    var matrix = "+7 (___) ___ ____",
28
        i = 0,
29
        def = matrix.replace(/\D/g, ""),
30
        val = this.value.replace(/\D/g, "");
31
    if (def.length >= val.length) val = def;
32
    this.value = matrix.replace(/./g, function(a) {
33
        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
34
    });
35
    if (event.type == "blur") {
36
        if (this.value.length == 2) this.value = ""
37
    } else setCursorPosition(this.value.length, this)
38
};
39
    var input = document.querySelector("#tel");
40
    input.addEventListener("input", mask, false);
41
    input.addEventListener("focus", mask, false);
42
    input.addEventListener("blur", mask, false);
43
});
44
  </script>
</script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>Lombard<span>Bot</span></b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Выход</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
          <li class="mt">
            <a href="board.php">
              <i class="fa fa-list"></i>
              <span>Список  лотов</span>
              </a>
          </li>
          
          
        
        
          <li>
            <a href="inbox.html">
              <i class="fa fa-plus"></i>
              <span>Выложить слот </span>
              </a>
          </li>
         
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Опубликовать слот</h3>
        <!-- BASIC FORM VALIDATION -->
       
        <!-- /row -->
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" enctype="multipart/form-data" id="commentForm" method="post" action="insertdata.php">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Название слота </label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="tittle" name="name" minlength="2" type="text" required />
                    </div>
                  </div>
                       <div class="form-group " style="width: 288px; margin-left: 1px;">
                   <select class="form-control" name="category">
                  <option>Выберите категорию</option>
                  <option>Техника</option>
                  <option>Драгоценные металлы</option>
                  <option>Авто</option>
                  <option>Изделия</option>
                </select></div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Email </label>
                    <div class="col-lg-10">
                      <input class="form-control " id="email" type="email" name="email" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Номер телефона </label>
                    <div class="col-lg-10">
                    <input class="form-control" name="telephone" value="" id="tel" required >   
                    </div>
                  </div>
                  <div class="form-group last">
                  <label class="control-label col-md-3">Загрузите фотографию лота</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="https://balluff-ua.com/wp-content/themes/balluff/img/noImg.jpg" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Выбрать</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Поменять</span>
                        <input type="file" name="image" class="default" />
                        </span>
                        <a href="#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Удалить</a>
                      </div>
                    </div>
                   
                  </div>
                </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Описание  </label>
                    <div class="col-lg-10">
                      <textarea class="form-control " id="ccomment" name="description" ></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="upload">Опубликовать</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
     
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
       
    
        <a href="form_validation.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/form-validation-script.js"></script>

</body>

</html>
