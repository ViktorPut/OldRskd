<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleinfo.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <title>Обзор объекта</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php

            require_once 'php/SQL/HousingSQL.php';
            require_once 'ProjConstants.php';
//            require_once 'php/Entity/HousingClass.php';
            if (!isset($_POST['house'])){
                die('SOME ERROR. House id is not supplied');
            }
            $objectSQL = new HousingSQL();
            $object = $objectSQL->getByID($_POST['house']);
        ?>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
              <div class="image">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <?php for( $i = 1; $i < count($object->getPhotos()); $i++):?>
                              <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>"></li>
                          <?php endfor;?>
                      </ol>
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img class="d-block w-100" src="<?php echo $object->getPhotos()[0];?>" alt="Изображение">
                          </div>
                          <?php for( $i = 1; $i < count($object->getPhotos()); $i++):?>
                              <div class="carousel-item">
                                  <img class="d-block w-100" src="<?php echo $object->getPhotos()[$i];?>" alt="Изображение">
                              </div>
                          <?php endfor;?>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
              </div>
          </div>
          <div class="col-lg-5">
            <div class="info">
              <!-- Админ -->
                <?php if(isset($_COOKIE[USER_ID])): ?>
              <div class="form">
                <form action="updateHouse.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="space" class="col-lg-4 control-label">Площадь м<sup>2</sup>:</label>
                        <div class="col-lg-8">
                            <input type="float" class="form-control" id="space" name="space" value="<?php echo $object->getSpace(); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cost" class="col-lg-4 control-label">Цена:</label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control" id="cost" name="cost" value="<?php echo $object->getCost(); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-lg-4 control-label">Город:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $object->getAddressObject()->getCity()->getName(); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="district" class="col-lg-4 control-label">Район:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="district" name="district" value="<?php echo $object->getAddressObject()->getDistrict()->getName(); ?>"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="street" class="col-lg-4 control-label">Улица:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="street" name="street" value="<?php echo $object->getAddressObject()->getStreet()->getName(); ?>"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="number" class="col-lg-4 control-label">Номер дома:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="number" name="number" value="<?php echo $object->getAddressObject()->getNumber(); ?>"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="floors" class="col-lg-4 control-label">Этаж:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="floors" name="floors" value="<?php echo $object->getFloorsNumber(); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rooms" class="col-lg-4 control-label">Количество комнат:</label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control" id="rooms" name="rooms" value="<?php echo $object->getRoomsNumber(); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-lg-4 control-label">Тип:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="type" name="type" value="<?php echo $object->getHouseType()->getName(); ?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-lg-4 control-label">Категория:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="category" name="category" value="<?php echo $object->getCategory()->getName(); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rc" class="col-lg-4 control-label">Жилой массив:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="rc" name="rc" value="<?php echo $object->getRcObject()->getName(); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="balcony" class="col-lg-4 control-label">Балкон/лоджия:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="balcony" name="balcony" value="<?php echo $object->getBalcony()->getName(); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-lg-4 control-label">Описание:</label>
                        <div class="col-lg-8">
                            <textarea rows="10" class="form-control" id="description" name="description"><?php echo $object->getDescription(); ?></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $object->getID(); ?>">
                  <label>Добавить изображения:
                    <input type="file" name="userfile[]" id="name" multiple="multiple">
                  </label>
                  <br>
                  <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
                </form>
                <br>
                  <?php
                  require_once 'ProjConstants.php';
                  require_once 'php/SQL/UserSQL.php';
                  $role = 0;
                  if(isset($_COOKIE[USER_ID])){
                      $sql = new UserSQL();
                      $user = $sql->getByID($_COOKIE[USER_ID]);
                      $role = $user->getRole()->getID();
                  }

                  if($role == UserSQL::manager):
                  ?>
                <form action="deleteHouse.php" method="POST">
                  <input type="hidden" name="deleteID" value="<?php echo $object->getID(); ?>">
                  <button type="submit" class="btn btn-danger btn-lg">Удалить</button>
                </form>
                  <?php endif; ?>
              </div>
                <?php else: ?>
<!--             Обычный пользователь> -->
              <div class-"information">
                  <p>Площадь: <?php echo $object->getSpace(); ?>м<sup>2</sup></p>
                  <p>Цена: <?php echo $object->getCost(); ?></p>
                  <p>Адрес: <?php echo $object->getAddressObject()->getFullName(); ?></p>
                  <p>Количество комнат: <?php echo $object->getRoomsNumber(); ?></p>
                  <p>Этаж: <?php echo $object->getFloorsNumber(); ?></p>
                <?php if( $object->getHouseType()->getName() !== ""):?>
                  <p>Тип: <?php echo $object->getHouseType()->getName(); ?></p>
                <?php endif;?>
                <?php if( $object->getCategory()->getName() !== ""):?>
                  <p>Категория: <?php echo $object->getCategory()->getName(); ?></p>
                <?php endif;?>
                <?php if( $object->getRcObject()->getName() !== ""):?>
                  <p>ЖК: <?php echo $object->getRcObject()->getName(); ?></p>
                <?php endif;?>
                <?php if( $object->getBalcony()->getName() !== ""):?>
                  <p>Наличие балкона: <?php echo $object->getBalcony()->getName(); ?></p>
                <?php endif;?>
              </div>
                <?php endif; ?>
            </div>
          </div>
<!--          Обычный пользователь-->
          <?php if(!isset($_COOKIE[USER_ID])): ?>
          <div class="col-lg-12">
            <p>Описание: <?php echo $object->getDescription(); ?></p>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
</body>
</html>