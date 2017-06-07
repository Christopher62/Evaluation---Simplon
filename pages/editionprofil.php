<?php
session_start();

$cnx = new PDO('mysql:host=localhost;dbname=Evalsimplon', 'root', '');

if(isset($_SESSION['id']))
{
	$requser = $cnx->prepare("SELECT * FROM membres WHERE id = ?");
	$requser->execute(array($_SESSION["id"]));
	$user = $requser->fetch();

	if(isset($_POST["newnom"]) AND !empty($_POST["newnom"]) AND $_POST["newnom"] != $user["nom"])
	{
		$newnom = htmlspecialchars($_POST["newnom"]);
		$insertnom = $cnx->prepare("UPDATE membres SET nom = ? WHERE id = ?");
		$insertnom->execute(array($newnom, $_SESSION["id"]));
		$message = "Modification effectuée !"."&nbsp"."Redirection vers votre profil en cours...";
	}

	if(isset($_POST["newprenom"]) AND !empty($_POST["newprenom"]) AND $_POST["newprenom"] != $user["prenom"])
	{
		$newprenom = htmlspecialchars($_POST["newprenom"]);
		$insertprenom = $cnx->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
		$insertprenom->execute(array($newprenom, $_SESSION["id"]));
		$message = "Modification effectué !"."&nbsp"."Redirection vers votre profil en cours...";
	}

	if(isset($_POST["newpseudo"]) AND !empty($_POST["newpseudo"]) AND $_POST["newpseudo"] != $user["pseudo"])
	{
		$newpseudo = htmlspecialchars($_POST["newpseudo"]);
		$insertpseudo = $cnx->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
		$insertpseudo->execute(array($newpseudo, $_SESSION["id"]));
		$message = "Modification effectué !"."&nbsp"."Redirection vers votre profil en cours...";
	}

	if(isset($_POST["newmail"]) AND !empty($_POST["newmail"]) AND $_POST["newmail"] != $user["mail"])
	{
		$newmail = htmlspecialchars($_POST["newmail"]);
		$insertmail = $cnx->prepare("UPDATE membres SET mail = ? WHERE id = ?");
		$insertmail->execute(array($newmail, $_SESSION["id"]));
		$message = "Modification effectué !"."&nbsp"."Redirection vers votre profil en cours...";
	}

	if(isset($_POST["newmdp1"]) AND !empty($_POST["newmdp1"]) AND isset($_POST["newmdp2"]) AND !empty($_POST["newmdp2"]))
	{
		$mdp1 = sha1($_POST["newmdp1"]);
		$mdp2 = sha1($_POST["newmdp2"]);

		if($mdp1 == $mdp2)
		{
			$insertmdp = $cnx->prepare("UPDATE membres set password = ? WHERE id = ?");
			$insertmdp->execute(array($mdp1, $_SESSION["id"]));
			$message = "Modification effectué !"."&nbsp"."Redirection vers votre profil en cours...";
		}
		else
		{
			$msg = "Vos saisies ne correspondent pas !";
		}
	}

	if(isset($_FILES["avatar"]) AND !empty($_FILES["avatar"]["name"]))
	{
		$tailleMax = 6291456;
		$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
		if($_FILES['avatar']['size'] <= $tailleMax)
		{
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			if(in_array($extensionUpload, $extensionsValides))
			{
				$chemin = "../img/membres/avatars/".$_SESSION['id'].".".$extensionUpload;
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
				if($resultat)
				{
					$updateavatar = $cnx->prepare("UPDATE membres SET avatar = :avatar WHERE id = :id");
					$updateavatar->execute(array(
						'avatar' => $_SESSION['id'].".".$extensionUpload,
						'id' => $_SESSION['id']
						));
						$message = "Modification effectué !"."&nbsp"."Redirection vers votre profil en cours...";
				}
				else
				{
					$msg = "Erreur durant l'importation de votre photo de profil".'<br>'.'Celle-ci est trop volumineuse ou le format n\'est pas accepté !';
				}
			}
			else
			{
				$msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
			}
		}
		else
		{
			$msg = "Votre photo de profil ne doit pas dépasser 6 mo !";
		}
	}
}
else
{
	header("Location: connexion.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edition du profil</title>
    <link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
		<link rel="stylesheet" href="../style/css/christopher.css">
	</head>
	<body>
		<div class="container-fluid col-md-4" id="edition">
			<div class="row">
				<h1>Edition du profil</h1>
				<p>Voici la page d'édition de votre profil, vous pouvez modifier vos paramètres !</p>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row text-center">
				<form class="well col-md-offset-0 col-md-4 col-sm-offset-3 col-sm-6 edition-form" method="POST" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="newnom">Nom :</label>
						<input class="form-control" id="newnom" type="text" placeholder="Votre nom" name="newnom" value="<?php echo $user["nom"] ?>">
					</div>
					<div class="form-group">
						<label for="newprenom">Prénom :</label>
						<input class="form-control" id="newprenom" type="text" placeholder="Votre prénom" name="newprenom" value="<?php echo $user["prenom"] ?>">
					</div>
	        <div class="form-group">
					  <label for="newpseudo">Pseudo :</label>
					  <input class="form-control" id="newpseudo" type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user["pseudo"]; ?>">
	        </div>
	        <div class="form-group">
	  				<label for="newmail">Mail :</label>
	  				<input class="form-control" id="newmail" type="email" name="newmail" placeholder="Mail" value="<?php echo $user["mail"]; ?>">
	        </div>
	        <div class="form-group">
	  				<label for="newmdp1">Mot de passe :</label>
	  				<input class="form-control" id="newmdp1" type="password" name="newmdp1" placeholder="Mot de passe">
	        </div>
	        <div class="form-group">
	  				<label for="newmdp2">Confirmation du mot de passe :</label>
	  				<input class="form-control" id="newmdp2" type="password" name="newmdp2" placeholder="Confirmation du mot de passe">
	        </div>
	        <div class="form-group">
	          <label for="avatar">Avatar :</label>
					  <input id="avatar" type="file" name="avatar">
	        </div>
					<input onclick=window.location.href="<?php echo "profil.php?id=".$_SESSION["id"]; ?>" type="button" class="btn btn-warning" name="submit" value="Retour vers mon profil">
					<input type="submit" class="btn btn-success" name="submit" value="Mettre à jour mon profil">
					<?php
					if(isset($msg)){
						echo '<br><font color="red">'.$msg.'</font>';
					 }
					?>
					<?php
					if(isset($message)){
						echo '<br><font color="green">'.$message.'</font>';
					 }
					?>
				</form>
			</div>
		</div>
		<?php
		if(isset($_POST["submit"]) && isset($_SESSION['id']) && isset($message)){
			header("Refresh: 2, url=profil.php?id=".$_SESSION["id"]);
		 }
		?>
	</body>
</html>
