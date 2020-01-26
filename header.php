<header>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">
                <img src="krown.png" style="max-width: 20%" alt="favicon" /><br>
                <span class="an mc">АН</span><br>
                <span class="agn mc">агенство недвижимости</span><br>
                <span class="rh mc">Роскошный дом</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link mc" style="margin-left: 90px;"><span>Главная</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="aboutUs.php" class="nav-link mc" style="margin-left: 20px;"><span>О нас</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="feedback.php" class="nav-link mc" style="margin-left: 20px;"><span>Обратная связь</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="contactInfo">
                            <span class="an mc" style="color: black;">an_rskd@rskd.agency</span><br>
                            <span class="an mc" style="color: black;">+7(951)858-73-73</span>
                            <div class="social instagram">
                                <a href="https://instagram.com/an_rskd_?igshid=9y53vergfien" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
                            </div>
                            <div class="social vk">
                                <a href="https://vk.com/rskd.agency" target="_blank"><i class="fa fa-vk fa-2x"></i></a>
                            </div>
                            <div class="social odnoklassniki">
                                <a href="https://ok.ru/profile/563993714685" target="_blank"><i class="fa fa-odnoklassniki fa-2x"></i></a>
                            </div>
                        </div> 
                    </li>
                    <li class="nav-item">
                        <div class="login">
                            <?php
                            require_once 'ProjConstants.php';
                            require_once 'php/SQL/UserSQL.php';
                            require_once 'php/Entity/UserCLass.php';
                            if(!isset($_COOKIE[USER_ID])) :
                                ?>
                                <a href="login.php" class="nav-link mc"><span>Войти</span></a>
                            <?php else: ?>
                                <a href="logout.php" class="nav-link mc"><span>Выйти</span></a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>