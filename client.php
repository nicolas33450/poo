<?php

class Client
{
    private $id;
    private $nom;
    private $prenom;
    private $adr1;
    private $adr2;
    private $cp;
    private $ville;
    private $email;

    public function __construct(array $tabClient = null)

    {
        if($tabClient == null)
        {
            $this ->id = 0;
            $this ->nom ='';
            $this ->prenom ='';
            $this ->adr1 ='';
            $this ->adr2 ='';
            $this ->cp ='';
            $this ->ville ='';
            $this ->email ='';
        }
        else
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
    }

    public function hydrate(array $tabClient = null)
    {
        if($tabClient != null)

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
    }
    
    public function afficheInfos()
    {
        echo '<br/><br/> id : ' . $this->getId();
        echo '<br/> nom : ' . $this->getNom();
        echo '<br/> Prenom : ' . $this->getPrenom();
        echo '<br/> adr1 : ' . $this->getAdr1();
        echo '<br/> adr2 : ' . $this->getAdr2();
        echo '<br/> cp : ' . $this->getCp();
        echo '<br/> ville : ' . $this->getVille();
        echo '<br/> email : ' . $this->getEmail();
        
    }
//****************************************************************************//
//       getters et setters                                                   //  
//****************************************************************************// 
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
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

    public function getAdr1(){
        return $this->adr1;
    }

    public function setAdr1($adr1){
        $this->adr1 = $adr1;
    }

    public function getAdr2(){
        return $this->adr2;
    }

    public function setAdr2($adr2){
        $this->adr2 = $adr2;
    }

    public function getCp(){
        return $this->cp;
    }

    public function setCp($cp){
        $this->cp = $cp;
    }

    public function getVille(){
        return $this->ville;
    }

    public function setVille($ville){
        $this->ville = $ville;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

}








?>