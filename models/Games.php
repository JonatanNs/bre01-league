<?php

class Games{
    private ? int $id = null;
    public function __construct(private string $name, private string $date, private int $team_1, private int $team_2, private int $winner){
    }

    public function getId(): ? int{
        return $this->id;
    }

    public function setId(string $id): void{
        $this->id;
    }

    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name): void{
        $this->name = $name;
    }

    public function getDate(): string{
        return $this->name;
    }
    public function setDate(string $date): void{
        $this->date = $date;
    }

    public function getTeam_1(): int{
        return $this->team_1;
    }
    public function setTeam_1(int $team_1): void{
        $this->team_2 = $team_1;
    }

    public function getTeam_2(): int{
        return $this->team_2;
    }
    public function setTeam_2(int $team_2): void{
        $this->team_2 = $team_2;
    }

    public function getWinner(): string{
        return $this->winner;
    }
    public function setWinner(int $winner): void{
        $this->winner = $winner;
    }

}