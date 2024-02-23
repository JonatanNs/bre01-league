<?php
require_once "managers/AbstractManager.php";
require_once "models\Media.php";
class MediaManager extends AbstractManager{
    public function __construct(){
        parent::__construct();
    }

    public function getAllmedia() : array {
        $query= $this->db->prepare('SELECT * FROM media');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $media = [];

        foreach($result as $item){
            $medias = new Media($item['url'], $item['alt']);
            $medias->setId($item['id']);
            $media[] = $medias;
        }
        return $media;
    }
    
}