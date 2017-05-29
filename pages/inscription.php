<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
    <link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
	</head>
	<body>
		<div align="center">
			<h2>Inscription</h2>
			<form class="well" method="POST" action="">
        <div class="form-group">
          <label for="pseudo">Pseudo :</label>
				  <input class="form-control" type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="">
        </div>
        <div class="form-group">
				  <label for="mail">Mail :</label>
				  <input class="form-control" type="email" placeholder="Votre mail" id="mail" name="mail" value="">
        </div>
        <div class="form-group">
          <label for="mail2">Confirmation du mail :</label>
				  <input class="form-control" type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="">
        </div>
        <div class="form-group">
          <label for="mdp">Mot de passe :</label>
				  <input class="form-control" type="password" placeholder="Votre mot de passe" id="mdp" name="mdp">
        </div>
        <div class="form-group">
				  <label for="mdp2">Confirmation du mot de passe :</label>
          <input class="form-control" type="password" placeholder="Confirmation votre mdp" id="mdp2" name="mdp2">
        </div>
				<input type="submit" name="forminscription" value="Inscription">
			</form>
		</div>
    <script src="../js/bootstrap.js"></script>
	</body>
</html>
