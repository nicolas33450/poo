<?php 
class Voiture {

    private $nom ;        
    private $marque ;
    private $prix ; //on donne une valeur a $prix.

    function __construct($n = "C3", $m = 'citroen',$p = 10000)
    {
        $this->nom = $n;        
        $this->marque = $m;
        $this->prix = $p; //on donne une valeur a $prix.
    }


    public function affichePrix()
    {
        echo '<br/> Prix : ' . $this->prix;
    }

    public function changePrix($p)
    {
        if($p > 0)
        {
            $this->prix = $p;
        }
    }

    public function afficheInfo()
    {
        echo '<br/><br/> NOM : ' . $this->getNom();
        echo '<br/> MARQUE : ' . $this->getMarque();
        echo '<br/> PRIX : ' . $this->getPrix();
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($n){
        $this->nom = $n;
    }

    public function getMarque(){
        return $this->marque;
    }

    public function setMarque($m){
        $this->marque = $m;
    }

    public function getPrix(){
        return $this->prix . ' €';
    }

    public function setPrix($p){
        $this->prix = $p;
    }
}

$v1 = new Voiture(); // instanciation

echo '<br/> NOM : ' . $v1->getNom();
echo '<br/> MARQUE : ' . $v1->getMarque();
echo '<br/> PRIX : ' . $v1->getPrix();

$v2 = new Voiture('panda','fiat',15);

$v2->afficheInfo();
?>






