<?php

require 'monster.php';

function getMonsters()
{

  try {
      $bdd = new PDO('mysql:host=localhost;dbname=webmiage;charset=utf8','root','');
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

  $req = $bdd->query('SELECT * FROM monsters');
  while ($donnees = $req->fetch()) {
    $monsterTemp = new Monster($donnees['Name'],$donnees['Strength'], $donnees['Life'],$donnees['Type']);
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
