<?php
include('../../cnx/cnx.php');
spl_autoload_register(function($class){
    include('../../classes/'.$class.'.php');
});

$cdeM = new CommandeManager($cnx);
$refs = $cdeM->ReadAllRef();

if ($refs == Null) {
    $retours = array(
        'ref' => 'vide'
    );
} else {
    foreach($refs as $ref) {
        $retour = array(
            'ref' => $ref->getRef()
        );
        $retours[] = $retour;
    }
}

echo json_encode($retours);