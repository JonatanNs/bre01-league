<?php
require 'controllers/AbstractController.php';
require "managers/GamesManager.php";
require "managers/MediaManager.php";
require "managers/PlayerPerformanceManager.php";
require "managers/PlayersManager.php";
require "managers/TeamsManager.php";

use Symfony\Component\HttpFoundation\Response; 
class LeagueController extends AbstractController
{
    public function home() : void
    {
        $gm = new GamesManager();
        $mm = new MediaManager();
        $pm = new PlayersManager();
        $ppm = new PlayersPerformanceManager();
        $tm = new TeamsManager();

        //games
        $games = $gm->getAllgames();
        //media
        $media = $mm->getAllmedia();  
        //player
        $players = $pm->getAllplayers();

        $playersWhereTeam = $pm->getAllPlayersWhereTeam();
        $randomKeys = array_rand($playersWhereTeam, 3);
        $threePlayersWhereTeam = [];

        foreach ($randomKeys as $key) {
            $threePlayersWhereTeam[] = $playersWhereTeam[$key];
        }

        //playerPerformance
        $playersPerformance = $ppm->getPlayerPerformance();
        //teams
        $teams = $tm->getAllteams();
        $teamsWithLogo = $tm->getAllteamsWithLogo();
        
        $randomKeys = array_rand($teamsWithLogo, 2);
        $twoLogo = [];

        foreach ($randomKeys as $key) {
            $twoLogo[] = $teamsWithLogo[$key];
        }
        
        $this->render("home.html.twig", [
            "games" => $games,
            "media" => $media,
            "players" => $players,
            "playersPerofrmance" => $playersPerformance,
            "teams" => $teams,
            "playersWhereTeam" => $playersWhereTeam,
            "teamsWithLogo" => $teamsWithLogo,
            "threeplayersWhereTeam" => $threePlayersWhereTeam,
            "twoLogo" => $twoLogo
        ]);
    }
}