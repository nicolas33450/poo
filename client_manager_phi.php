<?php

class ClientManager
{
	private $pdo;
	
	function __construct($connect)
	{
		$this->setPdo($connect);
	}
	
	
	// Permet d'insérer un client (Requête INSERT)
	public function add(Client $cli)
	{
		$requete = $this->pdo->prepare('INSERT INTO clients(nom_cli, prenom_cli, adr1_cli, adr2_cli, cp_cli, ville_cli, email_cli) VALUES(:nom, :prenom, :adr1, :adr2, :cp, :ville, :email)');

		$requete->bindValue(':nom', $cli->getNom(), PDO::PARAM_STR);
		$requete->bindValue(':prenom', $cli->getPrenom(), PDO::PARAM_STR);
		$requete->bindValue(':adr1', $cli->getAdr1(), PDO::PARAM_STR);
		$requete->bindValue(':adr2', $cli->getAdr2(), PDO::PARAM_STR);
		$requete->bindValue(':cp', $cli->getCp(), PDO::PARAM_STR);
		$requete->bindValue(':ville', $cli->getVille(), PDO::PARAM_STR);
		$requete->bindValue(':email', $cli->getEmail(), PDO::PARAM_STR);
		$res = $requete->execute();
		return $res;
	}

	// Permet de supprimer un client (Requête DELETE)
	// Rarement utilisé (car on efface rarement dans la base de données)
	public function delete($idCli)
	{
		$requete = $this->pdo->prepare('DELETE FROM clients WHERE n_cli = :id');
		$requete->bindValue(':id', $idCli);
		$res = $requete->execute();
		return $res;
	}

	// Retourne un objet Client dont l'id est indiqué (SELECT ... WHERE id= )
	public function get($idCli)
	{
		$requete = $this->pdo->prepare('SELECT n_cli as id, nom_cli as nom, prenom_cli as prenom, adr1_cli as adr1, adr2_cli as adr2, cp_cli as cp, ville_cli as ville, email_cli as email FROM clients WHERE n_cli = :id');
		$requete->bindValue(':id', $idCli);
		$requete->execute();
		// ici on retourne un tableau dans $resultat
		$tabResultat = $requete->fetch(PDO::FETCH_ASSOC);
		return new Client($tabResultat);
	}

	// Retourne la liste de tous les Clients (tableau des clients (Objets))
	public function getList()
	{
		$tabListe = [];
		$requete = $this->pdo->query('SELECT n_cli as idClient, nom_cli as nomClient, prenom_cli as prenomClient, adr1_cli as adr1Client, adr2_cli as adr2Client, cp_cli as cpClient, ville_cli as villeClient, email_cli as emailClient FROM clients ORDER BY nom_cli');
		while ($resultat = $requete->fetch(PDO::FETCH_ASSOC))
		{
			$tabListe[] = new Client($resultat);
		}
		return $tabListe;
	}





	public function setPdo(PDO $connect)
	{
		$this->pdo = $connect;
	}



}