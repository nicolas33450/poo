<?php

class Client{

    private $nom;
    private $prenom;
    private $sexe;
    private static $nbClient = 0;


    const HOMME=1;
    const FEMME=2;

    function __construct($s = Client::HOMME, $n = 'non défini', $p = 'non défini')
    {
        $this->nom = $n;
        $this->prenom = $p;
        $this->sexe = $s;
        self::$nbClient ++;//self fait reference directement a la classe : $nbClient
    }

    /*public function hydrate(array$tabClient)
    {
        if (isset($tabClient['nom']))
        {
            $this->setNom($tabClient['nom']);
        }
        if (isset($tabClient['prenom']))
        {
            $this->setPrenom($tabClient['prenom']);
        }
        if (isset($tabClient['sexe']))
        {
            $this->setSexe($tabClient['sexe']);
        }
    }*/
    
    public function hydrate(array $tabClient)
    {
        foreach($tabClient as $indice => $valeur)
        {
            $methode = 'set' . ucfirst($indice);
            
            if(method_exists($this,$methode))
            {
                $this->$methode($valeur);
                
            }
        }
    }

    public function afficheInfos()
    {
        echo '<br/><br/> Nom : ' . $this->getNom();
        echo '<br/> Prenom : ' . $this->getPrenom();
        echo '<br/> Sexe : ' . $this->getSexe();
        echo '<br/> nb client : ' . self::$nbClient;
    }

    public static function getNbClient()
    {
        return self::$nbClient; // pas de $this dans une fonction static
    }

    public static function setNbClient($nb)
    {
        self::$nbClient = $nb;
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

$c2 = new Client(Client::FEMME,'Martin','Pierrette');
$c2->afficheInfos();

$c1->setSexe(Client::FEMME);
$c1->afficheInfos();

echo '<br/><br/> nb Clients : ' . Client::getNbClient();
Client::setNbClient(50);
echo '<br/><br/> nb Clients : ' . Client::getNbClient();

$c3 = new Client();
$c3->afficheInfos();
$c3->hydrate(['prenom'=>'Luc', 'sexe'=>Client::HOMME, 'nom'=>'POUPOU']);
$c3->afficheInfos();

?>


















