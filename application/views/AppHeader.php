<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title> 
            <?php
            if (isset($title)) {
                echo $title;
            }
            ?>
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link href="<?php echo base_url('/web/css/style.css'); ?>" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="<?php echo base_url("assets/js/main.js")?>"></script>
    </head>
    <body>
        <div class="login">
            <?php
            $username=$this->session->username;
            $login=$this->session->login;
            $groupe=$this->session->groupe;
            $id=$this->session->id;
            if (isset($username)&&isset($login)&&isset($groupe)) {
                echo "bienvenu(e) {$username}({$login}) vous appartenez au groupe {$groupe}";
            }
            else {
                echo "bienvenu(e) Visiteur";
            }
            ?>
        </div>
        <div class="titre">
            <?php
            if (isset($title)) {
                echo $title;
            }
            ?>
        </div>
        <!-- logo -->
        <div class="logo">
<?php // echo $data['logo'];        ?>
        </div>