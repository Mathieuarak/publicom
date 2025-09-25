<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//ROUTE PANNEAUX

$routes->get('liste-panneau', 'Panneau::liste', ['as' => 'panneauListe']);

$routes->get('map-panneau', 'Panneau::map', ['as' => 'panneauMap']);

$routes->get('ajout-panneau-(:num)', 'Panneau::ajout/$1', ['as' => 'panneauAjout']);  //num-> num de la commune 
$routes->post('ajout-panneau', 'Panneau::create', ['as' => 'panneauAjout']);

$routes->get('modif-panneau-(:num)', 'Panneau::modif/$1', ['as' => 'panneauModif']);
$routes->post('modif-panneau', 'Panneau::update', ['as' => 'panneauModif']);

$routes->post('suppr-panneau', 'Panneau::delete', ['as' => 'panneauSuppr']);


//CRUD communes

$routes->get('liste-communes', 'commune::liste', ['as' => 'listeCommunes']);


$routes->get('creation-commune','commune::create',['as' =>'creationCommune']);
$routes->post('creation-commune','commune::create',['as' =>'creationCommune']);

$routes->get('modification-communes-(:num)', 'commune::update/$1', ['as' => 'modificationCommunes']);
$routes->post('modification-communes', 'commune::update', ['as' => 'modificationCommunes']);

$routes->post('supprimer-communes','commune::delete',['as'=>'supprimerCommunes']);
$routes->get('communes-accueil-(:num)','commune::accueil/$1',['as'=>'communesAccueil']);

//Route Utilisateur 

	//Create
	
	$routes->get('ajout-utilisateur(:num)','Utilisateur::preCreate/$1' ,['as' => 'preCreate_user' ] );  //num->num de la commune
	$routes->post('ajout-utilisateur','Utilisateur::create' ,['as' =>'create_user' ] );
	
	//Read
	
	$routes->get('listes-des-utilisateurs(:num)','Utilisateur::reads/$1' ,['as' =>'read_users' ] ); //num->num de la commune
	
	$routes->post('utilisateur-auth','Utilisateur::read' ,['as' =>'read_user']);
	
	//Update
	
	$routes->get('modifier-utilisateur-(:num)','Utilisateur::preUpdate/$1' ,['as' =>'preUpdate_user' ] );
	$routes->post('modifier-utilisateur' ,'Utilisateur::update' ,['as' => 'update_user' ] );
	
	//Delete
	
	$routes->post('delete-utilisateur','Utilisateur::delete',['as' => 'delete_user'] );
	
//Route Message

	//route liste message
	$routes->get('liste-messages-(:num)', 'Message::liste/$1', ['as' => 'liste_messages']);

	//route visualisation Message
	$routes->get('visu-message-(:num)', 'Message::visualisation/$1', ['as' => 'visu_message']);

	//Create
	$routes->get('ajout-message-(:num)', 'Message::ajout/$1', ['as' => 'message_ajout']);
	$routes->post('ajout-message', 'Message::create', ['as' => 'message_create']);

	//Update
	$routes->get('modif-message-(:num)', 'Message::modif/$1', ['as' => 'message_modif']);
	$routes->post('modif-message', 'Message::update', ['as' => 'message_update']);

	//Delete
	$routes->post('suppr-message', 'Message::delete', ['as' => 'message_delete']);
