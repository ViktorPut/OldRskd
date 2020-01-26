<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleUpdateUser.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <title>Редактирование профиля</title>
</head>
<body>
    <?php include 'header.php'; ?>
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="editInfo">
                        <?php
                            require_once 'ProjConstants.php';
                            require_once 'php/SQL/UserSQL.php';
                            if(!isset($_COOKIE[USER_ID])){
                                exit();
                            }
                            $sql = new UserSQL();
                            $user = $sql->getByID($_COOKIE[USER_ID]);
                        ?>
						<form action="updateUserHandler.php" method="post" enctype="multipart/form-data">
                            <div class="image">
                                <img src="<?php echo $user->getPhoto();?>">
                            </div>
							<label>ФИО:
								<input type="text" name="name" value="<?php echo $user->getName(); ?>">
							</label>
							<label>Эл. Почта:
								<input type="email" name="email" value="<?php echo $user->getEmail(); ?>">
							</label>
							<label>Номер телефона:
								<input type="text" name="phone" value="<?php echo $user->getPhone(); ?>">
							</label>
                            <label>Позиция в списке:
                                <input type="number" name="number" value="<?php echo $user->getRank(); ?>">
                            </label>
							<label>Информация о себе:
								<textarea maxlength="1000" rows="10" rows="10" name="info"><?php echo $user->getInfo(); ?></textarea>
							</label>
							<label>Обновить картинку профиля:
                                <p><input type="file" name="userfile" id="file"></p>
							</label>
                            <label>Новый пароль:
                                <input type="text" name="pass">
                            </label>
							<br>
							<input type="submit" value="Изменить данные">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>