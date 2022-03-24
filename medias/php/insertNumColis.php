<?php
include('../../cnx/cnx.php');
spl_autoload_register(function($class){
    include('../../classes/'.$class.'.php');
});

if (!empty($_POST['num'])) {
    $cdeM = new CommandeManager($cnx);
    $cdeM->InsertNumColis($_POST['num'], $_POST['reference']);
}
