<?php
    require_once 'ProjConstants.php';
    require_once 'php/FilterClass.php';
    require_once 'php/SQL/HousingSQL.php';

    $hsql = new HousingSQL();

    echo $hsql->updateLink(6, 11);

?>