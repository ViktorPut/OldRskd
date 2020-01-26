<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleaboutus.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <title>О нас</title>
</head>
<body>
    <?php include 'header.php'?>
    <div class="section">
    	<div class="container">
    		<div class="row users">
                <?php
                require_once 'php/SQL/UserSQL.php';
                require_once 'ProjConstants.php';

                $userSQL = new UserSQL();
                $usersTemp = $userSQL->getAll();
                foreach ($usersTemp as $userTemp){
                    if($userTemp->getRole()->getID() == UserSQL::simpleUser){
                        $users[] = $userTemp;
                    }
                }
                if(!isset($users)){
                    exit();
                }
                foreach ($users as $user):
                ?>
    			<div class="col-lg-6">
                    <div class=" usercontainer">
    				<div class="row user">
    					 <div class="col-lg-4 userphoto">
    					 	<img src="<?php echo $user->getPhoto(); ?>" alt="Фото сотрудника" class="rounded">
    					 </div>
    					 <div class="col-lg-8 userinfo">
    					 	<p class="FIO"><?php echo $user->getName(); ?></p>
    					 	<p class="phonenumber font-italic"><?php echo $user->getPhone(); ?></p>
    					 	<p class="email font-italic"><?php echo $user->getEmail(); ?></p>
    					 	<p class="about"><?php echo $user->getInfo(); ?></p>
    					 </div>
    				</div>
                    </div>
    			</div>
                <?php
                    endforeach; ?>
    		</div>
    	</div>
    </div>
</body>
</html>