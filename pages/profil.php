<?php
session_start();

$cnx = new PDO('mysql:host=localhost;dbname=Evalsimplon', 'root', 'codeurKiFFeur');

if(isset($_GET["id"]) AND $_GET["id"] > 0)
{
	$getid = intval($_GET["id"]);
	$requser = $cnx->prepare("SELECT * FROM membres WHERE id = ?");
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profil de <?php echo $userinfo["pseudo"]; ?></title>
		<link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
		<link rel="stylesheet" href="../style/css/christopher.css">
	</head>
	<body>
		<div align="center">
			<h2>Profil de <?php echo $userinfo["pseudo"]; ?></h2>
			<table class="table table-bordered profil-table">
				<tr>
					<th>Pseudo</th>
					<th>Mail</th>
					<th>Actions</th>
				</tr>
				<tr>
					<td><?php echo $userinfo["pseudo"]; ?></td>
					<td><?php echo $userinfo["mail"]; ?></td>
					<td>
						<input onclick=window.location.href="editionprofil.php" type="button" class="btn btn-primary" name="" value="Editer mon profil">
						<input onclick=window.location.href="deconnexion.php" type="button" class="btn btn-danger" name="" value="Déconnexion">
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
