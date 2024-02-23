<?php

class PlayerPerformance{

    private ? int $id = null;
    public function __construct(private string $player, private string $game, private string $points, private string $assists ){
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getGame(): string{
        return $this->game;
    }

    public function setGame(string $game): void{
        $this->game = $game;
    }

    public function getPoints(): string{
        return $this->points;
    }

    public function setPoints(string $points): void{
        $this->points = $points;
    }

    public function getAssists(): string{
        return $this->assists;
    }

    public function setAssists(string $assists): void{    
        $this->assists = $assists;
    }

}