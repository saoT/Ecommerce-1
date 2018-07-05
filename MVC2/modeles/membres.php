<?php

function valider_compte_avec_hash($hash_validation)
{
	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE clients SET
		hash_validation = ''
		WHERE
		hash_validation = :hash_validation");

	$requete->bindValue(':hash_validation', $hash_validation);

	$requete->execute();

	return ($requete->rowCount() == 1);
}