<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Mdl\modele;

/**
 * Description of ModeleGenerique
 *
 * @author ilo
 */
abstract class ModeleGenerique {

    private $pdo;

    public function connect(){
        $this->pdo = new \PDO('mysql:host=localhost;port=3306;dbname=portfolio_ilo', 'root', '', 
                [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]);
        return $this->pdo;
    }
    
    public function execRequete($query, array $params = null){
        $res = $this->connect()->prepare($query);
        if( !empty($params) ){
            foreach ($params as $key => $value){
                $params[$key] = $value;
            }
        }
        $res->execute($params);
        return $res;
    }
    
    public function getAll($table, $instruction){
        $res = $this->execRequete("SELECT * FROM $table $instruction");
        return $res;
    }

    public function getOne($table, $colonne, $id){
        $res = $this->execRequete("SELECT * FROM $table WHERE $colonne = ?", [$id]);
        return $res->fetch();
    }
    
    public function validate( $champ, $min = 2, $max = 20 ){
        $champ = trim($champ);
        $champ = stripslashes($champ);
        $champ = htmlentities($champ);

        if (strlen($champ) >= $min && strlen($champ) <= $max ){
            return $champ;
        }else{
            $_SESSION['message'] = "Nombre de caractères incorrect";
        }
    }
    
    public function imageValidate($image, $champ1, $champ2, $dossier){
            $infoFic = pathinfo($image['name']);
            $extensions = ["jpg", "jpeg", "gif", "png"];
            $titre = $champ1."_".$champ2;

            if($image['size'] < 1500000 && in_array($infoFic['extension'], $extensions)){
                $nom_img = $titre.".".$infoFic['extension'];

                move_uploaded_file($image['tmp_name'], 'public/images/'.$dossier.'/'.$nom_img);
                return $nom_img;
            }else{
                $_SESSION['msg'] = "Une erreur s'est produite (ajout image)";
                header("location: .");
                exit;
            }
    }
    
    public function replaceSpecialChar($string) {
        return str_replace( array(' ',',',';',':','.','&','à','á','â','ã','ä','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ','À','Á','Â','Ã','Ä','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý'), array('_','','','','','','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','U','U','U','U','Y'), $string);
    }
    
    abstract function ajouter($param1, $param2, $param3);
    
    abstract function modifier($param1, $param2, $param3);
    
    abstract function supprimer($param, $param2);
    
}