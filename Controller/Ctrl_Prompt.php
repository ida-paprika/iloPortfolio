<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_Prompt;
use App\classe\Prompt;
/**
 * Description of Ctrl_Prompt
 *
 * @author ilo
 */
class Ctrl_Prompt {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_Prompt();
    }
    
    public function ctrl_ajouter($post, $image) {
        extract($post);
        $this->gestion->ajouter(new Prompt($post), $image);
        header("location: index.php?galerie");
        exit;
    }
    
    public function ctrl_getAll() {
        return $this->gestion->getAll_Prompt();
    }
    
    public function ctrl_modifier($post, $image) {
        $this->gestion->modifier(new Prompt($post), $image);
        header("location: index.php?galerie");
        exit;
    }
    
    public function ctrl_supprimer($idPrompt) {
        $this->gestion->supprimer($idPrompt);
        header("location: index.php?galerie");
        exit;
    }
    
    
    
}
