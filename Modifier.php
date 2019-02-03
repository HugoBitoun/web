<?php



if (isset($_POST["Modifier"])){

  $name = $_POST['name'];
  $Strength = $_POST['Strength'];
  $Life = $_POST['Life'];
  $Type = $_POST['Type'];

}

if(isset($_POST["Valider"])){

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=WebMiage;charset=utf8','root','');
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }

    $N = $_POST['name'];
    $S = $_POST["NewStrength"];
    $L = $_POST["NewLife"];
    $T = $_POST["NewType"];
    $sql = "UPDATE Monsters SET Life = '".$L."', Strength = '".$S."', Type = '".$T."' WHERE Monsters.`Name` = '".$N."'";
    $req = $bdd->query($sql);
    header('Location: index.php');
    die;
}



 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monsters League</title>

        <!-- CSS files -->
        <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Monsters League</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Strength</th>
                        <th>Life</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <form class="" action="Modifier.php" method="POST">
                        <td><?php echo $name ?><input type="hidden" name="name" value="<?php echo $name ?>"></td>
                        <td><input  type="text" name="NewStrength" maxlength="50" size="30"></td>
                        <td><input  type="text" name="NewLife" maxlength="50" size="30"></td>
                        <td><input  type="text" name="NewType" maxlength="50" size="30"></td>
                        <td><input class='submit' type="submit" name="Valider" value="Valider"></td>
                </form>
                </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>