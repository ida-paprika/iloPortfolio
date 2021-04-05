<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\Admin;
/**
 * Description of Modele_Admin
 *
 * @author ilo
 */
class Modele_Admin extends ModeleGenerique {
    
    public function ajouter($user, $param2 = null, $param3= null) {
        //SELECT * FROM admin -> COUNT -> <= 1 OK else inscription impossible
        $query = "INSERT INTO admin VALUES(NULL, :login, :password, :mail)";
        $req = $this->execRequete($query, [
            "login"    => $this->validate($user->getLogin(), 3, 20),
            "password" => password_hash($this->validate($user->getPassword(), 8, 20), PASSWORD_DEFAULT),
            "mail"     => $this->validate($user->getMail(), 8, 30)
        ]);
        
        if( $req->rowCount() != 0 ){
            "Inscription réussie ! ";
        }else{
            $_SESSION['msg'] = "Something went wrong :(";
        }
    }
    
    public function connexion($param){
        $req = $this->execRequete("SELECT * FROM admin WHERE login = ?", [$param['login']]);
        
        if( $req->rowCount() != 0 ){
            $admin = new Admin( $req->fetch() );
            
            if( password_verify( $param['password'], $admin->getPassword() ) ){
                $_SESSION['admin'] = serialize($admin);
            }else{
                $_SESSION['msg'] = "Connexion impossible : veuillez vérifier vos identifiants";
                header("location: index.php?connexion");
                exit;
            }
        } else {
            $_SESSION['msg'] = "Connexion impossible : veuillez vérifier vos identifiants";
            header("location: index.php?connexion");
            exit;
        }
    }

    public function modifier($param1, $param2, $param3) {
        
    }

    public function supprimer($param, $param2) {
        
    }

}
