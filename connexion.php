<?php
define('HOTE', 'localhost');	 // Mettre le nom d'hôte fourni par l'hébergeur
define('BDD', 'basemvc');	    // Mettre le nom de la base de données fourni par l'hébergeur
define('UTIL', 'root');		   // Mettre le nom de l'utilisateur de la base de données fourni par l'hébergeur				                                                                           
define('MDP', '');			  // Mettre le mot de passe

try 
{ 
    // Connexion à la base de données en UTF8       
    @$pdo = new PDO('mysql:host=' . HOTE . ';dbname=' . BDD . ';charset=UTF8', UTIL, MDP, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

}
catch (PDOException $e)
{
    // Si l'on capture une exception PDO, on en génère une nouvelle Exception
    // avec un message plus approprié et son code d'origine
    throw new Exception('Erreur connexion PDO : ' . utf8_encode($e->getMessage()), $e->getCode());
}


?>
