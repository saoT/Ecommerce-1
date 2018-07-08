<?php

function ajouter_membre_dans_bdd($nom, $mdp, $email, $adresse, $hash_validation)
{
	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO clients SET 
		nom = :nom,
		mdp = :mdp,
		email = :email, 
		hash_validation = :hash_validation,
		adresse = :adresse,
		date_inscription = NOW()");

	$requete->bindValue(':nom', $nom);
	$requete->bindValue(':mdp', $mdp);
	$requete->bindValue(':email', $email);
	$requete->bindValue(':hash_validation', $hash_validation);
	$requete->bindValue(':adresse', $adresse);

	if($requete->execute())
	{
		return $pdo->lastInsertId();
	}
	return $requete->errorInfo();
}