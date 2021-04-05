<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_Artwork;
use App\classe\Artwork;
/**
 * Description of Ctrl_Artwork
 *
 * @author ilo
 */
class Ctrl_Artwork {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_Artwork();
    }
    
    public function ctrl_ajouter($post, $image) {
        extract($post);
        $this->gestion->ajouter(new Artwork($post), $image);
        header("location: index.php?galerie");
        exit;
    }
    
    public function ctrl_getAll() {
        return $this->gestion->getAll_artwork();
    }
    
    public function ctrl_modifier($post, $image) {
        $this->gestion->modifier(new Artwork($post), $image);
        header("location: index.php?galerie");
        exit;
    }
    
    public function ctrl_supprimer($idArt) {
        $this->gestion->supprimer($idArt);
        header("location: index.php?galerie");
        exit;
    }
    
    
}
