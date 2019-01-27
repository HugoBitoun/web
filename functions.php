<?php

require 'monster.php';

function getMonsters()
{
  $json = json_decode(file_get_contents('resources/monsters.json',true));
   foreach ($json as $monster) {
    $monsterTemp = new Monster($monster->name,$monster->strength, $monster->life,$monster->type);
    echo $monsterTemp->name;
    $monsterAux[] = $monsterTemp;
  }
  return $monsterAux;
}

/**
 * Our complex fighting algorithm!
 *
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function fight(Monster $firstMonster, Monster $secondMonster)
{
    $firstMonsterLife = $firstMonster->life;
    $secondMonsterLife = $secondMonster->life;

    while ($firstMonsterLife > 0 && $secondMonsterLife > 0) {
        $firstMonsterLife = $firstMonsterLife - $secondMonster->strength;
        $secondMonsterLife = $secondMonsterLife - $firstMonster->strength;
    }

    if ($firstMonsterLife <= 0 && $secondMonsterLife <= 0) {
        $winner = null;
        $looser = null;
    } elseif ($firstMonsterLife <= 0) {
        $winner = $secondMonster;
        $looser = $firstMonster;
    } else {
        $winner = $firstMonster;
        $looser = $secondMonster;
    }

    return array(
        'winner' => $winner,
        'looser' => $looser,
    );
}
