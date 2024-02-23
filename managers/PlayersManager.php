<?php
require_once "managers/AbstractManager.php";
require_once "models\Players.php";
class PlayersManager extends AbstractManager{
    public function __construct(){
        parent::__construct();
    }

    public function getAllPlayers() : array {
        $query = $this->db->prepare('SELECT * FROM players');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $players = [];

        foreach($result as $item){
            $player = new Players($item['nickname'], $item['bio'], $item['portrait'], $item['team']);
            $player->setId($item['id']);
            $players[] = $player;
        }
        return $players ;
    }

    public function getAllPlayersWhereTeam() : array {
        $query = $this->db->prepare(
        'SELECT players.nickname, teams.name, media.url, media.alt 
            FROM players 
            JOIN teams ON players.team = teams.id
            JOIN media ON players.portrait = media.id
        ');
        $query->execute();
        $playersWhereTeam = $query->fetchAll(PDO::FETCH_ASSOC);

        
        return $playersWhereTeam ;
    }

    
    
    
}