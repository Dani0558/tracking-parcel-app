<?php
class EnvoyerMail extends Commande {

    public function __construct($prenom, $nom, $email, $ref) {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setRef($ref);

    }
    
    public function EnvoiMail() {
        $expediteur   = 'no-reply@kono-dev.com';
        $ref          = $this->getRef();
        $prenom       = $this->getPrenom();
        $nom          = $this->getNom();
        $destinataire = $this->getEmail();

        $sujet        = 'New event concerning your order ref.' .$ref;
        $contenu      = '
                <!DOCTYPE html>
                <html lang="en">
                
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>New event concerning your order</title>
                    <style>
                        #box {
                            width: 75%;
                            margin: auto;
                            font-family: sans-serif;
                        }
                
                        header {
                            background-color: rgb(72, 8, 247);
                            color: aliceblue;
                            text-align: center;
                            padding: 10px 10px;
                        }
                
                        a {
                            color: blue;
                        }
                    </style>
                </head>
                
                <body>
                    <div id="box">
                        <header>
                            <h2>MyWebSite.com</h2>
                            <h3>New event concerning your order réf. '.$ref.'</h3>
                        </header>
                        <article>
                            <h4>Hello '.$prenom.' '.$nom.',</h4>
                            <P>
                                A new event concerning your order
                                ref. '.$ref.' has just been declared.
                            </P>
                            <p><a href="https://www.kono-dev.com/projets/trackingparcelapp/suivi/index.php?ref='.$ref.'">Cliquer ici pour voir ce nouvel evenement</a></p>
                            <p>
                                <em>We thank you for your confidence,<br>MyWebSite.com</em>
                            </p>
                        </article>
                    </div>
                </body>
                
                </html>

        ';
        $header       = "FROM:$expediteur \n";
        $header       .= "Content-Type:text/html; charset='utf-8'";
        mail($destinataire, $sujet, $contenu, $header);
    }
}
