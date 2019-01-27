<?php

/**
 *
 */
class Monster
{
  public $name;
  public $strength;
  public $life;
  public $type;

  public function __construct($name, $strength, $life, $type)
  {
    $this->name = $name;
    $this->strength = $strength;
    $this->life = $life;
    $this->type = $type;
  }

public function setstrength($value)
{
  $this->strength = $value;
}
public function getStrength($value)
{
  return $this->strength;
}

public function setName($value)
{
  $this->name = $value;
}
public function getName($value)
{
  return $this->name;
}

public function setType($value)
{
  $this->type = $value;
}
public function getType($value)
{
  return $this->type;
}

public function setLife($value)
{
  $this->life = $value;
}
public function getLife($value)
{
  return $this->life;
}


}




 ?>
