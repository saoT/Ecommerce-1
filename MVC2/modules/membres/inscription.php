<?php

include CHEMIN_LIB.'form.php';

$form_inscription = new Form('formulaire_inscription');

$form_inscription->method('POST');

$form_inscription->add('Text', 'nom')
				 ->label("Votre nom");

$form_inscription->add('Text', 'prenom')
				 ->label("Votre prénom");

$form_inscription->add('Email', 'email')
				 ->label("Votre adresse mail");

$form_inscription->add('Password', 'mdp')
				 ->label("Votre mot de passe");

$form_inscription->add('Text', 'adresse')
				 ->label("L'adresse de votre domicile");

$form_inscription->add('Submit', 'submit')
				 ->value("Je veux m'inscrire !");

//Pré remplissage (valeurs précédemment entrées)
$form_inscription->bound($_POST);

include CHEMIN_VUE.'formulaire_inscription.php';