<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_Admin;
use App\classe\Admin;
/**
 * Description of Ctrl_Admin
 *
 * @author ilo
 */
class Ctrl_Admin {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_Admin();
    }
    
    public function inscription($param) {
        extract($param);
        $this->gestion->ajouter(new Admin($param));
        
        header("location: index.php?connexion");
        exit;
        
    }

    public function connexion($param){
        $this->gestion->connexion($param);
        header('location: index.php?accueil');
        exit;
    }
    
    public function isConnected(){
        if( isset($_SESSION['admin']) ){
            return true;
        }
        return false;
    }
}
