<?php

  if (isset($_POST["Supprimer"])){

  $name = $_POST['name'];

  try {
      $bdd = new PDO('mysql:host=localhost;dbname=WebMiage;charset=utf8','root','');
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

  $req = $bdd->query("DELETE FROM `Monsters` WHERE `Monsters`.`Name` ='".$name."'");
  header('Location: index.php');
  die;
}
 ?>
