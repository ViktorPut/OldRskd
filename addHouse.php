<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleadd.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <title>Добавление</title>
</head>
<body>
  <?php
  include "header.php";
  if (!isset($_COOKIE[USER_ID])){
      exit();
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-offset-6 col-lg-6">
        <form class="form-horizontal" action="AddHouseHandler.php" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="floors" class="col-lg-4 control-label">Этаж:</label>
            <div class="col-lg-8">
              <input type="number" class="form-control" id="floors" name="floors" placeholder="Этаж">
            </div>
          </div>
          <div class="form-group row">
            <label for="rooms" class="col-lg-4 control-label">Количество комнат:</label>
            <div class="col-lg-8">
              <input type="number" class="form-control" id="rooms" name="rooms" placeholder="Количество комнат">
            </div>
          </div>
          <div class="form-group row">
            <label for="space" class="col-lg-4 control-label">Площадь:</label>
            <div class="col-lg-8">
              <input type="number" class="form-control" id="space" name="space" placeholder="Площадь">
            </div>
          </div>
          <div class="form-group row">
            <label for="cost" class="col-lg-4 control-label">Цена:</label>
            <div class="col-lg-8">
              <input type="number" class="form-control" id="cost" name="cost" placeholder="Цена">
            </div>
          </div>
          <div class="form-group row">
            <label for="city" class="col-lg-4 control-label">Город:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="city" name="city" placeholder="Город">
            </div>
          </div>
          <div class="form-group row">
            <label for="district" class="col-lg-4 control-label">Район:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="district" name="district" placeholder="Район">
            </div>
          </div>
          <div class="form-group row">
            <label for="street" class="col-lg-4 control-label">Улица:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="street" name="street" placeholder="Улица">
            </div>
          </div>
            <div class="form-group row">
                <label for="number" class="col-lg-4 control-label">Номер дома:</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="number" name="number" placeholder="Номер дома">
                </div>
            </div>
          <div class="form-group row">
            <label for="type" class="col-lg-4 control-label">Тип:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="type" name="type" placeholder="Тип">
            </div>
          </div>
          <div class="form-group row">
            <label for="category" class="col-lg-4 control-label">Категория:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="category" name="category" placeholder="Категория">
            </div>
          </div>
          <div class="form-group row">
            <label for="rc" class="col-lg-4 control-label">Жилой массив:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="rc" name="rc" placeholder="Жилой массив">
            </div>
          </div>
          <div class="form-group row">
            <label for="balcony" class="col-lg-4 control-label">Балкон/лоджия:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="balcony" name="balcony" placeholder="Балкон/лоджия/отсутствует">
            </div>
          </div>
          <div class="form-group row">
            <label for="file" class="col-lg-4 control-label">Изображение:</label>
            <div class="col-lg-8">
                <input type="file" name="userfile[]" id="file" multiple="multiple">
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-lg-4 control-label">Описание:</label>
            <div class="col-lg-8">
              <textarea rows="10" class="form-control" id="description" name="description"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <button type="submit" class="btn btn-success btn-lg">Добавить</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>

