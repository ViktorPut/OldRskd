<?php session_start();
//header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
//header("Pragma: no-cache"); // HTTP 1.0.
//header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></sc>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <title>Роскошный дом</title>
</head>
<body>
    <?php include 'header.php';
    ?>

    <div class="section">
        <div class="container">
            <?php
                require_once 'php/SQL/HousingSQL.php';
                require_once 'php/FilterClass.php';
//
                $role = 0;
                if(isset($_COOKIE[USER_ID])) {
                    $userSQL = new UserSQL();
                    $user = $userSQL->getByID($_COOKIE[USER_ID]);
                    $role = $user->getRole()->getID();
                }
            ?>
            <div class="row">
                <?php if($role == UserSQL::manager):?>
                <div class="col-lg-4">
                    <div class="add_house">
                        <form action="addHouse.php">
                            <button type="submit" class="btn btn-success btn-lg">+Добавить объявление</button>
                        </form>
                    </div>
                </div>
                <?php  endif; ?>
                <?php if($role != 0 ):?>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <form action="updateUser.php">
                        <button type="submit" class="btn btn-primary btn-lg">Редактировать профиль</button>
                    </form>
                </div>
                <?php  endif; ?>
            </div>
<!--             <div class="row">-->
<!--                 --><?php //if($role == UserSQL::manager):?>
<!--                <div class="col-lg-4">-->
<!--                    <div class="add_house">-->
<!--                        <form action="addHouse.php">-->
<!--                            <button type=submit class="btn btn-success btn-lg">+Добавить объявление</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--                 --><?php // endif; ?>
<!--                 --><?php //if($role != 0 ):?>
<!--                 <div class="col-lg-5">-->
<!---->
<!--                 </div>-->
<!--                 <div class="col_lg-4">-->
<!--                     <form action="updateUser.php">-->
<!--                         <button type="submit" class="btn btn-primary btn-lg">Редактировать профиль</button>-->
<!--                     </form>-->
<!--                 </div>-->
<!--                 --><?php // endif; ?>
<!--            </div>-->
            <div class="row choise">
                <button href="#hidden_block" class="btn btn-outline-dark" data-toggle="collapse">Вторичное жилье</button>
                <a href="#" class="btn btn-outline-dark">Первичное жилье</a>
            </div>
            <div class="row mx-auto collapse" id="hidden_block">
                <form class="filter" action="index.php" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="city">Адрес: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
                            <input type="text" name="city" id="city" placeholder="Город...">
                            <label for="district"> &nbsp; &nbsp; &thinsp;</label>
                            <input type="text" name="district" id="district" placeholder="Район...">
                            <label for="street"><!-- Улица: --> &nbsp; &nbsp; &nbsp; </label>
                            <input type="text" name="street" id="street" placeholder="Улица...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="space_at">Площадь: &nbsp; от</label>
                            <input type="number" id="space_at" name="space_at" >
                            <label for="space_to">до&thinsp;</label>
                            <input type="number" id="space_to" name="space_to" >
                            <label for="space_to">м<sup>2</sup></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="cost_at">Стоимость: от</label>
                            <input type="number" id="cost_at" name="cost_at" >
                            <label for="cost_to">до</label>
                            <input type="number" id="cost_to" name="cost_to" >
                            <label for="cost_to"> руб</label>
                        </div>
                    </div>
                    <div class="btn-group-toggle" data-toggle="buttons">
                        <span class="col-2">Кол-во комнат:</span>
                        <label for="room_cnt1" class="btn btn-outline-dark">
                            <input type="checkbox" id="room_cnt1" name="room_cnt1" value="1" >
                            1</label>
                        <label for="room_cnt2" class="btn btn-outline-dark">
                            <input type="checkbox" id="room_cnt2" name="room_cnt2" value="2" >
                            2</label>
                        <label for="room_cnt3" class="btn btn-outline-dark">
                            <input type="checkbox" id="room_cnt3" name="room_cnt3" value="3" >
                            3</label>
                        <label for="room_cnt4" class="btn btn-outline-dark">
                            <input type="checkbox" id="room_cnt4" name="room_cnt4" value="4" >
                            4+</label>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-lg btn-success" style="margin-left: 15px;">Найти</button>
                    </div>

                </form>
            </div>

            <div class="row row-flex catalog">
                <?php
//                    require_once 'php/SQL/HousingSQL.php';
                    $housingSQL = new HousingSQL();
                    $housings = $housingSQL->getAll();
                    $lookAt = !isset($_COOKIE[USER_ID]) ? "Подробнее" : "Редактировать";
                    $view =  "info.php" ;
                    //filter
                    $filter = new FilterClass();
                    if (isset($_POST["city"])){
                        $filter->city = $_POST["city"];
                    }else{
                        $filter->city = "";
                    }
                    if (isset($_POST["district"])){
                        $filter->district = $_POST["district"];
                    }else{
                        $filter->district = "";
                    }
                    if (isset($_POST["street"])){
                        $filter->street = $_POST["street"];
                    }else{
                        $filter->street = "";
                    }
                    if (isset($_POST["cost_at"])){
                        $filter->costMin = $_POST["cost_at"];
                    }else{
                        $filter->costMin = 0;
                    }
                    if(isset($_POST["cost_to"])){
                        $filter->costMax = $_POST["cost_to"];
                    }else{
                        $filter->costMax = 0;
                    }
                    if(isset($_POST["space_at"])){
                        $filter->spaceMin = $_POST["space_at"];
                    }else{
                        $filter->spaceMin = 0;
                    }
                    if(isset($_POST["space_to"])){
                        $filter->spaceMax = $_POST["space_to"];
                    }else{
                        $filter->spaceMax = 0;
                    }
                    $filter->countRooms = null;
                    if (isset($_POST["room_cnt1"])){
                        $filter->countRooms[] = 1;
                    }
                    if (isset($_POST["room_cnt2"])){
                        $filter->countRooms[] = 2;
                    }
                    if (isset($_POST["room_cnt3"])){
                        $filter->countRooms[] = 3;
                    }
                    if (isset($_POST["room_cnt4"])){
                        $filter->countRooms[] = 4;
                    }

                    $houseFilt = $filter->filter($housings);
                    //end filter
                    if(count($houseFilt) > 0):
                        foreach ($houseFilt as $house):
                ?>
                <div class="col-lg-3 col-md-4 col-xs-12">
                    <div class="variant">
                        <img src="<?php echo $house->getPhotos()[0];?>" class="img-thumbnail transition-scale">
                        <p>Площадь: <?php echo $house->getSpace();?> м<sup>2</sup></p>
                        <p>Стоимость: <?php echo $house->getCost();?></p>
                        <p>Адрес: <?php echo $house->getAddressObject()->getFullName();?> </p>
                        <div class="form-descr">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3 mx-auto">
                                    <form action="<?php echo $view ?>" method="POST">
                                        <input type="hidden" name="house" value="<?php echo $house->getID(); ?>">
                                        <button type="submit" class="btn btn-success btn-lg"><?php echo $lookAt ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html></html>