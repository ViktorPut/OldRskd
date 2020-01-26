<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet"  href="css/stylelogin.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <title>Авторизация</title>
</head>
<body>

    <?php include 'header.php';?>
    <div class="block-body">

      <div class="container">
        <div class="login-cont">
          <!-- страницу в action -->
          <form action="AuthoriseHandler.php" method="post">
              <div class="field">
                <H1>Авторизация</H1>
                <label>
                  <input type="text" placeholder="Логин" name="login" required="Заполните">
                </label>
              </div>
              <div class="field"> 
                <label>
                  <input type="password" name="password" placeholder="Пароль" required="Заполните">
              </label>
              </div>
              <div class="button">
                <input type="submit" name="button" value="Вход">
              </div>
          </form>
        </div>
      </div>

      <footer>
        
      </footer>
    </div>
</body>