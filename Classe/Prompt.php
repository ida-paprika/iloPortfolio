<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;
/**
 * Description of Prompt
 *
 * @author ilo
 */
class Prompt extends Generique {
    
    protected $id_prompt;
    protected $author;
    protected $description;
    protected $image;
                
    function __construct(array $data) {
        parent::__construct($data);
    }
    
    function getId_prompt() {
        return $this->id_prompt;
    }

    function getAuthor() {
        return $this->author;
    }

    function getDescription() {
        return $this->description;
    }

    function getImage() {
        return $this->image;
    }

    function setId_prompt($id_prompt): void {
        $this->id_prompt = $id_prompt;
    }

    function setAuthor($author): void {
        $this->author = $author;
    }

    function setDescription($description): void {
        $this->description = $description;
    }

    function setImage($image): void {
        $this->image = $image;
    }


}
