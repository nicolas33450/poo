<?php

class Client{

    private $nom;
    private $prenom;
    private $sexe;


    const HOMME=1;
    const FEMME=2;

    function __construct($s = Client::HOMME, $n = 'non défini', $p = 'non défini')
    {
        $this->nom = $n;
        $this->prenom = $p;
        $this->sexe = $s;
    }

    public function afficheInfos()
    {
        echo '<br /><br/>Nom : ' . $this->getNom();
        echo '<br />Prenom : ' . $this->getPrenom();
        echo '<br />Sexe : ' . $this->getSexe();
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getSexe(){

        if($this->sexe == Client::HOMME)
        {
            return 'Homme';
        }
        else
        {
            return 'Femme';
        }

    }

    public function setSexe($sexe){
        $this->sexe = $sexe;
    }

}

$c1 = new Client();
$c1->afficheInfos();

?>