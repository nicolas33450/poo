<?php

include 'client.php';
include 'connexion.php';
include 'client_manager.php';

$c1 = new Client();
$c1->afficheInfos();

$cm = new ClientManager($pdo);

$c2 = $cm->get(1);
$c2->afficheInfos();

$c2->setCp(69000);
$c2->afficheInfos();
$cm->update($c2);

$c3 = $cm->get(1);
$c3->afficheInfos();

$c4 = new Client(['nom'=>'DUPONT', 'prenom'=>'Lucien', 'adr1'=>'10 rue du paradis','cp'=>'36589','ville'=>'molutinoce','email'=>'toto@toto.fr']);
$c4->afficheInfos();
$cm->add($c4);
$id=$cm->add($c4);
$c4->setId($id);
$c4->afficheInfos();



?>