<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    function ReadJson()
    {
        // Si les données json sont dans un fichier distant:
        $json_source = file_get_contents('fichier.json');
        // Décode le JSON
        $json_data = json_decode($json_source);

        return $json_data;
    }
    function writeInJson($tab)
    {
        $contenu_json = json_encode($tab);
        // Nom du fichier à créer
        $nom_du_fichier = 'fichier.json';

        // Ouverture du fichier
        $fichier = fopen($nom_du_fichier, 'w+');

        // Ecriture dans le fichier
        fwrite($fichier, $contenu_json);

        // Fermeture du fichier
        fclose($fichier);
    }
    function GetMenuDunGroupe($groupeUser)
    {
        $groupTab = $this->ReadJson();
        $tableau_pour_json = array();
        for ($i = 0; $i < count($groupTab); $i++) {
            if ($groupTab[$i]->type == $groupeUser) {
    
                $tableau_pour_json[] = ["id" => $groupTab[$i]->id, "type" => $groupTab[$i]->type, "controller" => $groupTab[$i]->controller, "method" => $groupTab[$i]->method, "titreMenu" => $groupTab[$i]->titreMenu];
            }
        }
        return $tableau_pour_json;
    }


    function deleteGroupe($groupe)
    {
        $groupTabMod = $this->ReadJson();
        for ($i = 0; $i < count($groupTabMod); $i++) {
            if ($groupTabMod[$i]->type == $groupe) {
                unset($groupTabMod[$i]);
                $groupTab = array_values($groupTabMod);
            }
        }
    }


function reordonner($groupe){
    $groupeTabMod =  $this->GetMenuDunGroupe($groupe);
    $this->deleteGroupe($groupe);
    $count= count($groupeTabMod)-1;
    $max = $groupeTabMod[$_POST[$count."indice"]];
    for ($i = 0; $i < $max; $i++) {
        if ($i = $_POST[$i."indice"]) {
            $this->addAccess($groupeTabMod[$i]);
        }
    }
}
function deleteAccess($id)
{
    //   print_r($id);
    $groupTab = $this->ReadJson();

    for ($i = 0; $i < count($groupTab); $i++) {

        if ($groupTab[$i]->id == $id) {
            unset($groupTab[$i]);
            $groupTab = array_values($groupTab);
        }
    }

    $this->writeInJson($groupTab);
}
function getOneAccess($id)
{
    //   print_r($id);
    $groupTab = $this->ReadJson();

    for ($i = 0; $i < count($groupTab); $i++) {

        if ($groupTab[$i]->id == $id) {
            return $groupTab[$i];
        }
    }

    $this->writeInJson($groupTab);
}
function updateAccess($id, $controller, $method, $titreMenu)
{
    $groupTab = $this->ReadJson();
    $tableau_pour_json = array();
    for ($i = 0; $i < count($groupTab); $i++) {
        if ($groupTab[$i]->id == $id) {
            $groupTab[$i]->method = $method;
            $groupTab[$i]->controller = $controller;
            $groupTab[$i]->titreMenu = $titreMenu;
        }
    }
    $this->writeInJson($groupTab);
}

function addAccess($object)
{

    $groupTab = $this->ReadJson();
    $groupTab[] = $object;
    $this->writeInJson($groupTab);
}
function getCompteur()
{
    $groupTab = $this->ReadJson();
    return  count($groupTab);
}


/*
    Compare le tableau 1 au tableau 2 
    */

function exist($tab1, $tab2, $tab2I)
{
    for ($x = 0; $x < count($tab1); $x++) {
        if ($tab2[$tab2I]->type == $tab1[$x]["type"]) {
            return true;
        }
    }
    return false;
}
function GetType()
{
    $groupTab = $this->ReadJson();
    $tableauType = array();
    $exist = false;
    for ($i = 0; $i < count($groupTab); $i++) {
        if ($this->exist($tableauType, $groupTab, $i) == false) {
            $tableauType[]["type"] = $groupTab[$i]->type;
        }
    }
    return $tableauType;
}


