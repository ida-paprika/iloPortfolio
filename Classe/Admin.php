<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;
/**
 * Description of Admin
 *
 * @author ilo
 */
class Admin extends Generique {
    
    protected $login;
    protected $password;
    protected $mail;
    
    function __construct(array $data) {
        parent::__construct($data);
    }
    
    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function getMail() {
        return $this->mail;
    }

    function setLogin($login): void {
        $this->login = $login;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setMail($mail): void {
        $this->mail = $mail;
    }



}
