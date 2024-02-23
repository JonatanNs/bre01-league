<?php 

require "controllers/LeagueController.php";
class Router {
    public function handleRequest(array $get) : void
    {
        $lc = new LeagueController();

        if(!isset($get["route"]))
        {
            $lc->home();
        }
    }
}