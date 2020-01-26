<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <title>Обратная связь</title>
</head>
<body>
    <?php include 'header.php';?>
    <section>
		<div class="container" style="padding-top: 10em">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-9">
					<form action="FeedbackHandler.php" method="post">
  						<div class="form-group">
    						<label for="InputEmail1" style="font-size:1.5em;">Ваш email:</label>
    						<input type="email" class="form-control" id="InputEmail1" placeholder="Ваш email" name="email" required>
 	 					</div>
 	 					<div class="form-group">
 	 						<label for="InputMessage" style="font-size:1.5em;">Сообщение:</label>
 	 						<textarea class="form-control" id="InputMessage" name="message"
 	 					rows="15" placeholder="Сообщение..."></textarea>
 	 					</div>
  						<button type="submit" class="btn btn-success">Отправить обращение</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
</html>