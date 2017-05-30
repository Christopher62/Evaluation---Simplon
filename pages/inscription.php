<?php

$cnx = new PDO('mysql:host=localhost;dbname=Evalsimplon', 'root', 'codeurKiFFeur');

if(isset($_POST["forminscription"]))
{
	$pseudo = htmlspecialchars($_POST["pseudo"]);
	$mail = htmlspecialchars($_POST["mail"]);
	$mail2 = htmlspecialchars($_POST["mail2"]);
	$mdp = sha1($_POST["mdp"]);
	$mdp2 = sha1($_POST["mdp2"]);

	if(!empty($_POST["pseudo"]) AND !empty($_POST["mail"]) AND !empty($_POST["mail2"]) AND !empty($_POST["mdp"]) AND !empty($_POST["mdp2"]))
	{
		$pseudolength = strlen($pseudo);
		if ($pseudolength <= 30)
		{
			if (filter_var($pseudo)){
				$reqpseudo = $cnx->prepare("SELECT * FROM membres WHERE pseudo = ?");
				$reqpseudo->execute(array($pseudo));
				$pseudoexist = $reqpseudo->rowCount();
				if($pseudoexist == 0)
				{
					if($mail == $mail2)
					{
						if(filter_var($mail, FILTER_VALIDATE_EMAIL))
						{
							$reqmail = $cnx->prepare("SELECT * FROM membres WHERE mail = ?");
							$reqmail->execute(array($mail));
							$mailexist = $reqmail->rowCount();
							if($mailexist == 0)
							{
								if($mdp == $mdp2)
								{
									$insertmbr = $cnx->prepare("INSERT INTO membres(pseudo, mail, password, avatar) VALUES (?, ?, ?, ?)");
									$insertmbr->execute(array($pseudo, $mail, $mdp, "default.jpg"));
									$message = "Votre compte a été créé avec succès !";
								}
								else
								{
									$erreur = "Vos mot de passe ne correspondent pas !";
								}
							}
							else
							{
								$erreur = "Adresse e-mail déja utilisée !";
							}
						}
						else
						{
							$erreur = "Votre adresse e-mail est invalide !";
						}
					}
					else
					{
						$erreur = "Vos mails ne correspondent pas !";
					}
				}
				else
				{
					$erreur = "Pseudo déjà pris !";
				}
			}
		}
		else
		{
			$erreur = "Votre pseudo ne doit pas dépasser 30 caractères !";
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
		<title>Inscription</title>
    <link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
	</head>
	<body>
		<div align="center">
			<h2>Inscription</h2>
			<div class="container-fluid">
				<div class="row">
					<form class="well col-md-offset-4 col-md-4" method="POST" action="">
		        <div class="form-group">
		          <label for="pseudo">Pseudo :</label>
						  <input class="form-control" type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
		        </div>
		        <div class="form-group">
						  <label for="mail">Mail :</label>
						  <input class="form-control" type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
		        </div>
		        <div class="form-group">
		          <label for="mail2">Confirmation du mail :</label>
						  <input class="form-control" type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>">
		        </div>
		        <div class="form-group">
		          <label for="mdp">Mot de passe :</label>
						  <input class="form-control" type="password" placeholder="Votre mot de passe" id="mdp" name="mdp">
		        </div>
		        <div class="form-group">
						  <label for="mdp2">Confirmation du mot de passe :</label>
		          <input class="form-control" type="password" placeholder="Confirmation mot de passe" id="mdp2" name="mdp2">
		        </div>
						<input type="submit" name="forminscription" value="Inscription">
					</form>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<span style="<?php if(isset($message) || isset($erreur)){echo "display:none";} ?>">Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a> !</span>
					<?php
						if(isset($erreur)){
							echo '<font color="red">'.$erreur.'</font>';
						}
					?>
					<?php
						if(isset($message)){
							echo '<font color="green">'.$message.'</font><br>';
							echo '<a href="connexion.php">Connectez-vous</a> !';
						}
					?>
				</div>
			</div>
	</body>
</html>
