<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\Prompt;
/**
 * Description of Modele_Prompt
 *
 * @author ilo
 */
class Modele_Prompt extends ModeleGenerique {
    public function ajouter($post, $image, $param3 = NULL) {
        $query = "INSERT INTO prompt VALUES(NULL, :aut, :descript, :img)";
        $req = $this->execRequete($query, [
            "aut"       => $this->validate($post->getAuthor(), 3, 100),
            "descript"  => $this->validate($post->getDescription(), 5, 250),
            "img"       => $this->imageValidate($image, $this->replaceSpecialChar($post->getAuthor()).'_prompt', date('YmdHis'), 'prompt')
            ]);
        if( $req->rowCount() == 0 ){
            $_SESSION['msg'] = "Une erreur s'est produite (ajout prompt)";
        }
    }
    
    public function getAll_prompt() {
        $prompt = $this->getAll('prompt', '');
        $tab = [];
        while ($p = $prompt->fetch()){
            $tab[] = new Prompt($p);
        }
        return $tab;
    }

    public function getOne_prompt($idPrompt) {
        return $this->getOne('prompt', 'id_prompt', $idPrompt);
    }

    public function modifier($post, $image, $param3 = null) {
        if(is_array($image)){
            $img = $this->imageValidate($image, $this->replaceSpecialChar($post->getAuthor()).'_prompt', date('YmdHis'), 'prompt');
            if( file_exists('public/images/prompt/'.$post->getImage()) && file_exists('public/images/prompt/'.$img) ){
                unlink('public/images/prompt/'.$post->getImage());
            }
        }else{ $img = $image; }
        $query = "UPDATE prompt SET author = :aut, description = :descript, image = :image "
                . "WHERE id_prompt = :id";
        $req = $this->execRequete($query, [
            "aut"       => $this->validate($post->getAuthor(), 3, 100),
            "descript" => $this->validate($post->getDescription(), 5, 250),
            "image"       => $img,
            "id"          => $post->getId_prompt()
        ]);
    }

    public function supprimer($idPrompt, $param2 = NULL) {
        $res = $this->execRequete("SELECT image FROM prompt WHERE id_prompt = ?", [$idPrompt]);
        $oldImg = $res->fetch();
        if(file_exists('public/images/prompt/'.$oldImg['image']) ){
            unlink('public/images/prompt/'.$oldImg['image']);
        }
        $this->execRequete("DELETE FROM prompt WHERE id_prompt = ?", [$idPrompt]);
    }

}
