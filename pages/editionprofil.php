<?php
session_start();

$cnx = new PDO('mysql:host=localhost;dbname=Evalsimplon', 'root', 'codeurKiFFeur');

if(isset($_SESSION['id']))
{
	$requser = $cnx->prepare("SELECT * FROM membres WHERE id = ?");
	$requser->execute(array($_SESSION["id"]));
	$user = $requser->fetch();

	if(isset($_POST["newpseudo"]) AND !empty($_POST["newpseudo"]) AND $_POST["newpseudo"] != $user["pseudo"])
	{
		$newpseudo = htmlspecialchars($_POST["newpseudo"]);
		$insertpseudo = $cnx->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
		$insertpseudo->execute(array($newpseudo, $_SESSION["id"]));
		$message = "Votre pseudo à bien été modifié !"."<br>"."Redirection vers votre profil en cours...";
	}
}
else{
	$msg = "Vous n'êtes pas connecté !"."<br>"."Cliquez <a href='connexion.php'>ici</a> pour vous connecté !";
}?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edition du profil</title>
    <link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
	</head>
	<body>
		<div align="center">
			<h2>Edition de mon profil</h2>
			<div class="container-fluid">
				<div class="row">
					<form class="well col-md-offset-4 col-md-4" method="POST" action="" enctype="multipart/form-data">
		        <div class="form-group">
						  <label for="newpseudo">Pseudo :</label>
						  <input class="form-control" id="newpseudo" type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user["pseudo"]; ?>">
		        </div>
		        <div class="form-group">
		  				<label for="newmail">Mail :</label>
		  				<input class="form-control" id="newmail" type="email" name="newmail" placeholder="Mail" value="">
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
					</form>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<?php
					if(isset($msg)){
						echo '<font color="red">'.$msg.'</font>';
					 }
					?>
					<?php
					if(isset($message)){
						echo '<font color="green">'.$message.'</font>';
					 }
					?>
				</div>
			</div>
			<?php
			if(isset($_POST["submit"]) && isset($_SESSION['id']) && isset($message)){
				header("Refresh: 2, url=profil.php?id=".$_SESSION["id"]);
			 }
			?>
		</div>
    <script src="../js/bootstrap.js"></script>
	</body>
</html>
