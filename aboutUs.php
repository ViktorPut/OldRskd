<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleaboutus.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
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
            <div class="row philosophy">
                <div class="col-lg-12">
                    <p class="header_info">Философия</p>
                    <p>Мы стремимся к созданию финансово устойчивой, прибыльной и хорошо управляемой компании, в то же время создавая рынок "Ведущей" организации обслуживания на основе профессионализма, честности и персонализированном обслуживании клиентов.</p>
                </div>
            </div>
            <div class="row mission">
                <div class="col-lg-12">
                    <p class="header_info">Миссия</p>
                    <p>Миссия компании заключается в том, что мы осваиваем, укрепляем и хотим сохранить ведущие позиции на рынке недвижимости РФ, а также с ближним и дальним зарубежьем в области улучшения качества жизни населения. На основе изучения потребностей населения, изучения динамики рынка, быстрого реагирования к изменяющимся рыночным условиям повышать свой профессионализм и оказывать услуги на максимально высоком уровне.</p>
                </div>
            </div>
            <div class="row users">
                <div class="col-lg-12">
                    <p class="header_info">Наши сотрудники</p>
                </div>
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