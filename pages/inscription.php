<?php

$cnx = new PDO('mysql:host=localhost;dbname=Evalsimplon', 'root', 'codeurKiFFeur');

if(isset($_POST["forminscription"]))
{
	$nom = htmlspecialchars($_POST["nom"]);
	$prenom = htmlspecialchars($_POST["prenom"]);
	$pseudo = htmlspecialchars($_POST["pseudo"]);
	$mail = htmlspecialchars($_POST["mail"]);
	$mail2 = htmlspecialchars($_POST["mail2"]);
	$mdp = sha1($_POST["mdp"]);
	$mdp2 = sha1($_POST["mdp2"]);

	if(!empty($_POST["nom"]) AND !empty($_POST["prenom"]) AND !empty($_POST["pseudo"]) AND !empty($_POST["mail"]) AND !empty($_POST["mail2"]) AND !empty($_POST["mdp"]) AND !empty($_POST["mdp2"]))
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
		<link rel="stylesheet" href="../style/css/christopher.css">
	</head>
	<body>
		<div class="container-fluid col-md-4" id="inscription">
			<div class="row">
			<h1>Inscription</h1>
			<p>Bienvenue ! Vous désirez vous inscrire ? Remplissez ce formulaire !</p>
			<p>Déjà inscrit ? <a href="connexion.php">Connectez-vous</a> !</p>
			</div>
		</div>
			<div class="container-fluid">
				<div class="row text-center">
					<form class="well col-md-offset-0 col-md-4 col-sm-offset-3 col-sm-6 inscription-form" method="POST" action="">
						<div class="form-group">
		          <label for="nom">Nom :</label>
						  <input class="form-control" type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>">
		        </div>
						<div class="form-group">
		          <label for="prenom">Prénom :</label>
						  <input class="form-control" type="text" placeholder="Votre prénom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>">
		        </div>
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
								<?php
									if(isset($erreur)){
										echo '<br><font color="red">'.$erreur.'</font>';
									}
								?>
								<?php
									if(isset($message)){
										echo '<br><font color="green">'.$message.'</font>&nbsp';
										echo '<a href="connexion.php">Connectez-vous</a> !';
									}
								?>
					</form>
				</div>
			</div>
	</body>
</html>
