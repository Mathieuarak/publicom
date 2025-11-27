<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/*login*/
$routes->get('login','Utilisateur::login',['as'=>'login_user']);
$routes->post('auth','Utilisateur::auth' ,['as' =>'auth_user']);
// logout
$routes->get('/logout',"Utilisateur::logout",['as' =>'logout_user']);

	

//ROUTE CATEGORIES
$routes->get('categories', 'Categorie::index', ['as' => 'categories_liste']);
$routes->get('categorie-ajout', 'Categorie::ajout', ['as' => 'categorie_ajout']);
$routes->post('categorie-create', 'Categorie::create', ['as' => 'categorie_create']);
$routes->get('categorie-modifier-(:num)', 'Categorie::modifier/$1', ['as' => 'categorie_modifier']);
$routes->post('categorie-update-(:num)', 'Categorie::update/$1', ['as' => 'categorie_update']);
$routes->get('categorie-supprimer-(:num)', 'Categorie::supprimer/$1', ['as' => 'categorie_supprimer']);
$routes->get('categorie-messages-(:num)', 'Categorie::messages/$1', ['as' => 'categorie_messages']);

//ROUTE PANNEAUX

$routes->get('liste-panneau', 'Panneau::liste', ['as' => 'panneauListe']);

$routes->get('map-panneau', 'Panneau::map', ['as' => 'panneauMap']);

$routes->get('ajout-panneau-(:num)', 'Panneau::ajout/$1', ['as' => 'panneauAjout']);  //num-> num de la commune 
$routes->post('ajout-panneau', 'Panneau::create', ['as' => 'panneauCreate']);

$routes->get('modif-panneau-(:num)', 'Panneau::modif/$1', ['as' => 'panneauModif']);
$routes->post('modif-panneau', 'Panneau::update', ['as' => 'panneauUpdate']);

$routes->get('suppr-panneau-(:num)', 'Panneau::delete/$1', ['as' => 'panneauSuppr']);


//CRUD communes

$routes->get('liste-communes', 'Communes::liste', ['as' => 'listeCommunes']);


$routes->get('creation-commune','Communes::creation',['as' =>'creationCommune']);
$routes->post('create-commune','Communes::create',['as' =>'createCommune']);

$routes->get('modification-communes-(:num)', 'Communes::modif/$1', ['as' => 'modificationCommune']);
$routes->post('update-communes', 'Communes::update', ['as' => 'updateCommunes']);


$routes->get('supprimer-commune-(:num)','Communes::delete',['as'=>'supprimerCommune']);

//Gérer la colone en particulier pour admin
$routes->get('commune-accueil-(:num)','Communes::accueil/$1',['as'=>'communeAccueil']);

$routes->post('supprimer-communes','Communes::delete',['as'=>'supprimerCommune']);

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
	$routes->get('ajout-message-(:num)', 'Message::ajout/$1', ['as' => 'ajout_message']);
	$routes->post('ajout-message', 'Message::create', ['as' => 'message_create']);

	//Update
	$routes->get('modif-message-(:num)', 'Message::modif/$1', ['as' => 'modif_message']);
	$routes->post('modif-message', 'Message::update', ['as' => 'message_update']);

	$routes->post('visuModif-message', 'Message::visuModif', ['as' => 'visuModif_message']);


	//Delete
	$routes->post('suppr-message', 'Message::delete', ['as' => 'delete_message']);

//Route Categorie

    //Read
    $routes->get('liste-categorie', 'Categories::index', ['as' => 'liste_categories']); 

    //Create
    $routes->get('ajout-categorie', 'Categories::create', ['as' => 'categorie_ajout']); // afficher le formulaire
    $routes->post('ajout-categorie', 'Categories::store', ['as' => 'categorie_store']); // traitement du formulaire

    //Update
    $routes->get('modif-categorie-(:num)', 'Categories::edit/$1', ['as' => 'categorie_modif']); // afficher le formulaire 
    $routes->post('modif-categorie', 'Categories::update', ['as' => 'categorie_update']); // traitement du formulaire

    //Delete
    $routes->post('suppr-categorie', 'Categories::delete', ['as' => 'categorie_delete']);
