<?php
include('../../cnx/cnx.php');
spl_autoload_register(function($class){
    include('../../classes/'.$class.'.php');
});

if (empty($_POST['reference'])) {
    $retour = array(
        'vide' => 'vide'
    );
} else {
    $cdeM = new CommandeManager($cnx);
    $cde  = $cdeM->ReadCde($_POST['reference']);

    $num  = $cdeM->ReadNumColis($_POST['reference']);

    if($num) {
        $retour = array(
            'ref' => $cde->getRef(),
            'date'=> date('d/m/y', strtotime($cde->getDate())),
            'etat' => $cde->getEtat(),
            'prenom' => $cde->getPrenom(),
            'nom' => $cde->getNom(),
            'numero' => $num->getNumero()
        );
    } else {
        $retour = array(
            'ref' => $cde->getRef(),
            'date'=> date('d/m/y', strtotime($cde->getDate())),
            'etat' => $cde->getEtat(),
            'prenom' => $cde->getPrenom(),
            'nom' => $cde->getNom()
        );
    }

}
echo json_encode($retour);