<?php
include('../../cnx/cnx.php');
spl_autoload_register(function($class){
    include('../../classes/'.$class.'.php');
});

$cdeM = new CommandeManager($cnx);
$cde  = $cdeM->ReadCde($_POST['reference']);
$num  = $cdeM->ReadNumColis($_POST['reference']);

if ($cde->getRef() == '') {
    $retour = array(
        'ref' => 'UNKNOWN',
        'date'=> '../../....',
        'prenom' => '......',
        'nom' => ''
    );
} else {
    $retour = array(
        'ref' => $cde->getRef(),
        'date'=> date('d/m/y', strtotime($cde->getDate())),
        'etat' => $cde->getEtat(),
        'prenom' => $cde->getPrenom(),
        'nom' => $cde->getNom(),
        'numero' => $num->getNumero()
    );
}

echo json_encode($retour);