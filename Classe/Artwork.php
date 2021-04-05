<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;
/**
 * Description of Artwork
 *
 * @author ilo
 */
class Artwork extends Generique {
    
    protected $id_artwork;
    protected $title;
    protected $description;
    protected $image;
    protected $alt_artwork;
            
    function __construct(array $data) {
        parent::__construct($data);
    }
    
    function getId_artwork() {
        return $this->id_artwork;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getImage() {
        return $this->image;
    }
    function getAlt_artwork() {
        return $this->alt_artwork;
    }

    function setId_artwork($id_artwork): void {
        $this->id_artwork = $id_artwork;
    }

    function setTitle($title): void {
        $this->title = $title;
    }

    function setDescription($description): void {
        $this->description = $description;
    }

    function setImage($image): void {
        $this->image = $image;
    }

    function setAlt_artwork($alt_artwork): void {
        $this->alt_artwork = $alt_artwork;
    }


}
