<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'vendor/autoload.php';

session_start();

$ctrl_admin = new Ctrl\controller\Ctrl_Admin();
$ctrl_art = new Ctrl\controller\Ctrl_Artwork();
$ctrl_prompt = new Ctrl\controller\Ctrl_Prompt();

$allArtwork = $ctrl_art->ctrl_getAll();
$allPrompt = $ctrl_prompt->ctrl_getAll();


try {
    if( isset($_POST['userConnect']) ){
        $msg = $ctrl_admin->connexion($_POST);
    }
    elseif( isset($_POST['userInscript']) ){
        $msg = $ctrl_admin->inscription($_POST);
    }
    elseif( isset($_POST['addArtwork']) ){
        $image = $_FILES['image'];
        $msg = $ctrl_art->ctrl_ajouter($_POST, $image);
    }
    elseif( isset($_POST['addPrompt']) ){
        $image = $_FILES['image'];
        $msg = $ctrl_prompt->ctrl_ajouter($_POST, $image);
    }
    elseif( isset($_POST['editArtwork']) ){
        if( $_FILES['image']['error'] != 0 ){
            $image = $_POST['image'];
        }else{
            $image = $_FILES['image'];
        }
        $ctrl_art->ctrl_modifier($_POST, $image);
    }
    elseif( isset($_POST['editPrompt']) ){
        if( $_FILES['image']['error'] != 0 ){
            $image = $_POST['image'];
        }else{
            $image = $_FILES['image'];
        }
        $ctrl_prompt->ctrl_modifier($_POST, $image);
    }
    elseif( isset($_GET['deleteArtwork']) && ctype_digit($_GET['art']) ){
        $ctrl_art->ctrl_supprimer($_GET['art']);
    }
    elseif( isset($_GET['deletePrompt']) && ctype_digit($_GET['pr']) ){
        $ctrl_prompt->ctrl_supprimer($_GET['pr']);
    }
    elseif( isset($_GET['connexion']) ){
        render('connexion');
    }
    elseif( isset($_GET['deconnexion']) ){
        session_destroy();
        header('Location: .');
        exit;
    }
    elseif( isset($_GET['galerie']) ){
        $num1 = 0;
        render('galerie', 
                ['data_art'    => $allArtwork,
                 'data_prompt' => $allPrompt,
                 'num1'        => $num1 ]);
    }else{
        render('accueil');
    }
    
} catch (Exception $ex) {

}