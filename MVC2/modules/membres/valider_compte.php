<?php

if (!empty($_GET['hash']))
{
	include CHEMIN_MODELE.'membres.php';

	if (valider_compte_avec_hash($_GET['hash']))
	{
		include CHEMIN_VUE.'compte_valide.php';
	}
	else
	{	
		include CHEMIN_VUE.'erreur_activation_compte.php';
	}
}
else
{
	include CHEMIN_VUE.'erreur_activation_compte.php';
}