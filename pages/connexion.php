<?php
session_start();

$cnx = new PDO('mysql:host=localhost;dbname=Evalsimplon', 'root', 'codeurKiFFeur');

if(isset($_POST["formconnexion"]))
{
    $mailconnect = htmlspecialchars($_POST["mailconnect"]);
    $mdpconnect = sha1($_POST["mdpconnect"]);
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $cnx->prepare("SELECT * FROM membres WHERE mail = ? AND password = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION["id"] = $userinfo["id"];
            $_SESSION["pseudo"] = $userinfo["pseudo"];
            $_SESSION["mail"] = $userinfo["mail"];
            $_SESSION["login"] = "yes";
            header("Location: ../chris.php");
        }
        else
        {
            $erreur = "Adresse e-mail et/ou mot de passe incorrect !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexion</title>
    <link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
    </head>
    <body>
        <div align="center">
            <h2>Connexion</h2>
      <div class="container-fluid">
        <div class="row">
                <form class="well col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8" method="POST" action="">
            <div class="form-group">
                      <label for="mailconnect">Mail :</label>
                      <input class="form-control" type="email" id="mailconnect" name="mailconnect" placeholder="Mail">
            </div>
            <div class="form-group">
                      <label for="mdpconnect">Mot de passe :</label>
              <input class="form-control" type="password" id="mdpconnect" name="mdpconnect" placeholder="Mot de passe">
            </div>
                    <input type="submit" name="formconnexion" value="Connexion">
                        <?php
                            if(isset($erreur)){
                                echo '<br><font color="red">'.$erreur.'</font>';
                            }
                        ?>
                </form>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
                    <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous</a> !</p>
        </div>
      </div>
        </div>
    </body>
</html>