function GetOptions($group)
{
    switch ($group) {
            // en fonction du groupe on retourn le menu correspondant
        case 'Admin':
            $tableau_pour_json = $this->GetMenuDunGroupe("Admin");
            return  $tableau_pour_json;
        case 'Enseignant':
            $tableau_pour_json = $this->GetMenuDunGroupe("Enseignant");
            return  $tableau_pour_json;
        case 'Elève':
            $tableau_pour_json = $this->GetMenuDunGroupe("Eleve");
            return  $tableau_pour_json;

        default: // Visiteur (la plus restrictive) 
            $tableau_pour_json = $this->GetMenuDunGroupe("Visiteur");
            return  $tableau_pour_json;
    }
}
//juste pour remettre a 0
function CreateJson()
{
    $tableauIntegrer = array(
        array('Auteur', 'Index', 'Auteur'),
        array('Admin', 'Index', 'Acces'),
        array('Editeur', 'Index', 'Editeur'),
        array('Livre', 'Index', 'Livre'),
        array('', '', '#'),
        array('Enseignant', 'Index', 'Enseignant'),
        array('Niveau', 'Index', 'Niveau'),
        array('Classe', 'Index', 'Classe'),
        array('Eleve', 'Index', 'Eleve'),
        array('', '', '#'),
        array('Rallye', 'Index', 'Rallye'),
        array('Participer', 'Index', 'Participer'),
        array('Comporter', 'Index', 'Comporter'),
        array('', '', '#'),
        array('Quizz', 'Index', 'Quizz'),
        array('Question', 'Index', 'Question'),
        array('Proposition', 'Index', 'Proposition'),
        array('Reponse', 'Index', 'Reponse'),
        array('', '', '#'),
        array('Login', 'Index', 'Login'),
        array('Logout', 'Index', 'Logout'),
        array('PhpInfo', 'Index', 'PhpInfo')
    );
    // $tableau_pour_json=array();
    $tableau_pour_json = array();
    for ($i = 0; $i < count($tableauIntegrer); $i++) {
        $tableau_pour_json[] = ["id" => $i, "type" => "Admin", "controller" => $tableauIntegrer[$i][0], "method" => $tableauIntegrer[$i][1], "titreMenu" => $tableauIntegrer[$i][2]];
    }
    $compteurTabPrec = count($tableauIntegrer);
    $tableauIntegrer = array(
        array('EnseignantClasse', 'Index', 'Mes Classes'),
        array('EnseignantLivre', 'Index', 'La Bibliothèque'),
        array('EnseignantRallye', 'Index', 'Les Rallyes'),
        array('TableauBord', 'Index', 'Tableau de Bord'),
        array('Login', 'Index', 'Login'),
        array('Logout', 'Index', 'Logout')
    );

    for ($i = 0; $i < count($tableauIntegrer); $i++) {
        $compteurTabPrec += 1;
        $tableau_pour_json[] = ["id" => $compteurTabPrec, "type" => "Enseignant", "controller" => $tableauIntegrer[$i][0], "method" => $tableauIntegrer[$i][1], "titreMenu" => $tableauIntegrer[$i][2]];
    }

    $tableauIntegrer = array(
        array('RallyeEleve', 'Index', 'Tes Rallyes'),
        array('Login', 'Index', 'Login'),
        array('Logout', 'Index', 'Logout')
    );
    for ($i = 0; $i < count($tableauIntegrer); $i++) {
        $compteurTabPrec += 1;
        $tableau_pour_json[] = ["id" => $compteurTabPrec, "type" => "Eleve", "controller" => $tableauIntegrer[$i][0], "method" => $tableauIntegrer[$i][1], "titreMenu" => $tableauIntegrer[$i][2]];
    }

    $tableauIntegrer = array(
        array('Login', 'Index', 'Login')
    );
    for ($i = 0; $i < count($tableauIntegrer); $i++) {

        $compteurTabPrec += 1;
        $tableau_pour_json[] = ["id" => $compteurTabPrec, "type" => "Visiteur", "controller" => $tableauIntegrer[$i][0], "method" => $tableauIntegrer[$i][1], "titreMenu" => $tableauIntegrer[$i][2]];
    }

    print_r($tableau_pour_json);
    $this->writeInJson($tableau_pour_json);
}
}