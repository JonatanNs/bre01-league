<?php

require_once "managers/AbstractManager.php";
require_once "models\PlayerPerformance.php";
class PlayersPerformanceManager extends AbstractManager{
    public function __construct(){
        parent::__construct();
    }

public function getPlayerPerformance() : array {
        $query = $this->db->prepare('SELECT * FROM player_performance');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $playerPerformance = [];

        foreach($result as $item){
            $player = new PlayerPerformance($item['player'], $item['game'], $item['points'], $item['assists']);
            $player->setId($item['id']);
            $playerPerformance[] = $player;
        }
        return $playerPerformance;
    }

}