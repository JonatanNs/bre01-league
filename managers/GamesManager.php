<?php
require_once "managers/AbstractManager.php";
require_once "models/Games.php";
class GamesManager extends AbstractManager{
    public function __construct(){
        parent::__construct();
    }

    public function getAllgames() : array {
        $query = $this->db->prepare('SELECT * FROM games');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $games = []; 

        foreach($result as $item){
            $game = new Games($item['name'], $item['date'], $item['team_1'], $item['team_2'], $item['winner']);
            $game->setId($item['id']);
            $games[] = $game;
        }

        return $games;
    }
}