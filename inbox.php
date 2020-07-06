<?php include 'header.php';?>
 
 

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
                    <label for="cname" class="control-label col-lg-2">Название слота (обязательно)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="tittle" name="name" minlength="2" type="text" required />
                    </div>
                  </div>
                       <div class="form-group ">
                   <select class="form-control" name="category">
                  <option>Выберите категорию</option>
                  <option>Техника</option>
                  <option>Драгоценные металлы</option>
                  <option>Авто</option>
                  <option>Изделия</option>
                </select></div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">E-Mail (обязательно)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="email" type="email" name="email" required />
                    </div>
                  </div>
                  <div class="form-group last">
                  <label class="control-label col-md-3">Загрузите фотографию лота</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="https://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
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
           </div>
         </div>
     
      </section>
     </section>
   
   
    <?php include 'footer.php';?>

