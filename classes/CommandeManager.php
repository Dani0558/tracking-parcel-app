<?php
class CommandeManager {
    private $cnx;

    /***************************CONSTRUCTEUR */
    public function __construct($cnx) {
        $this->setCnx($cnx);
    }
    /***************************CONSTRUCTEUR */
    /****************************/


    /***************************LIRE UNE COMMANDE */
    /****************************/
    public function ReadCde($ref) {
        $sql = 'SELECT * FROM commande AS cde
                JOIN client AS c
                ON cde.clientID = c.clientID
                WHERE cde.ref = :ref';
        $req = $this->cnx->prepare($sql);
        $req ->bindValue(':ref', $ref, PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        $cde  = new Commande();
        $cde->setRef($data['ref']);
        $cde->setDate($data['date']);
        $cde->setEtat($data['etat']);
        $cde->setPrenom($data['prenom']);
        $cde->setNom($data['nom']);
        $cde->setEmail($data['email']);

        return $cde;
    }
    /***************************LIRE UNE COMMANDE */
    /****************************/


    /***************************LIRE TOUTES LES REFERENCES A L'ETAT INFERIEUR A 3 */
    public function ReadAllRef() {
        $sql = 'SELECT ref FROM commande WHERE etat < 3';
        $req = $this->cnx->prepare($sql);
        $req->execute();
        $count = $req->rowCount();

        if ($count <= 0) {
            return Null;
        } else {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {
                $cde = new Commande();
                $cde->setRef($datas['ref']);
                $cdes[] = $cde;
            }
            return $cdes;
        }

    }
    /***************************LIRE TOUTES LES REFERENCES A L'ETAT INFERIEUR A 3 */
    /****************************/

    /***************************MEMORISER LES SWITCHS */
    public function UpdateSwitch($etat, $ref) {
        $sql    =   'UPDATE commande set etat   =   :etat
                    WHERE ref   =   :ref';
        $req = $this->cnx->prepare($sql);
        $req ->bindValue(':etat', $etat, PDO::PARAM_INT);
        $req ->bindValue(':ref', $ref, PDO::PARAM_STR);
        $req->execute();
    }
    /***************************MEMORISER LES SWITCHS */
    /****************************/
    
    /***************************INSERT OR UPDATE PARCEL NUMBER */
    public function InsertNumColis($num, $ref) {
        $sql0    =   'SELECT * FROM COLIS
                     WHERE ref   =   :ref';
        $req0    =   $this->cnx->prepare($sql0);
        $req0 ->bindValue(':ref', $ref, PDO::PARAM_STR);
        $req0->execute();
        $data0  =   $req0->fetch(PDO::FETCH_ASSOC);

        $sql    =   'INSERT INTO colis
                    (colisID, numero, ref) VALUES (:colisID, :numero, :ref)
                    ON DUPLICATE KEY UPDATE numero  =   :numero';
        $req = $this->cnx->prepare($sql);
        $req ->bindValue(':colisID', $data0['colisID'], PDO::PARAM_STR);
        $req ->bindValue(':numero', $num, PDO::PARAM_STR);
        $req ->bindValue(':ref', $ref, PDO::PARAM_STR);
        $req->execute();
    }
    /***************************INSERT OR UPDATE PARCEL NUMBER */
    /****************************/
    
    /***************************READ PARCEL NUMBER */
    public function ReadNumColis($ref) {
        $sql    =   'SELECT numero FROM COLIS
                     WHERE ref   =   :ref';
        $req = $this->cnx->prepare($sql);
        $req ->bindValue(':ref', $ref, PDO::PARAM_STR);
        $req->execute();

        $data  =   $req->fetch(PDO::FETCH_ASSOC);
        $num   =   new Commande();
        $num->setNumero($data['numero']);

        return $num;
    }
    /***************************READ PARCEL NUMBER */
    /****************************/

    /***************************CONNEXION A LA BASE DE DONNEE */
    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
    /***************************CONNEXION A LA BASE DE DONNEE */
    /****************************/
}