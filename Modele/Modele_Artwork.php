<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\Artwork;
/**
 * Description of Modele_Artwork
 *
 * @author ilo
 */
class Modele_Artwork extends ModeleGenerique {
    public function ajouter($post, $image, $param3 = NULL) {
        $query = "INSERT INTO artwork VALUES(NULL, :title, :description, :image, :alt)";
        $req = $this->execRequete($query, [
            "title"       => $this->validate($post->getTitle(), 3, 100),
            "description" => $this->validate($post->getDescription(), 5, 250),
            "image"       => $this->imageValidate($image, 'iloArtwork', $this->replaceSpecialChar( $post->getTitle() ), 'artwork'),
            "alt"         => $this->validate($post->getAlt_artwork(), 5, 250)
            ]);

        if( $req->rowCount() == 0 ){
            $_SESSION['msg'] = "Une erreur s'est produite (ajout artwork)";
        }
    }
    
    public function getAll_artwork() {
        $artwork = $this->getAll('artwork', 'ORDER BY id_artwork DESC');
        $tab = [];
        while ($a = $artwork->fetch()){
            $tab[] = new Artwork($a);
        }
        return $tab;
    }

    public function getOne_artwork($table, $colonne, $id) {
        return parent::getOne($table, $colonne, $id);
    }

    public function modifier($post, $image, $param3 = NULL) {
        if(is_array($image)){
            //supprimer image précédente
            $img = $this->imageValidate($image, 'iloArtwork', $this->replaceSpecialChar( $post->getTitle() ), 'artwork');
            if( file_exists('public/images/artwork/'.$post->getImage()) && file_exists('public/images/artwork/'.$img) ){
                unlink('public/images/artwork/'.$post->getImage());
            }
        }else{ $img = $image; }
        
        $query = "UPDATE artwork SET title = :title, description = :descript, image = :image, alt_artwork = :alt "
                . "WHERE id_artwork = :id";
        $req = $this->execRequete($query, [
            "title"       => $this->validate($post->getTitle(), 3, 100),
            "descript" => $this->validate($post->getDescription(), 5, 250),
            "image"       => $img,
            "alt"         => $this->validate($post->getAlt_artwork(), 5, 200),
            "id"          => $post->getId_artwork()
        ]);
    }

    public function supprimer($idArt, $param2 = NULL) {
        $res = $this->execRequete("SELECT image FROM artwork WHERE id_artwork = ?", [$idArt]);
        $oldImg = $res->fetch();
        if(file_exists('public/images/artwork/'.$oldImg['image']) ){
            unlink('public/images/artwork/'.$oldImg['image']);
        }
        $this->execRequete("DELETE FROM artwork WHERE id_artwork = ?", [$idArt]);
    }

}
