<?php
include('../../cnx/cnx.php');
spl_autoload_register(function($class){
    include('../../classes/'.$class.'.php');
});

$cdeM = new CommandeManager($cnx);
$cde  = $cdeM->ReadCde($_POST['reference']);

$cdeM->UpdateSwitch($_POST['c'], $_POST['reference']);

$envoyer = new EnvoyerMail($cde->getPrenom(), $cde->getNom(), $cde->getEmail(), $cde->getRef());
$envoyer->EnvoiMail();