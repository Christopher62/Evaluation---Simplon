<?php
// code qui permettera de modifier le profil (si l'utilisateur est connecté !)
?>
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
			<form class="well col-md-offset-4 col-md-4" method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
				  <label for="newpseudo">Pseudo :</label>
				  <input class="form-control" id="newpseudo" type="text" name="newpseudo" placeholder="Pseudo" value="">
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
    <script src="../js/bootstrap.js"></script>
	</body>
</html>
