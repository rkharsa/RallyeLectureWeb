<?php

/** @property AuteurModel $auteurModel  */
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!in_array($this->session->groupe, array('Admin', 'Enseignant'))) {
            echo "Vous devez être logué en tant qu'administrateur ou Enseignant pour accéder à cette page";
            exit;
        }
        // on fait référence au modèle dans le controleur
        //  $this->load->model('AdminModel');
        $this->load->model('Menu');
    }

    function index()
    {
        // prépartion des données à transmettre à la vue
        $data['title'] = 'Gestion des Acces';
        $data['groupeAcces'] = $this->Menu->GetType();
        $this->load->view('AppHeader', $data);
        $this->load->view('AdminListUsers', $data);
        $this->load->view('AppFooter');
    }
    
    function getAccesUnGroupe($groupe)
    {
        $data['title'] = 'Gestion des Acces ' . $groupe;
        $data["unGroupe"] = $groupe;
        $data['groupeAcces'] = $this->Menu->GetMenuDunGroupe($groupe);
        $this->load->view('AppHeader', $data);
        $this->load->view('AdminListAccessUser', $data);
        $this->load->view('AppFooter');
    }
    function deleteAccessUnGroupe($groupe, $id)
    {
        $this->Menu->deleteAccess($id);
        $this->getAccesUnGroupe($groupe);
    }
    function updateAccessUnGroupe($groupe,$id)
    {
    
        if (isset($_POST['submit'])) {
    
            $user = $groupe;
            $controller = $_POST['controller'];
            $method = $_POST["method"];
            $titreMenu = $_POST["titreMenu"];
       
            $this->Menu->updateAccess($id,$_POST['controller'],$_POST["method"],$_POST["titreMenu"]);
           
            $this->getAccesUnGroupe($groupe);
        } else {
            $data['title'] = "Ajout d'Acces "  . $groupe;
            $data["unGroupe"] = $groupe;
            $data["id"] = $id;
            $data['accesPage']=$this->Menu->getOneAccess($id);
            print_r( $data['accesPage']);
            $this->load->view('AppHeader', $data);
            $this->load->view('AdminUpdateAccess', $data);
            $this->load->view('AppFooter');
        }
    }

function addAccesUnGroupe($userP)
{

    if (isset($_POST['submit'])) {
       
        $user = $userP;
        $controller = $_POST['controller'];
        $method = $_POST["method"];
        $titreMenu = $_POST["titreMenu"];
         if($controller!="Admin" ||  $method!="Index"){
        $nextId=$this->Menu->getCompteur() + 1;
        $object = [
            'id' => $nextId,
            'type' => $user,
            'controller' => $controller,
            'method' => $method,
            'titreMenu' => $titreMenu
        ];
        $this->Menu->addAccess($object);
        $this->getAccesUnGroupe($userP);
    }else{
        $this->getAccesUnGroupe($userP);
    }
    } else {
        $data['title'] = "Ajout d'Acces "  . $userP;
        $data["unGroupe"] = $userP;
        $this->load->view('AppHeader', $data);
        $this->load->view('AdminAddAccess', $data);
        $this->load->view('AppFooter');
    }
}
}