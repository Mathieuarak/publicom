<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');	
$routes->post('auth','Utilisateur::auth' ,['as' =>'auth_user']);
	

//ROUTE PANNEAUX

$routes->get('liste-panneau', 'Panneau::liste', ['as' => 'panneauListe']);

$routes->get('map-panneau', 'Panneau::map', ['as' => 'panneauMap']);

$routes->get('ajout-panneau-(:num)', 'Panneau::ajout/$1', ['as' => 'panneauAjout']);  //num-> num de la commune 
$routes->post('ajout-panneau', 'Panneau::create', ['as' => 'panneauCreate']);

$routes->get('modif-panneau-(:num)', 'Panneau::modif/$1', ['as' => 'panneauModif']);
$routes->post('modif-panneau', 'Panneau::update', ['as' => 'panneauUpdate']);

$routes->post('suppr-panneau', 'Panneau::delete', ['as' => 'panneauSuppr']);


//CRUD communes

$routes->get('liste-communes', 'Communes::liste', ['as' => 'listeCommunes']);


$routes->get('creation-commune','Communes::creation',['as' =>'creationCommune']);
$routes->post('create-commune','Communes::create',['as' =>'createCommune']);

$routes->get('modification-communes-(:num)', 'Communes::update/$1', ['as' => 'modificationCommunes']);
$routes->post('update-communes', 'Communes::update', ['as' => 'updateCommunes']);

$routes->post('supprimer-communes','Communes::delete',['as'=>'supprimerCommunes']);
$routes->get('communes-accueil-(:num)','Communes::accueil/$1',['as'=>'communesAccueil']);

//Route Utilisateur 

	//Create
	
	$routes->get('ajout-utilisateur-(:num)','Utilisateur::preCreate/$1' ,['as' => 'preCreate_user' ] );  //num->num de la commune
	$routes->post('ajout-utilisateur','Utilisateur::create' ,['as' =>'create_user' ] );
	
	//Read
	
	$routes->get('listes-des-utilisateurs-(:num)','Utilisateur::reads/$1' ,['as' =>'read_users' ] ); //num->num de la commune

	//Update
	
	$routes->get('modifier-utilisateur-(:num)','Utilisateur::preUpdate/$1' ,['as' =>'preUpdate_user' ] );
	$routes->post('modifier-utilisateur' ,'Utilisateur::update' ,['as' => 'update_user' ] );
	
	//Delete
	
	$routes->post('delete-utilisateur','Utilisateur::delete',['as' => 'delete_user'] );
	
//Route Message

	//Read
	$routes->get('liste-messages-(:num)', 'Message::liste/$1', ['as' => 'liste_messages']); 
	$routes->get('visu-message-(:num)', 'Message::visualisation/$1', ['as' => 'visu_message']);

	//Create
	$routes->get('ajout-message-(:num)', 'Message::ajout/$1', ['as' => 'message_ajout']);
	$routes->post('ajout-message', 'Message::create', ['as' => 'message_create']);

	//Update
	$routes->get('modif-message-(:num)', 'Message::modif/$1', ['as' => 'message_modif']);
	$routes->post('modif-message', 'Message::update', ['as' => 'message_update']);

	$routes->post('visuModif-message', 'Message::visuModif', ['as' => 'message_visuModif']);


	//Delete
	$routes->post('suppr-message', 'Message::delete', ['as' => 'message_delete']);
