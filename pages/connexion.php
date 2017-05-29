<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
    <link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
	</head>
	<body>
		<div align="center">
			<h2>Connexion</h2>
			<form class="well" method="POST" action="">
        <div class="form-group">
				  <label for="mailconnect">Mail :</label>
				  <input class="form-control" type="email" name="mailconnect" placeholder="Mail">
        </div>
        <div class="form-group">
				  <label for="mdpconnect">Mot de passe :</label>
          <input class="form-control" type="password" name="mdpconnect" placeholder="Mot de passe">
        </div>
				<input type="submit" name="forminscription" value="Connexion">
			</form>
      Pas de compte ? <a href="inscription.php">Inscrivez-vous !</a>
		</div>
    <script src="../js/bootstrap.js"></script>
	</body>
</html>
