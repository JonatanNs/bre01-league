<?php
require_once "managers/AbstractManager.php";
require_once "models/Teams.php";
class TeamsManager extends AbstractManager{
    public function __construct(){
        parent::__construct();
    }
    
    public function getAllteams() : array {
        $query = $this->db->prepare('SELECT * FROM teams');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $teams = [];

        foreach($result as $item){
            $team = new Teams($item['name'], $item['description'], $item['logo']);
            $team->setId($item['id']);
            $teams[] = $team;
        }
        return $teams;
    }

    public function getAllteamsWithLogo() : array {
        $query = $this->db->prepare('SELECT teams.id, teams.name,teams.description, media.url, media.alt FROM teams JOIN media ON logo = media.id');
        $query->execute();
        $teams = $query->fetchAll(PDO::FETCH_ASSOC);

        return $teams;
    }

}