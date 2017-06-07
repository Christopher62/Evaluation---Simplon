<?php
session_start();

$cnx = new PDO('mysql:host=localhost;dbname=Evalsimplon', 'root', '');

if(isset($_GET["id"]) AND $_GET["id"] >= 0)
{
	$getid = intval($_GET["id"]);
	$requser = $cnx->prepare("SELECT * FROM membres WHERE id = ?");
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
	$requeserexist = $requser->rowCount();
	if($requeserexist == 0){
		header("Location: 404.php");
	}
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
			<?php if(isset($userinfo['avatar']))
			{
			?>
			<img class="img-width" src="../img/membres/avatars/<?php echo $userinfo["avatar"]; ?>"  style="<?php if(empty($userinfo['avatar'])) {echo "display:none";} ?>">
			<?php
			}
			?>
			<?php if(empty($userinfo['avatar']))
			{
			?>
			<img class="img-width" src="../img/membres/avatars/<?php echo "default.jpg"; ?>" >
			<?php
			}
			?>
			<table class="table table-bordered profil-table">
				<tr>
					<th>Nom</th>
					<td><?php echo $userinfo["nom"]; ?></td>
				</tr>
				<tr>
					<th>Prénom</th>
					<td><?php echo $userinfo["prenom"]; ?></td>
				</tr>
				<tr>
					<th>Pseudo</th>
					<td><?php echo $userinfo["pseudo"]; ?></td>
				</tr>
				<tr>
					<th>Mail</th>
					<td><?php echo $userinfo["mail"]; ?></td>
				</tr>
				<tr>
					<th>Actions</th>
					<td>
						<?php
						if(isset($_SESSION["id"]) AND $userinfo["id"] == $_SESSION["id"])
						{
						?>
						<input onclick=window.location.href="../chris.php" type="button" class="btn btn-primary" name="" value="Accueil">
						<input onclick=window.location.href="editionprofil.php?id=<?php echo $_SESSION["id"]; ?>" type="button" class="btn btn-warning" name="" value="Edition profil">
						<input onclick=window.location.href="deconnexion.php" type="button" class="btn btn-danger" name="" value="Déconnexion">
						<?php
						}
						else
						{
							echo "...";
						}
						?>
					</td>
				</tr>
			</table>
			<?php if(!isset($_GET["id"])){
				header("Location: connexion.php");
				}
			?>
		</div>
	</body>
</html>
