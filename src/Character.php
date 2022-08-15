<?php

namespace App;

class Character
{

    private int $health;
    private int $level;
    private bool $alive;
    public int $distance;

    public function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->distance = 2;
    }
    public function getHealth()
    {
        return $this->health;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getAlive()
    {
        if ($this->health === 0) {
            $this->alive = false;
        }
        return $this->alive;
    }

    public function attack($enemy)
    {
        $enemy->health = $enemy->health - 100;
    }

    public function heal($enemy)
    {
        for ($i = 1; $i <= 10; $i = $i + 1) {
            if ($enemy->alive && $enemy->health  < 1000) {
                $enemy->health = $enemy->health + 100;
            }
        }
    }

    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    public function damage_based_on_level_difference($enemy)
    {
        if($enemy->level - $this->level >= 5)
        {
            $enemy->health = $enemy->health -50;
        }

        if($this->level - $enemy->level >= 5)
        {
            $enemy->health = $enemy->health - 150;
        }
    }
}