<?php

// futur code php qui va vérifier les données de l'utilisateur !

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
					<form class="well col-md-offset-3 col-md-6" method="POST" action="">
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
					<!-- futur code php pour prévenir des erreurs lors de l'inscription -->
					Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a> !
				</div>
			</div>
	</body>
</html>
