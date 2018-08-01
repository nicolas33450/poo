<?php
class Voiture {
    private $nom;
    private $marque;
    private $prix;

    // Constructeur de la classe avec un paramètre (facultatif),
    // car il a une valeur par défaut
    public function __construct($args=null)
    {
        // Si notre paramètre est un tableau non vide
        if(is_array($args) && !empty($args))
        {
            // Pour chaque clé, on récupère la valeur correspondante
            foreach($args as $clef => $valeur)
            {
                // Si la propriété de la classe existe, on met à jour sa valeur
                if(property_exists($this, $clef))
                {
                    $this->{$clef} = $valeur;
                }
            }
        }
        else
        {
            // Valeurs par défaut s'il n'y a aucun paramètre
            $this->nom = 'Non défini';
            $this->marque = 'Non défini';
            $this->prix = 10000;
        }
    }
    // destructeur
    /*function __destruct()
    {
        echo '<br /><br />c\'est la fin ('. $this->getNom().')' ;
    }
*/
    public function affPrix()
    {
        echo '<br />Prix : ' .$this->prix;
    }

    public function changePrix($p)
    {
        if ($p >0)
        {
            $this->prix = $p;
        }

    }

    public function afficheInfos()
    {
        echo '<br /><br/>Nom : ' . $this->getNom();
        echo '<br />Marque : ' . $this->getMarque();
        echo '<br />Prix : ' . $this->getPrix();
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getMarque(){
        return $this->marque;
    }

    public function setMarque($marque){
        $this->marque = $marque;
    }

    public function getPrix(){
        return $this->prix . '€';
    }

    public function setPrix($prix){
        $this->prix = $prix;
    }

}

$v1 = new Voiture();


$v1->changePrix(-500);
$v1->affPrix();

echo '<br />Nom : ' . $v1->getNom();
echo '<br />Marque : ' . $v1->getMarque();
echo '<br />Prix : ' . $v1->getPrix();

$v2 = new Voiture(['prix'=>14000,'marque'=>'Renault']);
$v2->afficheInfos();

?>
